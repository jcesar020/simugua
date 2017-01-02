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

//FACTURACION
get('facturas/{periodo}/{sector}/facturar', 'facturaController@facturar');
get('facturas/{periodo}/{sector}/listado', 'facturaController@listado');
get('facturas/{periodo}/{sector}/{dia}/{mes}/{ano}/generar', 'facturaController@generar');
//get('facturas/listar', 'facturaController@listar');
get('facturas/imprimir', 'facturaController@imprimir');
get('facturas/multas', 'facturaController@multas');
get('facturas/multas/generar', 'facturaController@multasgenerar');
get('facturas/listado', 'facturaController@listado');
resource('facturar', 'facturarController');
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



