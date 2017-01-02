<?php

namespace simuaagua;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    public static function getPeriodosFacturados(){
    $query= \DB::table('vperiodosfac')->get();
    foreach ($query as $row) {
        $periodos[$row->periodo]=$row->periodo;
    }
    return $periodos;

}

}

