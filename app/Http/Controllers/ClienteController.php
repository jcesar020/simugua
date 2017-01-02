<?php

namespace simuaagua\Http\Controllers;

use Illuminate\Http\Request;
use simuaagua\Http\Requests\ClienteCreateRequest;
use simuaagua\Http\Requests\ClienteUpdateRequest;
use simuaagua\Http\Requests;
use simuaagua\Http\Controllers\Controller;
use simuaagua\cliente;
use Redirect;
use Illuminate\Routing\Route;
use simuaagua\Zona;



class ClienteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');

        $this->beforeFilter('@find', ['only'=>['edit', 'update', 'destroy']]);
    }
    public function find(Route $route){
        $this->cliente = Cliente::find($route->getParameter('cliente'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
        $tipos=config('option.tiposClie');

        $clientes = Cliente::filterAndPaginate($request->get('name'),$request->get('tipo'));
        return view('cliente.index', compact('clientes', 'tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tipos=config('option.tiposClie');
        return view('cliente.create', compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteCreateRequest $request)
    {
        Cliente::create($request->all());
        return redirect('/cliente')->with('message', 'Usuario creado correctamente');
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
        $tipos=config('option.tiposClie');
        return view('cliente.edit', ['cliente'=>$this->cliente, 'tipos'=>$tipos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteUpdateRequest $request, $id)
    {
        $this->cliente->fill($request->all());
        $this->cliente->save();
        return redirect('/cliente')->with('message', 'Cliente actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       $this->cliente->delete();

        return redirect('/cliente')->with( 'message', $this->cliente->nombre .  ' Eliminado correctamente');
    }
}
