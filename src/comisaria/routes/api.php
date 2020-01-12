<?php

use App\Armas;
use App\PenalSiniestro;
use App\RepRecursoHumano;
use App\Transparencia;
use App\Amparos;
use Illuminate\Http\Request;
use PHPUnit\Util\Json;
use Yajra\DataTables\Facades\DataTables;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/penal&siniestros', function(){
    return datatables(PenalSiniestro::listado())
    ->addColumn('btn', 'opciones')
    ->rawColumns(['btn'])
    ->toJson();
});

Route::post('/penal&siniestrosReporte', function(Request $request){
    $fecha_inicio = date('Y-m-d H:i:s', strtotime($request['fecha_inicio']));
    $fecha_fin = date('Y-m-d H:i:s', strtotime($request['fecha_fin']));

    return datatables(PenalSiniestro::whereBetween('fecha_asignacion', 
    [$fecha_inicio, $fecha_fin])->get())
    ->addColumn('btn', 'opciones')
    ->rawColumns(['btn'])
    ->toJson();
})->name('apiRV');

Route::get('/Armeria', function(){
    return DataTables(Armas::listado())
    ->addColumn('btn', 'opciones')
    ->rawColumns(['btn'])
    ->toJson();
});

Route::get('/DerechosHumano', function(){
    return DataTables(RepRecursoHumano::where('activo', true))
    ->addColumn('btn', 'opciones')
    ->rawColumns(['btn'])
    ->toJson();
});

Route::get('/DerechosHumanoArchivo', function(){
    return DataTables(RepRecursoHumano::where('activo', false))
    ->addColumn('btn', 'opciones')
    ->rawColumns(['btn'])
    ->toJson();
});

Route::post('/DerechosHumanoReporte', function(Request $request){
    $fecha_inicio = date('Y-m-d H:i:s', strtotime($request['fecha_inicio']));
    $fecha_fin = date('Y-m-d H:i:s', strtotime($request['fecha_fin']));

    return DataTables(RepRecursoHumano::whereBetween('fecha_recepcion', [$fecha_inicio, $fecha_fin])->get())
    ->addColumn('btn', 'opciones')
    ->rawColumns(['btn'])
    ->toJson();
});

Route::get('/amparos', function(Request $request){
    return DataTables(Amparos::where('activo', true)->get())
    ->addColumn('btn', 'opciones')
    ->rawColumns(['btn'])
    ->toJson();
});
Route::get('/amparosarchivo', function(Request $request){
    return DataTables(Amparos::where('activo', false)->get())
    ->addColumn('btn', 'opciones')
    ->rawColumns(['btn'])
    ->toJson();
});

Route::get('/transparencia', function(){
    return DataTables(Transparencia::listado())
    ->addColumn('btn', 'opciones')
    ->rawColumns(['btn'])
    ->toJson();
});
