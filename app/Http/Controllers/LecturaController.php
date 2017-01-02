<?php

namespace simuaagua\Http\Controllers;

use Faker\Provider\cs_CZ\DateTime;
use Illuminate\Http\Request;

use myClass\librerias;
use myClass\myTest;
use simuaagua\Http\Requests;
use simuaagua\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use DB;
use simuaagua\Lectura;
use simuaagua\Sector;

class LecturaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ingresar(Route $route){
        $param['periodo']=$route->getParameter('periodo');
        $param['sector']=$route->getParameter('sector') ;
        $param['sectorName']= Sector::find($param['sector'])->sector ;


        $estados= config('option.estadosLecturas');

        $datos= DB::select('call pObtenerLecturas(?,?)',[$param['periodo'], $param['sector']]);

        return view('lectura.tableEdit')
            ->with('datos',$datos)
            ->with('estados', $estados)
            ->with('param', $param) ;
    }

 public function generar(Route $route){
     $param['periodo']=(int) $route->getParameter('periodo');
     $param['sector']=(int) $route->getParameter('sector') ;
     $respuesta= DB::select('call pGenerarLecturas(?,?)',[$param['periodo'], $param['sector']]);
     $res=$respuesta[0]->res;
     return redirect()->action('LecturaController@ingresar',[$param['periodo'], $param['sector']])
         ->with('message', $res . ' lecturas generadas');
 }

 public function validar(Route $route){
        $param['periodo']=$route->getParameter('periodo');
        $param['sector']=$route->getParameter('sector') ;
        $respuesta =  DB::select('call pValidarLecturas(?,?)',[$param['periodo'], $param['sector']]);

        $res= $respuesta[0]->res;

        return redirect()->action('LecturaController@ingresar',[$param['periodo'], $param['sector']])
            ->with('message', $res . ' lecturas validadas');
    }

    public function Aprobar(Route $route){
        $param['periodo']=$route->getParameter('periodo');
        $param['sector']=$route->getParameter('sector') ;
        $respuesta= DB::select('call pAprobarLecturas(?,?)',[$param['periodo'], $param['sector']]);
        $res= $respuesta[0]->res;
        return redirect()->action('LecturaController@ingresar',[$param['periodo'], $param['sector']])
            ->with('message', $res . ' lecturas aprobadas');
    }

    public function index(request $request)
    {
        $years= myTest::Years(2016);
        $mesActual=date('mes');



        $periodo= $request->get('anio') . $request->get('mes');
        if($periodo==""){
            $periodo=current($years) . $mesActual;
        }

        $sectores= \DB::select('call pGetSecLecturas(?)', [$periodo]);

       return view("lectura.index")->with('datos', $sectores)->with('years', $years);
    }


    public function update(Request $request, $id)
    {
        //Actualiza el ingreso de las lecturas
         Lectura::actualizar($request);

        return response()->json([
            'message'=>'Registro Actualizado'
        ]);

    }


    public function printing(Route $route){
        $param['name']=librerias::getNameCompany();
        $param['periodo']=$route->getParameter('periodo');
        $param['sector']=$route->getParameter('sector');
        $param['sectorName']= Sector::find($param['sector'])->sector ;



        $datos= DB::select('call pObtenerLecturas(?,?)',[ $param['periodo'], $param['sector']]);


        $view= view('lectura.print')
                ->with('datos', $datos )
                ->with('param', $param);



        $pdf=\App::make('dompdf.wrapper');

        $pdf->loadHTML($view)->setPaper('letter');


        //$pdf->setPaper('letter',  'landscape');

      return $pdf->stream('Lecturas');

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

    }

    public function destroy($id)
    {
        //
    }

    public function mostrar(){
       // return view('lectura.tableEdit');
    }
}
