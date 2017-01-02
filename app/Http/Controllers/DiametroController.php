<?php

namespace simuaagua\Http\Controllers;

use Illuminate\Http\Request;

use simuaagua\Http\Requests;
use simuaagua\Http\Requests\DiametroRequest;
use simuaagua\Http\Controllers\Controller;
use simuaagua\Diametro;
use Illuminate\Routing\Route;

class DiametroController extends Controller
{
    public  function __construct(){
        $this->middleware('auth');
        $this->beforeFilter('@find', ['only'=>['edit', 'update', 'destroy']]);
    }

    public function find(Route $route){
        $this->diame=Diametro::find($route->getParameter('diametro'));
    }

    public function listing(){
        $diametros=Diametro::all();

        return response()->json(
            $diametros->toArray()
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('diametro.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('diametro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiametroRequest $request)
    {
        if($request->ajax()){
            Diametro::create($request->all());
            return response()->json(
                [
                    'message'=>'Creado satisfactoriamente'
                ]
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json(
            $this->diame->toArray()

        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->diame->fill($request->all());
        $this->diame->save();
        return response()->json([
                'message'=>'Registro actualizado'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->diame->delete();
        return response()->json([
            'message'=>'Registro Eliminado'
        ]);
    }
}