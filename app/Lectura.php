<?php

namespace simuaagua;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DB;
use myClass\librerias;

class Lectura extends Model
{
    protected $table = 'lecturas';

    protected $fillable = [
        'lecturaFin',
        'estado',
        'fechaFin'
    ];


    public static function listar($id){
        return DB::table('lecturas')
            ->where('conexion_id',$id)
            ->select('*')
            ->orderBy('periodo', 'des')
            ->get();

    }

    public static function find($periodo, $conexion_id, $medidor_id)
    {
        return DB::table('lecturas')
            ->where('periodo', $periodo)
            ->where('conexion_id', $conexion_id)
            ->where('medidor_id', $medidor_id)
            ->first();
    }

    public static function actualizar($datos)
    {

        $parametros[] = strlen($datos['lecturafin']) ? $datos['lecturafin'] : null;
        $parametros[] = strlen($datos['fechafin']) ? Carbon::createFromFormat('d/m/Y', $datos['fechafin']) : null;    // Carbon::createFromFormat('d/m/Y', $datos['fechafin']); // librerias::formatDateMy($datos['fechafin']);
        $parametros[] = $datos['estado'];
        //$parametros[]=  date("Y-m-d H:i:s");
        $parametros[] = $datos['periodo'];
        $parametros[] = $datos['conexion_id'];
        $parametros[] = $datos['medidor_id'];


        $affect = DB::update('update lecturas set lecturaFin=?,  fechaFin=?, estado=? where periodo=? and conexion_id=? and medidor_id=? ', $parametros);
        return $affect;
    }

    public static function getUltimasLecturas($id)
    {
        $query = DB::table('lecturas')
            ->where('conexion_id', $id)
            ->whereNotNull('lecturaFin')
            ->select('periodo',
                DB::raw('lecturaFin - lecturaIni as consumo'))
            ->orderBy('periodo', 'DESC')
            ->limit(7)
            ->get();

        krsort($query);

        foreach ($query as $item) {
            $item->periodotext = librerias::setPeriodoText($item->periodo);

        }
        return $query;
    }

    public static function getUltimoConsumo($id, $periodo)
    {
    $query=DB::table('facturaciones')
        ->where('conexion_id',$id)
        ->whereNotNull('medidor_id')
        ->where('periodo','>=', $periodo)
        ->sum(DB::raw('cant * precio'));
        return $query;
    }





}
