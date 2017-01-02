<?php

namespace simuaagua;

use Illuminate\Database\Eloquent\Model;
use DB;

class Cobro extends Model
{
    protected $table='cobrotemp';
    protected $fillable=['factura_id',  'usuario_id','fecha'];

    function getCobros(){
        $cobros=DB::select('select * from vListarCobros');



    }

    function delCobro($id){
        DB::delete('DELETE FROM cobrotemp WHERE factura_id=' . $id);
    }


}
