<?php

namespace simuaagua;

use Illuminate\Database\Eloquent\Model;

class grupotarifa extends Model
{
   protected $table='grupotarifas';
    protected $fillable=['id', 'grupo'];
}
