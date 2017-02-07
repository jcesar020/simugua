<?php

namespace simuaagua\Http\Controllers;

use Illuminate\Http\Request;


use simuaagua\factura;
use simuaagua\Facturaciones;
use simuaagua\Http\Requests;
use simuaagua\Http\Controllers\Controller;
use Illuminate\Routing\Route;


use DB;

class facturaController extends Controller
{

    public static function getFacturas($periodo, $sector){
        //$query=\DB::select('CALL pGetFacturasPeriodoSector(?,?)', [$periodo,$sector]);
       // return $query;

        return 'Mostrar factura';
    }



    public function index()
    {
        return 'Listado de Facturas';
    }


    public function create()
    {

    }


    public function store(DiametroRequest $request)
    {

    }


    public function show($id)
    {
       // $factura=factura::find($id);
   // $factura=factura::getFacturasCon($id);


       // return $factura;
        return 'Mostrando factura';
    }


    public function edit($id)
    {
        $factura= factura::getFacturaCon($id);
        //return $factura;

        $detalle=Facturaciones::getFacturacionesCon($id);

        //return $detalle;

        return view('factura.edit');

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }


}
