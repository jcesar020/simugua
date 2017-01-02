<?php

namespace simuaagua;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

class Medidor extends Model
{
    protected $table='medidores';

    protected $fillable=['id', 'marca','diametro_id', 'lectura', 'baja', 'fechalectura'];

    protected $date = [ 'created_at', 'updated_at', 'baja', 'fechalectura'];

    public static function Listar($con=0)
    {

        // return DB::select('call pListarMedidores(?)', [$con])->lists('concatname', 'id');

        $queri = DB::select('call pListarMedidores(?)', [$con]);
        foreach ($queri as $query) {
            $listado[$query->id] = $query->concatname;
        }
        return $listado;
    }
        /*
        return  DB::table('medidores as m')
            ->join('diametros as d', 'd.id','=','m.diametro_id')
            ->selectRaw('CONCAT(m.id, " | ", m.marca, " | ", d.diametro, " | Lec. " , m.lectura ) as concatname, m.id')
            ->lists('concatname', 'm.id');

        */

        public function  setFechalecturaAttribute($valor){
            $this->attributes['fechalectura'] = strlen($valor)? Carbon::createFromFormat('d/m/Y', $valor) : null;
        }
        public function getFechalecturaAttribute($valor){
            return $valor==null ? "":  Carbon::parse($valor)->format('d/m/Y');

        }

        public function  setBajaAttribute($valor){
            $this->attributes['baja'] = strlen($valor)? Carbon::createFromFormat('d/m/Y', $valor) : null;

        }
        public function getBajaAttribute($valor){
            return $valor==null ? "":  Carbon::parse($valor)->format('d/m/Y');

        }
}
