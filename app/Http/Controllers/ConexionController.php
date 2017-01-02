<?php

namespace simuaagua\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use myClass\librerias;
use simuaagua\Cliente;
use simuaagua\grupotarifa;
use simuaagua\Medidor;
use simuaagua\Sector;
use simuaagua\Zona;
use simuaagua\Http\Requests\ConexionRequest;
use Illuminate\Routing\Route;
use simuaagua\Conexion;
use simuaagua\Http\Requests;
use simuaagua\Http\Controllers\Controller;

class ConexionController extends Controller
{


    public function __construct(){
        $this->middleware('auth');
        $this->beforeFilter('@find', ['only'=>['edit', 'update', 'destroy']]);
    }
    public function find(Route $route){
        $this->conexion= Conexion::find($route->getParameter('conexion'));
    }


    public function index()
    {
        //MOSTRAR LAS CONEXIONES
        $estados=config('option.estadoCon');
        $conexiones=Conexion::Conexiones();
        return view('conexion.index', compact('conexiones', 'estados'));
    }


    public function create()
    {

        $grupotarifas= grupotarifa::lists('grupo', 'id');
        $tipos=config('option.tipoCon');
        $clientes=Cliente::Listar();
        //return $clientes;
        $medidores=Medidor::Listar(0);
        $zonas=Zona::lists('zona', 'id');
        $sectores=Sector::lists('sector', 'id');

        $estados=config('option.estadoCon');

        return view('conexion.create', ['clientes'=>$clientes, 'zonas'=>$zonas,
                                            'grupotarifas'=>$grupotarifas,
                                         'sectores'=>$sectores,'medidores'=>$medidores ,
                                          'estados'=>$estados, 'tipos'=>$tipos]);
    }


    public function store(ConexionRequest $request)
    {
        Conexion::create($request->all());
        return redirect('/conexion')->with('message','Conexion creada correctamente');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $grupotarifas= grupotarifa::lists('grupo', 'id');

        $clientes=Cliente::Listar();
        $medidores=Medidor::Listar($id);
        $tipos=config('option.tipoCon');
        $zonas=Zona::lists('zona', 'id');
        $sectores=Sector::lists('sector', 'id');
        $estados=config('option.estadoCon');
        //dd($this->conexion['fecha_inicio']);
        return view('conexion.edit', ['conexion'=>$this->conexion,
                                        'medidores'=>$medidores,
                                        'grupotarifas'=>$grupotarifas,
                                        'clientes'=>$clientes, 'zonas'=>$zonas,
                                        'sectores'=>$sectores, 'estados'=>$estados,
                                        'tipos'=>$tipos]);
    }


    public function update(ConexionRequest $request, $id)
    {

        $this->conexion->fill($request->all());



        //Verificar checkboxes para desactivar
        $this->checkboxes($request,['cDui', 'cNit', 'cEscritura', 'cSalud', 'sagua', 'salca']);



        //dd($this->conexion);

        $this->conexion->save();
       return redirect('/conexion')->with('message','Conexion actualizada correctamente');
    }

    //VALIDAR CHECKBOXES

     private function checkboxes($request, $checkboxes){
           foreach($checkboxes as $campo){
               if (!$request->has($campo)){
                   $this->conexion->$campo=0;
               }
           }
     }



    public function destroy($id)
    {
        //
    }
}
