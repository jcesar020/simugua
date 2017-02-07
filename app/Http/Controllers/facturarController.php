<?php

namespace simuaagua\Http\Controllers;

use Illuminate\Http\Request;

use myClass\librerias;
use DB;
use Carbon\Carbon;
use simuaagua\Http\Requests;
use simuaagua\Http\Controllers\Controller;
use simuaagua\Http\Requests\facturarParametros;
use simuaagua\factura;
use simuaagua\Periodo;
use simuaagua\Sector;
use Illuminate\Routing\Route;

class facturarController extends Controller
{
    public function store(facturarParametros $request)
    {
        //PROCEDIMIENTO PARA IMPRIMIR FACTURAS

        $periodo= $request->input('periodo');
        $ini= $request->input('desde');
        $fin= $request->input('hasta');
        $mensaje=$request->input('mensaje');

        return $this->imprimirFacturas($ini, $fin, $periodo, $mensaje);
    }

    public function printfactura(Route $route){

        $periodo=$route->getParameter('periodo');
        $ini=$route->getParameter('ini');
        $fin=$ini;
        $mensaje='';
        return $this->imprimirFacturas($ini, $fin, $periodo, $mensaje);
    }

   private function imprimirFacturas($ini, $fin, $periodo, $mensaje){
       $facturas= $this->getFacturacion($ini, $fin, $periodo, $mensaje);
       $sector=Sector::find(current($facturas)['encabezado']['sector_id']);

       $view=view('factura3.facturas')
           ->with('facturas',$facturas)
           ->with('sector', $sector);

       $pdf=\App::make('dompdf.wrapper');

       $paper_size = array(0,0,595.28,960);

       $pdf->loadHTML($view)->setPaper($paper_size);

       $nombrearchivo=$periodo .'_' .'_' . $ini.'_' . $fin. '.pdf';
       return $pdf->stream($nombrearchivo);
   }

    ///////////////////MODIFICACION AL CONTROLA DE FACTURAS
    public function imprimir(){
        //Muestas las opciones de impresion 20170122
        $periodos=Periodo::getPeriodosFacturados();
        $sectores=Sector::lists('sector', 'id');

        return view('facturacion.printParam')
            ->with('periodos', $periodos)
            ->with('sectores', $sectores);
    }
    public function  listado(Route $route){
        //Muesta la listado de facturas tras seleccionar sector 20170122
        $periodo=$route->getParameter('periodo');
        $sector=$route->getParameter('sector') ;
        return $this->getFacturas($periodo, $sector);
    }

//    public function listar(){
//
//    }

