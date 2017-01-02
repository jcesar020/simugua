<?php

namespace simuaagua;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $table='zonas';

    protected $fillable=['zona', 'descripcion'];
}
