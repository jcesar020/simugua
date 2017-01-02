<?php

namespace simuaagua\Http\Controllers;

use Illuminate\Http\Request;

use mysqli;
use simuaagua\factura;
use simuaagua\Http\Requests;
use simuaagua\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use simuaagua\Periodo;
use simuaagua\Sector;

use DB;

class facturaController extends Controller
{

    public function  listado(Route $route){
        $periodo=$route->getParameter('periodo');
        $sector=$route->getParameter('sector') ;


        return factura::getFacturas($periodo, $sector);
    }

    public function imprimir(){
        $periodos=Periodo::getPeriodosFacturados();
        $sectores=Sector::lists('sector', 'id');

        return view('facturacion.printParam')
            ->with('periodos', $periodos)
            ->with('sectores', $sectores);
    }


    public function listar(){

    }

    function genServicio($periodo, $sector){

            $mysqli = new mysqli("localhost", "root", "", "simuagua");
            if ($mysqli->connect_error) {
                echo "Falló la conexión a MySQL: (" . $mysqli->connect_error . ") " . $mysqli->connect_error;
            }

            if (!$mysqli->query("call pGenFactuServiciosCodigo(201602, 1, 101)")) {
                echo "Falló CALL: (" . $mysqli->error . ") " . $mysqli->error;
            }

    }


    public function generar(Route $route){
        $param['periodo']= (int)  $route->getParameter('periodo');
        $param['sector']=(int) $route->getParameter('sector');
        $param['fechaVen']=$route->getParameter('ano') . '/'. $route->getParameter('mes') . '/'. $route->getParameter('dia');;


        //Generar servicios
            //Servicios de agua
            $resp1=DB::select('call pGenFactuServiciosCodigo(?, ?, 101)', [$param['periodo'], $param['sector']]);
            $servicio=$resp1[0]->res;

            //Servicios de alcantarilla
           // DB::reconnect();
            $resp2=DB::select('call pGenFactuServiciosCodigo(?, ?, 102)', [$param['periodo'], $param['sector']]);
            $servicio+= $resp2[0]->res;

            //Actualizar lecturas
            //DB::reconnect();
            $resp3=DB::select('call pActualizarLecturasEstadoFacturado(?, ?)', [$param['periodo'], $param['sector']]);
            $lecturas= $resp3[0]->res;

            //Multas
           // DB::reconnect();
            $resp4=DB::select('CALL pGenMultasFacturasVencidas');
            $multas= $resp4[0]->res;

           //Facturacion
           
            $resp5=DB::select('CALL pGenerarFacturas(?, ?,?)', [$param['periodo'], $param['sector'], $param['fechaVen']]);
            $facturas= $resp5[0]->res;

           //Anulacion de facturas Anterioreres
           
            $resp6=DB::select('CALL pAnularFacturasVencidas(?, ?)', [$param['periodo'], $param['sector']]);
            $nulas= $resp6[0]->res;

        

        $res=['servicios'=>$servicio,
                'multas'=>$multas,
                'facturas'=>$facturas,
                'lecturas'=>$lecturas,
                'nulas'=>$nulas,
                ];

   
        return response()->json($res);

    }
    public function facturar(Route $route){
       $param['periodo']=$route->getParameter('periodo');
       $param['sector']=$route->getParameter('sector');
       $param['sectorName']= Sector::find($param['sector'])->sector ;


        $estados= config('option.estadosLecturas');

        $datos= DB::select('call pGetLecturasAprobadas(?,?)',[$param['periodo'], $param['sector']]);

        //return $datos;
        return view('facturacion.facturar')
            ->with('datos',$datos)
            ->with('param', $param);
    }

    public function multas(){

        $resultado=DB::select('select * from vlistarfacturasvencer');

        Return view('multas.multas')
                ->with('datos', $resultado);
    }
    public function multasgenerar(){
        $respuesta=DB::select('call pSetFacturasVencidas');
        $ven=$respuesta[0]->res;
        $respuesta=DB::select('call pGenMultasFacturasVencidas');
        $mul=$respuesta[0]->res;

        //Return redirect('facturas/multas'); //view('multas.multas');
            //->with('message',  $mul . ' Multas generadas' );

         return redirect('/facturas/multas')->with('message', $mul . ' Multas generadas');

    }
}
