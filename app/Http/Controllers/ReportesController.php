<?php

namespace simuaagua\Http\Controllers;

use Illuminate\Http\Request;

use phpDocumentor\Reflection\DocBlock\Tag\ReturnTag;
use simuaagua\Http\Requests;
use simuaagua\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use simuaagua\Reportes;
use Carbon\Carbon;

class ReportesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function diarioparam(){
        return view('reportes.diario');
    }

    public function diario(Route $route){
        $param['periodo']= (int)  $route->getParameter('periodo');
        $param['sector']=(int) $route->getParameter('sector');
        $param['fecha']=$route->getParameter('ano') . '/'. $route->getParameter('mes') . '/'. $route->getParameter('dia');;
      dd($param);
    }

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }

       public function store(Request $request)
    {
      //dd($request->request)
    switch ($request->input('tipo')){
        case 'diario':

               $date=   Carbon::createFromFormat('d/m/Y', $request->input('fecha'));
               $fecha=$date->year . '-'.$date->month . '-' . $date->day;
               
            if ($request->input('detalle')==1) {
                $datos=Reportes::diarioDetalle($fecha);
            }elseif($request->input('detalle')==2){
                $datos=Reportes::diarioResumen($fecha);   

               dd( $datos);
            }










               if($datos!=''){
                    $view = view('reportes.printdiario')
                        ->with('datos', $datos)
                        ->with('fecha',$request->input('fecha') );

                    //return $view;
                    $pdf = \App::make('dompdf.wrapper');

                    $pdf->loadHTML($view)->setPaper('letter');

                    $nombrearchivo = 'reporte diario.pdf';
                    return $pdf->stream($nombrearchivo);
                }else{
                    return redirect('reportes/diario')->with('message-error', 'No se encontrar registros que mostrar');
                }

            break;
        case 'mensual':




                Return 'mensual';
            break;

        case 'anual':

            break;

    }

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
