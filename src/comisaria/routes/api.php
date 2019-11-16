<?php

use App\Armas;
use App\PenalSiniestro;
use App\RepRecursoHumano;
use App\Transparencia;
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

Route::get('/Armeria', function(){
    return DataTables(Armas::listado())
    ->addColumn('btn', 'opciones')
    ->rawColumns(['btn'])
    ->toJson();
});

Route::get('/DerechosHumano', function(){
    return DataTables(RepRecursoHumano::listado())
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
