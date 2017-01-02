<?php

namespace simuaagua\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use simuaagua\Http\Requests;
use simuaagua\Http\Controllers\Controller;
use myClass\myTest;


class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* $clave=13;
        //$queri= DB::select(DB::raw('select * from conexiones where id= :idi '),['idi'=>$clave]);

        $queri= DB::select('call pListarMedidores(?)', [$clave]);
        foreach ($queri as $query){
            $listado[$query->concatname]=$query->id;
        }

        $medidores=DB::table('medidores as m')
            ->whereNotExists(function($query){
                $query->select(DB::raw(1))
                    ->from('conexiones as c')
                    ->whereRaw("c.medidor_id=m.id and c.id= 13");
            })

            ->get();

        dd($listado);*/

        //require("MyClass/myTest.php");
        $valores= myTest::miTest();
        //return  $valores;
        return view("test.prueba");
        //return view('test.tableEdit');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
