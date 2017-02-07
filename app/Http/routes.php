<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'FrontController@index');
get('home', 'FrontController@home');
Route::resource('login', 'logController');
Route::get('logout', 'logController@logout');



Route::get('test', 'TestController@index');

Route::resource('usuario', 'UserController');
Route::get('inituser', 'UserController@inituser');
Route::resource('cliente','ClienteController');
Route::resource('diametro', 'DiametroController');
Route::get('diametros', 'DiametroController@listing');
Route::resource('medidor', 'MedidorController');
Route::resource('zona', 'ZonaController');
Route::resource('conexion','ConexionController');
Route::resource('sector', 'SectorController');
Route::resource('lectura','LecturaController');



//RELACIONADAS LA LECTURAS
get('lectura/{periodo}/{sector}/ingresar',['uses'=>'LecturaController@ingresar']);
get('lectura/{periodo}/{sector}/generar',['uses'=>'LecturaController@generar']);
get('lectura/{periodo}/{sector}/validar',['uses'=>'LecturaController@validar']);
get('lectura/{periodo}/{sector}/aprobar',['uses'=>'LecturaController@aprobar']);
get('lectura/{periodo}/{sector}/imprimir',['uses'=> 'LecturaController@printing']);
resource('lecturacon', 'LecturaconController');
get('lecturascon/{id}', 'LecturaconController@listar' );


//FACTURACION
get('facturas/{periodo}/{sector}/facturar', 'facturarController@facturar');
get('facturas/{periodo}/{sector}/listado', 'facturarController@listado');
get('facturas/{periodo}/{sector}/{dia}/{mes}/{ano}/generar', 'facturarController@generar');
//get('facturas/listar', 'facturarController@listar');
get('facturas/imprimir', 'facturarController@imprimir');
get('facturas/multas', 'facturarController@multas');
get('facturas/multas/generar', 'facturarController@multasgenerar');
//get('facturas/listado', 'facturarController@listado');
resource('factura', 'facturaController');

resource('facturar', 'facturarController', ['only'=>['store']]);
get('facturar/{periodo}/{ini}', 'facturarController@printfactura');

//FACTURACIONES DETALLE DE FACTURAS
resource('facturaciones', 'FacturacionesController');
get('facturacionescon/{id}', 'FacturacionesController@listaPorCon');

resource('recibo', 'ReciboController');
//Route::get('pdf','PdfController@invoice');

resource('grupotarifas', 'grupotarifacontroller');

//INGRESO DE COBROS
get('cobros/ingresar', 'CobrosController@ingresar');

resource('cobros', 'CobrosController');
get('cobro/procesar', 'CobrosController@procesar');

//TARIFAS
resource('tarifa','TarifaController');

//REPORTES
get('reportes/diario', 'ReportesController@diarioparam');
get('reporte/diario/{dia}/{mes}/{ano}/{tipo}', "ReportesController@diario");
resource('reportes', 'ReportesController');



