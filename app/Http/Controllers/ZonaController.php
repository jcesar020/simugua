<?php

namespace simuaagua\Http\Controllers;

use simuaagua\Http\Requests\ZonaRequest;
use Illuminate\Http\Request;
use simuaagua\Http\Requests;
use Illuminate\Routing\Route;
use simuaagua\Http\Controllers\Controller;
use simuaagua\Zona;

class ZonaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->beforeFilter('@find', ['only'=>['edit', 'update', 'destroy']]);
    }
    public function find(Route $route){
        $this->zona = Zona::find($route->getParameter('zona'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zonas=Zona::paginate();
        return view('zona.index', compact('zonas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('zona.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ZonaRequest $request)
    {
        Zona::create($request->all());
        return redirect('/zona')->with('message', 'Zona registrada correctamente');
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
        return view('zona.edit',['zona'=>$this->zona]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ZonaRequest $request, $id)
    {
        $this->zona->fill($request->all());
        $this->zona->save();
        return redirect('/zona')->with('message', 'Zona actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->zona->delete();
        return redirect('/zona')->with('message', 'Zona eliminada correctamente');
    }
}
