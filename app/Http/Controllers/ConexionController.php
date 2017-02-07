<?php

namespace simuaagua\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use myClass\librerias;
use simuaagua\Cliente;
use simuaagua\factura;
use simuaagua\grupotarifa;
use simuaagua\Lectura;
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
        $this->beforeFilter('@find', ['only'=>['edit', 'update', 'destroy', 'show']]);
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
        $con= Conexion::conexion($id);
        $tiposCon=config('option.tipoCon');
        $estados=config('option.estadoCon');


        $facturas= factura::getFacturasCon($id, 1);

        $lecturas= Lectura::getUltimasLecturas($id);

        //return Lectura::getUltimoConsumo($id,201607);


        $lectura=$this->setDataChar($lecturas, $id);

        return view('conexion.show')
            ->with('conexion' ,$con)
            ->with('tipoCon', $tiposCon)
            ->with('estados', $estados)
            ->with('facturas', $facturas)
            ->with('lectura', $lectura);

    }

    private function setDataChar($data, $id){
        $cuenta=0;
        $suma=0;
        $sumaMonto=0.0;
        $promedio=0.0;
        $promedioMonto=0.0;
        $labels=[];
        $values=[];
        $res=[];
        foreach($data as $item){
            $cuenta++;
            $suma+=$item->consumo;
            $labels[]=$item->periodotext;
            $values[]=$item->consumo;
        }
        if($cuenta>0){
            $sumaMonto=Lectura::getUltimoConsumo($id, $data[$cuenta-1]->periodo);
            $promedioMonto=$sumaMonto/$cuenta;

            $promedio=$suma/$cuenta;


        }

        $res['labels']=$labels;
        $res['values']=$values;
        $res['promedio']=$promedio;
        $res['suma']=$suma;
        $res['cuenta']=$cuenta;
        $res['sumaMonto']= number_format( $sumaMonto,2);
        $res['promedioMonto'] = number_format( $promedioMonto,2);

        return $res;
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
