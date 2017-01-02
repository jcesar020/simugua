<?php

namespace simuaagua\Http\Controllers;

use Illuminate\Http\Request;

use simuaagua\Diametro;
use simuaagua\Http\Requests;
use simuaagua\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use simuaagua\Http\Requests\MedidorRequest;
use simuaagua\Http\Requests\MedidorUpdateRequest;
use simuaagua\Medidor;

class MedidorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->beforeFilter('@find', ['only'=>['edit', 'update', 'destroy']]);
    }
    public function find(Route $route){
        $this->medidor = Medidor::find($route->getParameter('medidor'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diametros=Diametro::lists('diametro', 'id');
        $medidores=Medidor::all();
        return view('medidor.index', compact('medidores', 'diametros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $diametros=Diametro::lists('diametro', 'id');
        return view('medidor.create', compact('diametros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedidorRequest $request)
    {
        Medidor::create($request->all());
        return redirect('/medidor')->with('message', 'Medidor registrado correctamente');
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
        $diametros=Diametro::lists('diametro', 'id');
        return view('medidor.edit',['medidor'=>$this->medidor, 'diametros'=>$diametros]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MedidorUpdateRequest $request, $id)
    {
       $this->medidor->fill($request->all());
        $this->medidor->save();
        return redirect('/medidor')->with('message', 'Medidor actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->medidor->softdelete();
    }
}
