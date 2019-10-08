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
 * Armas
 */

Route::get('/amparos', 'AmparosController@index');

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
Route::post('/recursos-humanos-form', 'RecursosHumanosController@create');
Route::get('/obtenerestadosprocesales', 'RecursosHumanosController@obtenerEstadosProcesales');
Route::get('/obtenerabogados', 'RecursosHumanosController@obtenerAbogados');
Route::get('/obtenerreportes', 'RecursosHumanosController@obtenerReportes');

/**
 * Transparencia
 */
Route::get('/transparencia', 'TransparenciaController@index');

/**
 * Penas y siniestros
 */

Route::get('/penal-siniestros', 'PenalSiniestrosController@index');
Route::get('/penal-siniestros-form', 'PenalSiniestrosController@create');
Route::post('/penal-siniestros-form', 'PenalSiniestrosController@store')->name('postPS');
Route::get('/penal-siniestros-edit/{id}', 'PenalSiniestrosController@edit');
Route::delete('/penal-siniestros-del/{id}', 'PenalSiniestrosController@destroy');

Route::get('/procedimientos-admin', 'ProcedimientosAdministrativosController@index');
