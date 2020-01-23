<?php

use App\Armas;
use App\PenalSiniestro;
use App\RepRecursoHumano;
use App\Transparencia;
use App\Amparos;
use Illuminate\Http\Request;
use PHPUnit\Util\Json;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

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

Route::get('/ContratosyConvenios', function(){
    return datatables(ContratosyConvenios::listado())
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
    return DataTables(Armas::where('activo', false))
    ->addColumn('btn', 'opciones')
    ->rawColumns(['btn'])
    ->toJson();
});

Route::get('/armasarchivo', function(){
    return DataTables(Armas::where('activo', true))
    ->addColumn('btn', 'opciones')
    ->rawColumns(['btn'])
    ->toJson();
});

Route::post('/armasreporte', function(Request $request){
    $fecha_inicio = date('Y-m-d H:i:s', strtotime($request['fecha_inicio']));
    $fecha_fin = date('Y-m-d H:i:s', strtotime($request['fecha_fin']));

    return DataTables(Armas::whereBetween('created_at', [$fecha_inicio, $fecha_fin])->get())
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

Route::get('/ContratosConveniosArchivo', function(){
    return DataTables(ContratosyConvenios::where('Activo', false))
    ->addColumn('btn', 'opciones')
    ->rawColumns(['btn'])
    ->toJson();
});

Route::post('/ContratosyConveniosReporte', function(Request $request){
    $fecha_inicio = date('Y-m-d H:i:s', strtotime($request['fecha_inicio']));
    $fecha_fin = date('Y-m-d H:i:s', strtotime($request['fecha_fin']));

    return datatables(ContratosyConvenios::listado()->whereBetween('Vigencia',
    [$fecha_inicio, $fecha_fin])->get())
    ->addColumn('btn', 'opciones')
    ->rawColumns(['btn'])
    ->toJson();
})->name('apiRAC');

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

Route::post('/amparosreporte', function(Request $request){
    $fecha_inicio = date('Y-m-d H:i:s', strtotime($request['fecha_inicio']));
    $fecha_fin = date('Y-m-d H:i:s', strtotime($request['fecha_fin']));

    return DataTables(Amparos::whereBetween('fecha_ingreso', [$fecha_inicio, $fecha_fin])->get())
    ->addColumn('btn', 'opciones')
    ->rawColumns(['btn'])
    ->toJson();
});

Route::get('/transparencia', function(){
    return DataTables(Transparencia::where('activo', true)->get())
    ->addColumn('btn', 'opciones')
    ->rawColumns(['btn'])
    ->toJson();
});

Route::get('/transparenciaarchivo', function(){
    return DataTables(Transparencia::where('activo', false)->get())
    ->addColumn('btn', 'opciones')
    ->rawColumns(['btn'])
    ->toJson();
});

Route::post('/transparenciareporte', function(Request $request){
    $fecha_inicio = date('Y-m-d H:i:s', strtotime($request['fecha_inicio']));
    $fecha_fin = date('Y-m-d H:i:s', strtotime($request['fecha_fin']));

    return DataTables(Transparencia::whereBetween('created_at', [$fecha_inicio, $fecha_fin])->get())
    ->addColumn('btn', 'opciones')
    ->rawColumns(['btn'])
    ->toJson();
});

Route::post('/procedimientosReporte', function(Request $request){
    $fecha_inicio = date('Y-m-d', strtotime($request['fecha_inicio']));
    $fecha_fin = date('Y-m-d', strtotime($request['fecha_fin']));
    $nombre = $request['nombre'];

    return DataTables(DB::select('select concat(id,"-",1) as id, solicitante, 1 as tipo, fecha_registro as fecha from tb_armas where solicitante like "%'.$nombre.'%" and fecha_registro between CAST("'.$fecha_inicio.'" AS DATE) AND CAST("'.$fecha_fin.'" AS DATE)
        union
        select concat(id,"-",2) as id, quejoso as solicitante, 2 as tipo, fecha_ingreso as fecha from tb_amparos where quejoso like "%'.$nombre.'%" and fecha_ingreso between CAST("'.$fecha_inicio.'" AS DATE) AND CAST("'.$fecha_fin.'" AS DATE)
        union
        select concat(id,"-",3) as id, queja as solicitante, 3 as tipo, fecha_recepcion as fecha from tb_reprecursoshumanos where queja like "%'.$nombre.'%" and fecha_recepcion between CAST("'.$fecha_inicio.'" AS DATE) AND CAST("'.$fecha_fin.'" AS DATE)
        union
        select concat(id,"-",4) as id, solicitante, 4 as tipo, Recepcion as fecha from tb_transparencia where solicitante like "%'.$nombre.'%" and Recepcion between CAST("'.$fecha_inicio.'" AS DATE) AND CAST("'.$fecha_fin.'" AS DATE)'))
    ->addColumn('btn', 'opciones')
    ->rawColumns(['btn'])
    ->toJson();
});
