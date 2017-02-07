<?php
/**
 * Created by PhpStorm.
 * User: jcesa
 * Date: 23/03/2016
 * Time: 02:36 PM
 */

namespace myClass;


class librerias
{

    public static function validateDate($date, $format = 'Y-m-d H:i:s')
    {
        $d =  \DateTime::createFromFormat($format, $date);

        return $d && $d->format($format) == $date;
    }

    public static function formatDateMy($fecha){
         $fec = date_create_from_format('d/m/Y', $fecha);
         return date_format($fec, 'Y-m-d');
    }

    public static function formatDateLocal($fecha){
       if ($fecha){

//               return $fecha  ;
            $fec = date_create_from_format('Y-m-d', $fecha);
            return date_format($fec, 'd/m/Y');
      }else{
           return "";
       }

    }

    public static function calcuConsumo($ini, $fin){
        if ($fin){
            return $fin-$ini;
        }else{
            return "";
        }
    }

    public static function getNameCompany(){
        return "ALCALDIA MUNICIPAL DE SAN JOSE GUAYABAL";

    }

    public static function espacios($cantidad){
        $res="";
        for ($i=1; $i<=$cantidad; $i++){
            $res.= "&nbsp";
        }
        return $res;
    }

    public static function setPeriodoText($periodo){
        //Formatear periodo a AAA-XXXX
        $anio=substr($periodo, 0,4);
        $mes=substr($periodo,4,2) *1;
        $meses = config('option.mesesCorto');
        $periodotext= $meses[$mes].  '-'.$anio;
        return $periodotext;
    }


}