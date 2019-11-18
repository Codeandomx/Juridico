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

use App\Http\Controllers;

Route::get('/', function () {
    return view('init');
});

/**
 * Amparos
 */
Route::get('/amparos', 'AmparosController@index');

/**
 * Armas
 */

Route::get('/armas', 'ArmasController@index');
Route::get('/armas-form', 'ArmasController@create');
Route::post('/armas-form', 'ArmasController@store')->name('postArmas');
Route::get('/armas-edit/{id}', 'ArmasController@edit');
Route::delete('/armas-del/{id}', 'ArmasController@destroy');
Route::get('/obtenerestados', 'ArmasController@obtenerEstados');
/**
 * Derechos humanos
 */

Route::get('/derechos-humanos', 'DerechosHumanosController@index');
Route::get('/derechos-humanos-form', 'DerechosHumanosController@form');
Route::post('/derechos-humanos-form', 'DerechosHumanosController@create')->name('postDH');
Route::get('/derechos-humanos-editar/{id}', 'DerechosHumanosController@edit');
Route::get('/obtenerestadosprocesales', 'DerechosHumanosController@obtenerEstadosProcesales');
Route::put('/derechos-humanos-edit/{id}','DerechosHumanosController@update');
Route::get('/derechos-humanos-archivo','DerechosHumanosController@archivo');
Route::delete('/derechos-humanos-del/{id}', 'DerechosHumanosController@destroy');
Route::get('/obtenerabogados', 'DerechosHumanosController@obtenerAbogados');
Route::get('/obtenerreportes', 'DerechosHumanosController@obtenerReportes');

/**
 * Transparencia
 */
Route::get('/transparencia', 'TransparenciaController@index');
Route::get('/transparencia-form', 'TransparenciaController@create');
Route::post('transparencia-form', 'TransparenciaController@store')->name('postT');
Route::get('/transparencia-edit/{id}', 'TransparenciaController@edit')->name('editT');
Route::delete('/transparencia-del/{id}', 'TransparenciaController@destroy');
Route::get('/obtenerobservaciones', 'TransparenciaController@obtenerObservaciones');

/**
 * Penas y siniestros
 */

Route::get('/penal-siniestros', 'PenalSiniestrosController@index');
Route::get('/penal-siniestros-form', 'PenalSiniestrosController@create');
Route::post('/penal-siniestros-form', 'PenalSiniestrosController@store')->name('postPS');
Route::get('/penal-siniestros-edit/{id}', 'PenalSiniestrosController@edit')->name('editPS');
Route::delete('/penal-siniestros-del/{id}', 'PenalSiniestrosController@destroy');

Route::get('/procedimientos-admin', 'ProcedimientosAdministrativosController@index');
