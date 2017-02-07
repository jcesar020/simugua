<?php

namespace simuaagua;

use DB;
use Illuminate\Database\Eloquent\Model;

class Facturaciones extends Model
{
    protected $table = 'facturaciones';
    protected $fillable = ['periodo', 'conexion_id', 'medidor_id', 'catologo_id', 'concepto', 'cant', 'precio', 'plan_id', 'manual', 'estado', 'user_id'];
    protected $dates = ['created_at', 'updated_at'];

    public static function getFacturacionesCon($id)
    {
        $detalle = DB::table('facturaciones as fs')
            ->join('facturas_detalle as fd', 'fs.id', '=', 'fd.facturaciones_id')
            ->join('catalogos as cat', 'cat.id','=' , 'fs.catalogo_id')
            ->where('fd.factura_id', $id)
            ->select('fs.id', 'fs.cant', 'fs.precio', 'fs.catalogo_id', 'cat.concepto as catconcepto',
                'fs.concepto'
            )
            ->get();
        return $detalle;
    }


}
