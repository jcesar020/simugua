<?php

namespace simuaagua;

use Illuminate\Database\Eloquent\Model;
use DB;

class Reportes extends Model
{

    public static function diarioDetalle($fecha){
       $query = DB::select("call pReporteCobrosDiario('".$fecha."')");
        $gtotal=0.0;


        foreach($query as $item){
            $respuesta[$item->id]['id']= $item->id;
            $respuesta[$item->id]['nombre']= $item->nombre;
            $detalle['cod']=$item->catalogo_id;
            $detalle['concepto']=$item->concepto;
            $detalle['valor']=$item->valor;

            $respuesta[$item->id]['detalle'][]=$detalle;
            if(isset($respuesta[$item->id]['total'])){
                $respuesta[$item->id]['total']+=$item->valor;
            }else{

                $respuesta[$item->id]['total']=$item->valor;
            }
            $gtotal+= $item->valor;
        }

        if (isset($respuesta)){
            return $respuesta;
        }else{
            return '';
        }
    }

        public static function diarioResumen($fecha){
       $query = DB::select("call pReporteCobrosDiarioResumen('".$fecha."')");
        $gtotal=0.0;

        foreach($query as $item){
            
            $detalle['cod']=$item->cod;
            $detalle['concepto']=$item->concepto;
            $detalle['valor']=$item->valor;

            $respuesta['detalle'][]=$detalle;
            
            if(isset($respuesta['total'])){
                $respuesta['total']+=$item->valor;
            }else{

                $respuesta['total']=$item->valor;
            }
                    }

        if (isset($respuesta)){
            return $respuesta;
        }else{
            return '';
        }
    }

}
