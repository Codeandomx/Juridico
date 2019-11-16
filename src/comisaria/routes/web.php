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
 * Recursos humanos
 */

Route::get('/recursos-humanos', 'RecursosHumanosController@index');
Route::get('/recursos-humanos-form', 'RecursosHumanosController@form');
Route::post('/recursos-humanos-form', 'RecursosHumanosController@create')->name('postDH');
Route::get('/obtenerestadosprocesales', 'RecursosHumanosController@obtenerEstadosProcesales');
Route::get('/recursos-humanos-edit/{id}','RecursosHumanosController@edit');
Route::delete('/recursos-humanos-del/{id}', 'RecursosHumanosController@destroy');
Route::get('/obtenerabogados', 'RecursosHumanosController@obtenerAbogados');
Route::get('/obtenerreportes', 'RecursosHumanosController@obtenerReportes');

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
