<?php

namespace simuaagua\Http\Controllers;

use Illuminate\Http\Request;

use simuaagua\Http\Requests;
use simuaagua\Http\Controllers\Controller;
use simuaagua\Http\Requests\facturarParametros;
use simuaagua\factura;
use simuaagua\Sector;

class facturarController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }


    public function store(facturarParametros $request)
    {

        $periodo= $request->input('periodo');
        $sector_id=$request->input('sector_id');
        $sector=Sector::find($sector_id);

        $ini= $request->input('desde');
        $fin= $request->input('hasta');
        $mensaje=$request->input('mensaje');
        //$mensaje= "!!LOS SERVICIOS CON TRES O MAS MESES EN MORA SE SUSPENDERAN, DESPUES DE LA FECHA DE VENCIMIENTO, ACERCATE A LA ALCALDIA PARA REALIZAR TU PAGO!!";

        $facturas= factura::getFacturacion($ini, $fin, $periodo, $sector_id, $mensaje);

      
        $view=view('factura3.facturas')
            ->with('facturas',$facturas)
            ->with('sector', $sector);

        $pdf=\App::make('dompdf.wrapper');

        $paper_size = array(0,0,595.28,960);

        $pdf->loadHTML($view)->setPaper($paper_size);

        $nombrearchivo=$periodo .'_' .$sector_id .'_' . $ini.'_' . $fin. '.pdf';
        return $pdf->stream($nombrearchivo);



    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
