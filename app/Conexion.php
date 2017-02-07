<?php

namespace simuaagua;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use myClass\librerias;


class Conexion extends Model
{
    use SoftDeletes;

    protected $table='conexiones';

    protected $fillable=['correlativo',
                        'medidor_id',
                        'cliente_id',
                        'zona_id',
                        'sector_id',
                        'tipoCon',
                        'estadoCon',
                        'direccion',
                        'observacion',
                        'cEscritura',
                        'cDui',
                        'cNit',
                        'cSalud',
                        'sector_id',
                        'sagua',
                        'salca',
                        'gtarifa_id',
                        'fecha_baja',
                        'fecha_instalacion',
                        'fecha_inicio'];

    protected $date = ['deleted_ad', 'created_at', 'updated_at', 'fecha_baja', 'fecha_instalacion', 'fecha_inicio'];



    public static function Conexiones(){
        return DB::table('conexiones')
            ->join('clientes', 'clientes.id', "=", 'conexiones.cliente_id')
            ->join('zonas','zonas.id', '=', 'conexiones.zona_id')
            ->orderBy('conexiones.correlativo')
            ->select('conexiones.*', DB::raw("CONCAT(clientes.nombre,' ', clientes.apellido) as nombres"), 'zonas.zona')
            ->get();
    }

    public static function conexion($id){
        return DB::table('conexiones')
            ->join('clientes','clientes.id','=','conexiones.cliente_id')
            ->leftJoin('clientes as cl2', 'cl2.id','=', 'conexiones.clienteant_id')
            ->join('zonas', 'zonas.id','=','conexiones.zona_id')
            ->join('sectores', 'sectores.id','=','conexiones.sector_id')
            ->join('grupotarifas', 'grupotarifas.id','=','conexiones.gtarifa_id')
            ->select('conexiones.*',
                DB::raw("CONCAT(clientes.nombre,' ', clientes.apellido) as cliente"),
                DB::raw("CONCAT(cl2.nombre,' ', cl2.apellido) as clienteant"),
                'zonas.zona',
                'sectores.sector',
                 'grupotarifas.grupo')
            ->where('conexiones.id' , $id)
            ->get();
        //return null;
    }

    public function setMedidorIdAttribute($valor){

        if(empty($valor)){
            $this->attributes['medidor_id']=null;

        }else{
            $this->attributes['medidor_id']=$valor;
        }


    }

    //TRATAMIENTO DE CAMPOS FECHA

    public function  setFechaInicioAttribute($valor){
        $this->attributes['fecha_inicio'] = strlen($valor)? Carbon::createFromFormat('d/m/Y', $valor) : null;
    }
    public function getFechaInicioAttribute($valor)
    {
        return $valor==null ? "":  Carbon::parse($valor)->format('d/m/Y');
    }

    public function  setFechaInstalacionAttribute($valor){

        $this->attributes['fecha_instalacion'] = strlen($valor)? Carbon::createFromFormat('d/m/Y', $valor) : null;
    }
    public function getFechaInstalacionAttribute($valor){
        return $valor==null ? "":  Carbon::parse($valor)->format('d/m/Y');
    }

    public function  setFechaBajaAttribute($valor){
        if (strlen($valor)){
            $this->attributes['fecha_baja'] =    Carbon::createFromFormat('d/m/Y', $valor);
            $this->attributes['estadoCon'] ="I";
        }else{
            $this->attributes['fecha_baja'] = null;
            $this->attributes['estadoCon'] ="A";
        }

    }
    public function getFechaBajaAttribute($valor)
    {
        return $valor==null ? "":  Carbon::parse($valor)->format('d/m/Y');
    }

}
