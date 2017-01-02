<?php

namespace simuaagua\Http\Controllers;

use Illuminate\Http\Request;
use simuaagua\Http\Requests\CobroAddRequest;
use simuaagua\Http\Requests;
use simuaagua\Http\Controllers\Controller;
use simuaagua\Cobro;

class CobrosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ingresar(){
        return view('cobro.cobro');
    }
    public function index()
    {
        $cobros=\DB::select('select * from vListarCobros');
        return response()->json(
            $cobros
        );
    }

    public function create()
    {
        return 'Create';
    }

    public function store(CobroAddRequest $request)
    {
        if($request->ajax()){
       //     Cobro::create($request->all());
       //     return response()->json(
       //         [
       //             //'message'=>'Ingresado satisfactoriamente'
       //         ]
       //   );

            $parametros[]=intval( $request->factura_id);
            $parametros[]=intval($request->usuario_id);
            $parametros[]=$request->fecha;

            //return $parametros;

           $result= \DB::select('call pInsertCobro(?,?,?)', $parametros );
           //return $result;

            return response()->json( $result);

        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return 'edit';
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        \DB::delete('DELETE FROM cobrotemp WHERE factura_id=' . $id);

        return response()->json([
            'message'=>'Registro Eliminado'
        ]);
    }

    public function procesar(){

       \DB::select('call pProcesarCobros');
        return redirect('cobros\ingresar')->with('message', 'Facturas ya fueron aplicadas');

    }
}
