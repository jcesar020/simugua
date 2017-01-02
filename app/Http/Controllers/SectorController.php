<?php

namespace simuaagua\Http\Controllers;
use simuaagua\Http\Requests\SectorRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use simuaagua\Http\Requests;
use simuaagua\Http\Controllers\Controller;
use simuaagua\Sector;

class SectorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->beforeFilter('@find', ['only'=>['edit', 'update', 'destroy']]);
    }
    public function find(Route $route){
        $this->sector = Sector::find($route->getParameter('sector'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectores=Sector::all();
        return view('sector.index', compact('sectores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sector.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectorRequest $request)
    {
        Sector::create($request->all());
        return redirect('/sector')->with('message', 'Sector registrado correctamente');
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
        return view('sector.edit',['sector'=>$this->sector]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SectorRequest $request, $id)
    {
        $this->sector->fill($request->all());
        $this->sector->save();
        return redirect('/sector')->with('message', 'Sector actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->sector->delete();
        return redirect('/sector')->with('message', 'Sector eliminado correctamente');
    }
}