    function genServicio($periodo, $sector){

        $mysqli = new mysqli("localhost", "root", "", "simuagua");
        if ($mysqli->connect_error) {
            echo "Falló la conexión a MySQL: (" . $mysqli->connect_error . ") " . $mysqli->connect_error;
        }

        if (!$mysqli->query("call pGenFactuServiciosCodigo(201602, 1, 101)")) {
            echo "Falló CALL: (" . $mysqli->error . ") " . $mysqli->error;
        }

    }
    public function generar(Route $route){
        $param['periodo']= (int)  $route->getParameter('periodo');
        $param['sector']=(int) $route->getParameter('sector');
        $param['fechaVen']=$route->getParameter('ano') . '/'. $route->getParameter('mes') . '/'. $route->getParameter('dia');;


        //Generar servicios
        //Servicios de agua
        $resp1=DB::select('call pGenFactuServiciosCodigo(?, ?, 101)', [$param['periodo'], $param['sector']]);
        $servicio=$resp1[0]->res;

        //Servicios de alcantarilla
        // DB::reconnect();
        $resp2=DB::select('call pGenFactuServiciosCodigo(?, ?, 102)', [$param['periodo'], $param['sector']]);
        $servicio+= $resp2[0]->res;

        //Actualizar lecturas
        //DB::reconnect();
        $resp3=DB::select('call pActualizarLecturasEstadoFacturado(?, ?)', [$param['periodo'], $param['sector']]);
        $lecturas= $resp3[0]->res;

        //Multas
        // DB::reconnect();
        $resp4=DB::select('CALL pGenMultasFacturasVencidas');
        $multas= $resp4[0]->res;

        //Facturacion

        $resp5=DB::select('CALL pGenerarFacturas(?, ?,?)', [$param['periodo'], $param['sector'], $param['fechaVen']]);
        $facturas= $resp5[0]->res;

        //Anulacion de facturas Anterioreres

        $resp6=DB::select('CALL pAnularFacturasVencidas(?, ?)', [$param['periodo'], $param['sector']]);
        $nulas= $resp6[0]->res;



        $res=['servicios'=>$servicio,
            'multas'=>$multas,
            'facturas'=>$facturas,
            'lecturas'=>$lecturas,
            'nulas'=>$nulas,
        ];


        return response()->json($res);

    }
    public function facturar(Route $route){
        $param['periodo']=$route->getParameter('periodo');
        $param['sector']=$route->getParameter('sector');
        $param['sectorName']= Sector::find($param['sector'])->sector ;


        $estados= config('option.estadosLecturas');

        $datos= DB::select('call pGetLecturasAprobadas(?,?)',[$param['periodo'], $param['sector']]);

        //return $datos;
        return view('facturacion.facturar')
            ->with('datos',$datos)
            ->with('param', $param);
    }
    public function multas(){

        $resultado=DB::select('select * from vlistarfacturasvencer');

        Return view('multas.multas')
            ->with('datos', $resultado);
    }
    public function multasgenerar(){
        $respuesta=DB::select('call pSetFacturasVencidas');
        $ven=$respuesta[0]->res;
        $respuesta=DB::select('call pGenMultasFacturasVencidas');
        $mul=$respuesta[0]->res;

        //Return redirect('facturas/multas'); //view('multas.multas');
        //->with('message',  $mul . ' Multas generadas' );

        return redirect('/facturas/multas')->with('message', $mul . ' Multas generadas');

    }


    //ELEMENTOS IMPORTADOS DESDE EL MODELO FACTURAS

    public function  getFacturacion($ini, $fin, $periodo,  $mensaje){

        if($mensaje==''){
            $mensaje="!!LOS SERVICIOS CON TRES O MAS MESES EN MORA SE SUSPENDERAN, DESPUES DE LA FECHA DE VENCIMIENTO, ACERCATE A LA ALCALDIA PARA REALIZAR TU PAGO!!";
        }

        //Formatear periodo a AAA-XXXX
        $periodotext= librerias::setPeriodoText($periodo);

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
            $encabezado['sector_id']=$item->sector_id;

            $facturas[$item->id]['encabezado']=$encabezado;
            $facturas[$item->id]['historico']= self::iniHistorico();
        }

        //Lecturas
        $query= DB::select('call pGetFactuLecturas(?, ?, ?)', [$ini, $fin, $periodo]);
        foreach ($query as $item) {
            $lectura['medidor']=$item->medidor_id;
            $lectura['periodo']=  $periodotext; //$item->periodo;// revisando periodo
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
                $facturas[$factu['encabezado']['conexion_id']]['historico'][0]['consumo'] = number_format( $tConsumo/$cConsumo);
                $facturas[$factu['encabezado']['conexion_id']]['historico'][0]['valor'] = number_format( $tValor/$cConsumo,2);
            }
        }
        //dd($facturas);

        return  $facturas;


    }

    public  function iniHistorico(){

        $historico['mes'] = 'PRO';
        $historico['consumo'] = 0;
        $historico['valor'] = 0;

        $historial[]=$historico;
        return $historial;

    }

    public function getFacturas($periodo, $sector){
        $query=\DB::select('CALL pGetFacturasPeriodoSector(?,?)', [$periodo,$sector]);
        return $query;
    }

}
