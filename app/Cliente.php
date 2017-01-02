<?php

namespace simuaagua;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clientes';

    protected $fillable=['nombre', 'apellido', 'direccion', 'dui', 'nit', 'email', 'tipo'];

  public function scopeName($query, $name){
      if(trim($name) !=''){
        $query->where(\DB::raw("CONCAT(nombre, ' ', apellido)"), 'like', "%$name%");
      }


  }
    public function scopeTipo($query, $tipo){
        $tipos=config('option.tiposClie');


        if ($tipo !='' && isset($tipos[$tipo]) ){

            $query->where('tipo','=', $tipo);
        }
    }

    public static function filterAndPaginate($name, $tipo)
    {
        return  Cliente::name($name)
            ->tipo($tipo)
            ->orderby('id', 'ASC')->paginate();
    }

    public static function Listar()
    {
        $clientes =\DB::table('clientes')
            ->select( \DB::raw("CONCAT(nombre, ' ' , apellido) as nombres"), 'id')
            ->orderBy('nombres')
            ->get();

        foreach ($clientes as $cliente){
            $lista[$cliente->id]= trim( $cliente->nombres);
        }
        return $lista;
    }
}
