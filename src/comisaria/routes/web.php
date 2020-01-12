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
Route::get('/amparos-form', 'AmparosController@form');
Route::get('/amparos-editar/{id}', 'AmparosController@edit');
Route::get('/amparos-reporte', 'AmparosController@reporte');
Route::post('/amparos-form', 'AmparosController@create')->name('postAmparos');
Route::put('/amparos-form/{id}', 'AmparosController@update')->name('putAmparos');
Route::delete('/amparos-delete/{id}', 'AmparosController@destroy')->name('deleteAmparos');

/**
 * Armas
 */

Route::get('/armas', 'ArmasController@index');
Route::get('/armas-form', 'ArmasController@create');
Route::post('/armas-form', 'ArmasController@store')->name('postArmas');
Route::get('/armas-edit/{id}', 'ArmasController@edit');
Route::get('/armas-archivo', 'ArmasController@archivo');
Route::get('/armas-reporte', 'ArmasController@reporte');
Route::delete('/armas-delete/{id}', 'ArmasController@destroy');
Route::get('/obtenerestados', 'ArmasController@obtenerEstados');
Route::get('/amparos-archivo','AmparosController@archivo');
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
Route::get('/derechos-humanos-reporte','DerechosHumanosController@reporte');
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

Route::get('/penal-siniestros', 'PenalSiniestrosController@index')->name('reportesPS');
Route::get('/penal-siniestros-form', 'PenalSiniestrosController@create');
Route::get('/Visitaduria', 'PenalSiniestrosController@Visitaduria')->name('postV');
Route::get('/AgenciasVarias', 'PenalSiniestrosController@AgenciasVarias')->name('postAV');
Route::get('/Anticorrupcion', 'PenalSiniestrosController@Anticorrupcion')->name('postAC');
Route::post('/penal-siniestros-form', 'PenalSiniestrosController@store')->name('postPS');
Route::get('/penal-siniestros-edit/{id}/{type}', 'PenalSiniestrosController@edit')->name('editPS');
Route::delete('/penal-siniestros-del/{id}/{type}', 'PenalSiniestrosController@destroy');

Route::get('/procedimientos-admin', 'ProcedimientosAdministrativosController@index');
