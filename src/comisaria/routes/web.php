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

Route::get('/amparos', 'AmparosController@index');

Route::get('/armas', 'ArmasController@index');

Route::get('/recursos-humanos', 'RecursosHumanosController@index');
Route::get('/recursos-humanos-form', 'RecursosHumanosController@form');
Route::get('/obtenerestadosprocesales', 'RecursosHumanosController@obtenerEstadosProcesales');

Route::get('/transparencia', 'TransparenciaController@index');

Route::get('/penal-y-siniestros', 'PenalSiniestrosController@index');

Route::get('/procedimientos-admin', 'ProcedimientosAdministrativosController@index');
