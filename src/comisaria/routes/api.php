<?php

use Illuminate\Http\Request;

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

Route::get('/AgenciasVarias', function(){
    return datatables(AgenciasVarias::listado())
    ->addColumn('btn', 'opciones')
    ->rawColumns(['btn'])
    ->toJson();
});

Route::get('/Anticorrupcion', function(){
    return datatables(Anticorrupcion::listado())
    ->addColumn('btn', 'opciones')
    ->rawColumns(['btn'])
    ->toJson();
});

Route::get('/VisitaduriaArchivo', function(){
    return DataTables(PenalSiniestro::where('activo', false))
    ->addColumn('btn', 'opciones')
    ->rawColumns(['btn'])
    ->toJson();
});

Route::get('/AgenciasVariasArchivo', function(){
    return DataTables(AgenciasVarias::where('activo', false))
    ->addColumn('btn', 'opciones')
    ->rawColumns(['btn'])
    ->toJson();
});

Route::get('/AnticorrupcionArchivo', function(){
    return DataTables(Anticorrupcion::where('activo', false))
    ->addColumn('btn', 'opciones')
    ->rawColumns(['btn'])
    ->toJson();
});

Route::post('/VisitaduriaReporte', function(Request $request){
    $fecha_inicio = date('Y-m-d H:i:s', strtotime($request['fecha_inicio']));
    $fecha_fin = date('Y-m-d H:i:s', strtotime($request['fecha_fin']));

    return datatables(PenalSiniestro::whereBetween('fecha_asignacion',
    [$fecha_inicio, $fecha_fin])->get())
    ->addColumn('btn', 'opciones')
    ->rawColumns(['btn'])
    ->toJson();
})->name('apiRV');

Route::post('/AgenciasVariasReporte', function(Request $request){
    $fecha_inicio = date('Y-m-d H:i:s', strtotime($request['fecha_inicio']));
    $fecha_fin = date('Y-m-d H:i:s', strtotime($request['fecha_fin']));

    return datatables(AgenciasVarias::listado()->whereBetween('fechaAsignacion',
    [$fecha_inicio, $fecha_fin])->get())
    ->addColumn('btn', 'opciones')
    ->rawColumns(['btn'])
    ->toJson();
})->name('apiRAV');

Route::post('/AnticorrupcionReporte', function(Request $request){
    $fecha_inicio = date('Y-m-d H:i:s', strtotime($request['fecha_inicio']));
    $fecha_fin = date('Y-m-d H:i:s', strtotime($request['fecha_fin']));

    return datatables(Anticorrupcion::listado()->whereBetween('fechaAsignacion',
    [$fecha_inicio, $fecha_fin])->get())
    ->addColumn('btn', 'opciones')
    ->rawColumns(['btn'])
    ->toJson();
})->name('apiRAC');
