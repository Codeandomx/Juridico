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

Route::get('/transparencia', 'TransparenciaController@index');

Route::get('/procedimientos-admin', 'ProcedimientosAdministrativosController@index');

/**
 * Penas y siniestros
 */

Route::get('/penal-siniestros', 'PenalSiniestrosController@index')->name('registrosPS');
Route::get('/penal-siniestros-reportes', 'PenalSiniestrosController@create')->name('reportesPS');
Route::get('/penal-siniestros-archivo','PenalSiniestrosController@archivo')->name('archivoPS');

//Zona de registros y formularios
Route::get('/Visitaduria', 'PenalSiniestrosController@Visitaduria')->name('postV');
Route::get('/AgenciasVarias', 'PenalSiniestrosController@AgenciasVarias')->name('postAV');
Route::get('/Anticorrupcion', 'PenalSiniestrosController@Anticorrupcion')->name('postAC');

Route::get('/VisitaduriaForm', 'PenalSiniestrosController@VisitaduriaForm')->name('postFV');
Route::get('/AgenciasVariasForm', 'PenalSiniestrosController@AgenciasVariasForm')->name('postFAV');
Route::get('/AnticorrupcionForm', 'PenalSiniestrosController@AnticorrupcionForm')->name('postFAC');

Route::post('/penal-siniestros-form', 'PenalSiniestrosController@store')->name('postPS');
Route::get('/penal-siniestros-edit/{id}/{type}', 'PenalSiniestrosController@edit')->name('editPS');
Route::delete('/penal-siniestros-del/{id}/{type}', 'PenalSiniestrosController@destroy');


Route::get('/VisitaduriaArchivo', 'PenalSiniestrosController@VisitaduriaArchivo')->name('PSAV');
Route::get('/AgenciasVariasArchivo', 'PenalSiniestrosController@AgenciasVariasArchivo')->name('PSAAV');
Route::get('/AnticorrupcionArchivo', 'PenalSiniestrosController@AnticorrupcionArchivo')->name('PSAA');

Route::get('/VisitaduriaReporte', 'PenalSiniestrosController@VisitaduriaReporte')->name('PSRV');
Route::get('/AgenciasVariasReporte', 'PenalSiniestrosController@AgenciasVariasReporte')->name('PSRAV');
Route::get('/AnticorrupcionReporte', 'PenalSiniestrosController@AnticorrupcionReporte')->name('PSRA');

