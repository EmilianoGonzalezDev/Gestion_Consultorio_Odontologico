<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* WELCOME */
Route::get('/', function () { return view('welcome'); });

/* AUTENTICACIÓN */
Auth::routes();

/* HOME */
Route::get('/home', 'HomeController@index')->name('home');

/* EMPLEADOS (User) */ 
Route::resource('/empleados', 'EmpleadoController');
Route::get('empleados/restore/{id}', ['as' =>  'empleados.restore', 'uses' => 'EmpleadoController@restore']);
Route::get('/empleados.eliminados', ['as' =>  'empleados.verEliminados', 'uses' => 'EmpleadoController@verEliminados']);
Route::get('/empleados.configuracion', ['as' =>  'empleados.configuracion', 'uses' => 'EmpleadoController@configuracion']);
Route::post('/empleados.guardarConfiguracion', ['as' =>  'empleados.guardarConfiguracion', 'uses' => 'EmpleadoController@guardarConfiguracion']);


/* PACIENTES */
Route::resource('/pacientes', 'pacienteController');
Route::get('pacientes/restore/{id}', ['as' =>  'pacientes.restore', 'uses' => 'PacienteController@restore']);
Route::get('/pacientes.eliminados', ['as' =>  'pacientes.verEliminados', 'uses' => 'PacienteController@verEliminados']);

/* INSUMOS */
Route::resource('/insumos', 'InsumoController');
Route::get('insumos/restore/{id}', ['as' =>  'insumos.restore', 'uses' => 'InsumoController@restore']);
Route::get('/insumos.eliminados', ['as' =>  'insumos.verEliminados', 'uses' => 'InsumoController@verEliminados']);
Route::get('/insumos/reducirstock/{id}', ['as' =>  'insumos.reducirStock', 'uses' => 'InsumoController@reducirStock']);
Route::post('/insumos.guardarReducirStock', ['as' =>  'insumos.guardarReducirStock', 'uses' => 'InsumoController@guardarReducirStock']);
Route::delete('insumos/deshacerReduccion/{id}', ['as' =>  'insumos.deshacerReduccion', 'uses' => 'InsumoController@deshacerReduccion']);
Route::get('insumos/restaurarReduccion/{id}', ['as' =>  'insumos.restaurarReduccion', 'uses' => 'InsumoController@restaurarReduccion']);


/* COMPRAINSUMOS */
Route::resource('/comprainsumos', 'CompraInsumoController');
Route::get('comprainsumos/restore/{id}', ['as' =>  'comprainsumos.restore', 'uses' => 'CompraInsumoController@restore']);
Route::get('/comprainsumos.eliminados', ['as' =>  'comprainsumos.verEliminados', 'uses' => 'CompraInsumoController@verEliminados']);
Route::get('/comprainsumos/creardesdelistado/{id}', ['as' =>  'comprainsumos.crearDesdeListado', 'uses' => 'CompraInsumoController@crearDesdeListado']);

/* OrtodonciaS */
Route::resource('/ortodoncias', 'OrtodonciaController');
Route::get('ortodoncias/restore/{id}', ['as' =>  'ortodoncias.restore', 'uses' => 'OrtodonciaController@restore']);
Route::get('/ortodoncias.eliminados', ['as' =>  'ortodoncias.verEliminados', 'uses' => 'OrtodonciaController@verEliminados']);

/* ATENCIONES */
Route::resource('/atenciones', 'AtencionController');
Route::get('atenciones/restore/{id}', ['as' =>  'atenciones.restore', 'uses' => 'AtencionController@restore']);
Route::get('/atenciones.eliminados', ['as' =>  'atenciones.verEliminados', 'uses' => 'AtencionController@verEliminados']);
Route::get('/atenciones/nuevopago/{id}', ['as' =>  'atenciones.nuevoPago', 'uses' => 'AtencionController@nuevoPago']);
Route::post('/atenciones.guardarPago', ['as' =>  'atenciones.guardarPago', 'uses' => 'AtencionController@guardarPago']);
Route::delete('/atenciones/eliminarpago/{id}', ['as' =>  'atenciones.eliminarPago', 'uses' => 'AtencionController@eliminarPago']);
Route::get('/atenciones/restaurarpago/{id}', ['as' =>  'atenciones.restaurarPago', 'uses' => 'AtencionController@restaurarPago']);
Route::get('atenciones/createByID/{id}', ['as' =>  'atenciones.createByID', 'uses' => 'AtencionController@createByID']);
Route::post('atenciones/guardarServiciosPrestados', 'AtencionController@guardarServiciosPrestados')->name('guardarServiciosPrestados');
Route::get('atenciones.getAtenciones', 'AtencionController@getAtenciones')->name('getAtenciones');

/* NOMECLATURAS*/
Route::resource('/nomeclaturas', 'NomeclaturaController');

/* REPORTES */
Route::get('/reportes/index', ['as' =>  'reportes.index', 'uses' => 'ReporteController@index']);
Route::get('reportes.exportInsumosBajoStock', ['as' =>  'reportes.insumosbajostock', 'uses' => 'ReporteController@exportInsumosBajoStock']);
Route::post('reportes.mostrarPacientesPorFecha', ['as' =>  'reportes.mostrarPacientesPorFecha', 'uses' => 'ReporteController@mostrarPacientesPorFecha']);
Route::get('reportes.PacientesPorNacimiento', ['as' =>  'reportes.PacientesPorNacimiento', 'uses' => 'ReporteController@PacientesPorNacimiento']);
Route::get('reportes.ingresoDeEfectivo', ['as' =>  'reportes.ingresoDeEfectivo', 'uses' => 'ReporteController@ingresoDeEfectivo']);
//Route::get('', ['as' =>  'reportes.pacientesporfecha', 'uses' => 'ReporteController@exportPacientesPorFecha']);

/* BACKUP */
Route::get('backup.index', ['as' =>  'backup.index', 'uses' => 'BackupController@index']);
Route::get('backup.descargar', ['as' =>  'backup.descargar', 'uses' => 'BackupController@descargar']);

