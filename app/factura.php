<?php

namespace simuaagua;

use Illuminate\Database\Eloquent\Model;

use DB;
use Carbon\Carbon;
use myClass\librerias;

class factura extends Model
{

    protected $table = 'facturas';

    protected $fillable = [
        'periodo',
        'conexion_id',
        'concepto',
        'fecha_vencimiento',
        'fecha_pago',
        'estado'];

    protected $date = ['created_at', 'updated_at', 'fecha_vencimiento', 'fecha_pago'];

    public static function getFacturaCon($id)
    {
        $factura = DB::table('facturas as f')
            ->join('conexiones as c', 'c.id', '=', 'f.conexion_id')
            ->join('clientes as cl', 'cl.id', '=', 'c.cliente_id')
            ->where('f.id', $id)
            ->select('f.*',
                DB::raw("CONCAT(cl.nombre,' ', cl.apellido) as cliente"))
            ->get();
        return $factura;
    }

    public static function getFacturasCon($id, $todo)
    {
        $query = \DB::select('CALL pGetFacturasCon(?,?)', [$id, $todo]);

        //Preformateamos fechas y otros
        if (count($query) > 0) {
            foreach ($query as $item) {
                $item->fecha_vencimiento = Carbon::parse($item->fecha_vencimiento)->format('d/m/Y');

                //Validar fecha de pago para mostrar
                if (librerias::validateDate($item->fecha_pago)) {
                    $item->fecha_pago = Carbon::parse($item->fecha_pago)->format('d/m/Y');
                } else {
                    $item->fecha_pago = '';
                }
                //Formatear etiqueta de estado de factura
                if ($item->estado == 'N') {
                    $item->estado = 'Anulada';
                    $item->label_estado = ' label-danger ';
                } elseif ($item->estado == 'P') {
                    $item->estado = 'Pagada';
                    $item->label_estado = ' label-succes ';
                } elseif ($item->estado == 'F') {
                    $item->estado = 'Factura';
                    $item->label_estado = ' label-default ';
                } elseif ($item->estado == 'V') {
                    $item->estado = 'Vencida';
                    $item->label_estado = ' label-warning ';
                } else {
                    $item->label_estado = '';
                }

            }
        }

        return $query;

    }

//return DB::table('conexiones')
//->join('clientes', 'clientes.id', "=", 'conexiones.cliente_id')
//->join('zonas','zonas.id', '=', 'conexiones.zona_id')
//->orderBy('conexiones.correlativo')
//->select('conexiones.*', DB::raw("CONCAT(clientes.nombre,' ', clientes.apellido) as nombres"), 'zonas.zona')
//->get();

}
