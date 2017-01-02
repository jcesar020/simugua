<?php

namespace simuaagua;

use Illuminate\Database\Eloquent\Model;

use DB;
use Carbon\Carbon;

class factura extends Model
{

    public static function iniHistorico(){

        $historico['mes'] = 'PRO';
        $historico['consumo'] = 0;
        $historico['valor'] = 0;

        $historial[]=$historico;
        return $historial;

    }

    public static function getFacturas($periodo, $sector){
        $query=\DB::select('CALL pGetFacturasPeriodoSector(?,?)', [$periodo,$sector]);
        return $query;
    }

    public static function getFacturacion2(){

        $periodo=201601;
        $sector_id=1;
        $mensaje= "!!LOS SERVICIOS CON TRES O MAS MESES EN MORA SE SUSPENDERAN, DESPUES DE LA FECHA DE VENCIMIENTO, ACERCATE A LA ALCALDIA PARA REALIZAR TU PAGO!!";
        $fechaPago='27/06/2016';
        $facturado='25/06/2016';

        //encabezados
        $query= DB::select('call pGetFactuEncabezado(?, ?)', [$sector_id, $periodo]);
        foreach ($query as $item) {
            $encabezado['conexion_id']=$item->id;
            $encabezado['factura_id']=    $item->factura_id;
            $encabezado['secuencia']=$item->secuencia;
            $encabezado['cliente']=$item->cliente;
            $encabezado['direccion']=$item->direccion;
            $encabezado['zona']=$item->zona;
            $encabezado['mensaje']=$mensaje;
            $encabezado['fechaPago']=$fechaPago;
            $encabezado['facturado']=$facturado;
            $encabezado['monto']=0.0;

            $facturas[$item->id]['encabezado']=$encabezado;
            $facturas[$item->id]['historico']= self::iniHistorico();
        }

        //Lecturas
        $query= DB::select('call pGetFactuLecturas(?, ?)', [$sector_id, $periodo]);
        foreach ($query as $item) {
            $lectura['medidor']=$item->medidor_id;

            $lectura['anterior']=$item->anterior;
            $lectura['actual']=$item->actual;
            $lectura['consumo']=$item->consumo;
            $lectura['desde']=$item->desde;
            $lectura['hasta']=$item->hasta;

            $facturas[$item->conexion_id]['lectura']=$lectura;
        }

        //DETALLES
        //SALDOS ANTERIORES
        $query= DB::select('call pGetFactuSaldos(?, ?)', [$sector_id, $periodo]);
        foreach ($query as $item) {
            $subdetalle['catal_id']= '';
            $subdetalle['concepto']= 'SALDO ANTERIOR';
            $subdetalle['cantidad']= '';
            $subdetalle['precio']= '';
            $subdetalle['valor']= doubleval( $item->valor);

            $facturas[$item->conexion_id]['detalle'][]=$subdetalle;

            //Suma el valor al total
            $facturas[$item->conexion_id]['encabezado']['monto']+= $item->valor;

        }


        //MES ACTUAL
        $query= DB::select('call pGetFactuDetalle(?, ?)', [$sector_id, $periodo]);
        foreach ($query as $item) {
            $subdetalle['catal_id']= $item->catalogo_id;
            $subdetalle['concepto']= $item->concepto;
            $subdetalle['cantidad']= $item->cant;
            $subdetalle['precio']= doubleval( $item->precio);
            $subdetalle['valor']= doubleval( $item->valor);
            $facturas[$item->conexion_id]['detalle'][]=$subdetalle;

            //Suma el valor al total
            $facturas[$item->conexion_id]['encabezado']['monto']+= $item->valor;


        }

        //MULTAS
        $query= DB::select('call pGetFactuMultas(?, ?)', [$sector_id, $periodo]);
        foreach ($query as $item) {
            $subdetalle['catal_id']= 701;
            $subdetalle['concepto']= 'MULTAS POR PAGO EXTEMPORANEO';
            $subdetalle['cantidad']= '';
            $subdetalle['precio']= '';
            $subdetalle['valor']= doubleval( $item->valor);
            $facturas[$item->conexion_id]['detalle'][]=$subdetalle;

            //Suma el valor al total
            $facturas[$item->conexion_id]['encabezado']['monto']+= $item->valor;
        }

        //HISTORICO

        $query= DB::select('call pGetFactuHistorico(?, ?)', [$sector_id, $periodo]);

        $meses= config('option.mesesCorto');

        foreach ($query as $item) {
            $historico['mes']= $meses[$item->mes];
            $historico['consumo']=  $item->consumo;
            $historico['valor']= doubleval( $item->valor);
            $facturas[$item->conexion_id]['historico'][]=$historico;
        }

        /*
        for ($i=0; $i<=300; $i++ ){

            $facturas[$i]['encabezado']['cliente']='juan perez';
            dd($facturas[$i]);
        }
        */
        foreach($facturas as $factu) {
         // dd ( $factu['encabezado']['conexion_id']);
            $historico=$factu['historico'];


            $tConsumo=0;
            $cConsumo=0;
            $tValor=0;

            for($e=1;$e<=3;$e++){
                if(isset($historico[$e])){
                    $tConsumo+=$historico[$e]['consumo'];
                    $tValor+=$historico[$e]['valor'];
                    $cConsumo++;
                }else{
                    //SI NO EXISTE UN HISTORICO SE CREA UN NUEVO
                    $history['mes'] = '';
                    $history['consumo'] = 0;
                    $history['valor'] = 0;
                    $facturas[$factu['encabezado']['conexion_id']]['historico'][]=$history;

                }


            }

            if($cConsumo>0) {
                $facturas[$factu['encabezado']['conexion_id']]['historico'][0]['consumo'] = $tConsumo/$cConsumo;
                $facturas[$factu['encabezado']['conexion_id']]['historico'][0]['valor'] = $tValor/$cConsumo;
            }

           //$facturas[$factu['encabezado']['conexion_id']]['encabezado']['cliente']='hola';

        }


        //dd($facturas);

        return  $facturas;


    }
    public static function  getFacturacion($ini, $fin, $periodo, $sector_id, $mensaje){



        //encabezados
        $query= DB::select('call pGetFactuEncabezado(?, ?)', [$ini, $fin]);
        foreach ($query as $item) {
            $encabezado['conexion_id']=$item->id;
            $encabezado['factura_id']=$item->factura_id;
            $encabezado['secuencia']=$item->secuencia;
            $encabezado['cliente']=$item->cliente;
            $encabezado['direccion']=$item->direccion;
            $encabezado['zona']=$item->zona;
            $encabezado['mensaje']=$mensaje;
            $encabezado['fechaPago']=Carbon::parse( $item->fecha_vencimiento)->format('d/m/Y');
            $encabezado['facturado']=Carbon::parse( $item->fecha_facturacion)->format('d/m/Y');
            $encabezado['monto']=0.0;
            $encabezado['estado']=$item->estado;

            $facturas[$item->id]['encabezado']=$encabezado;
            $facturas[$item->id]['historico']= self::iniHistorico();
        }

        //Lecturas
        $query= DB::select('call pGetFactuLecturas(?, ?, ?)', [$ini, $fin, $periodo]);
        foreach ($query as $item) {
            $lectura['medidor']=$item->medidor_id;
            $lectura['periodo']=$item->periodo;
            $lectura['anterior']=$item->anterior;
            $lectura['actual']=$item->actual;
            $lectura['consumo']=$item->consumo;
            $lectura['desde']=Carbon::parse( $item->desde)->format('d/m/Y');
            $lectura['hasta']=Carbon::parse( $item->hasta)->format('d/m/Y');

            $facturas[$item->conexion_id]['lectura']=$lectura;
        }

        //DETALLES
        //SALDOS ANTERIORES
        $query= DB::select('call pGetFactuSaldos(?, ?, ?)', [$ini, $fin, $periodo]);
        foreach ($query as $item) {
            $subdetalle['catal_id']= '';
            $subdetalle['concepto']= 'SALDO ANTERIOR';
            $subdetalle['cantidad']= '';
            $subdetalle['precio']= '';
            $subdetalle['valor']= doubleval( $item->valor);

            $facturas[$item->conexion_id]['detalle'][]=$subdetalle;

            //Suma el valor al total
            $facturas[$item->conexion_id]['encabezado']['monto']+= $item->valor;

        }


        //MES ACTUAL
        $query= DB::select('call pGetFactuDetalle(?, ?, ?)', [$ini, $fin, $periodo]);
        foreach ($query as $item) {
            $subdetalle['catal_id']= $item->catalogo_id;
            $subdetalle['concepto']= $item->concepto;
            $subdetalle['cantidad']= $item->cant;
            $subdetalle['precio']= doubleval( $item->precio);
            $subdetalle['valor']= doubleval( $item->valor);
            $facturas[$item->conexion_id]['detalle'][]=$subdetalle;

            //Suma el valor al total
            $facturas[$item->conexion_id]['encabezado']['monto']+= $item->valor;


        }

        //MULTAS
        $query= DB::select('call pGetFactuMultas(?, ?, ?)', [$ini, $fin, $periodo]);
        foreach ($query as $item) {
            $subdetalle['catal_id']= 701;
            $subdetalle['concepto']= 'MULTAS POR PAGO EXTEMPORANEO';
            $subdetalle['cantidad']= '';
            $subdetalle['precio']= '';
            $subdetalle['valor']= doubleval( $item->valor);
            $facturas[$item->conexion_id]['detalle'][]=$subdetalle;

            //Suma el valor al total
            $facturas[$item->conexion_id]['encabezado']['monto']+= $item->valor;
        }

        //HISTORICO

        $query= DB::select('call pGetFactuHistorico(?, ?, ?)', [$ini, $fin, $periodo]);

        $meses= config('option.mesesCorto');

        foreach ($query as $item) {
            $historico['mes']= $meses[$item->mes];
            $historico['consumo']=  $item->consumo;
            $historico['valor']= doubleval( $item->valor);
            $facturas[$item->conexion_id]['historico'][]=$historico;
        }

        //CALCULA EL CONSUMO
        foreach($facturas as $factu) {
             $historico=$factu['historico'];
            $tConsumo=0;
            $cConsumo=0;
            $tValor=0;

            for($e=1;$e<=3;$e++){
                if(isset($historico[$e])){
                    $tConsumo+=$historico[$e]['consumo'];
                    $tValor+=$historico[$e]['valor'];
                    $cConsumo++;
                }else{
                    //SI NO EXISTE UN HISTORICO SE CREA UN NUEVO
                    $history['mes'] = '';
                    $history['consumo'] = 0;
                    $history['valor'] = 0;
                    $facturas[$factu['encabezado']['conexion_id']]['historico'][]=$history;
                }
            }

            if($cConsumo>0) {
                $facturas[$factu['encabezado']['conexion_id']]['historico'][0]['consumo'] = $tConsumo/$cConsumo;
                $facturas[$factu['encabezado']['conexion_id']]['historico'][0]['valor'] = $tValor/$cConsumo;
            }
        }
        //dd($facturas);

        return  $facturas;


    }

}
