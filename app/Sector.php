<?php

namespace simuaagua;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table="sectores";
    protected $fillable=['sector', 'descripcion', 'contacto', 'telefono'];
}
