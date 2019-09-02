<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\EstadoProcesal;
use App\RepRecursoHumano;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class RecursosHumanosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('recursosHumanos');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
        return view('recursosHumanosForm');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $obj = new RepRecursoHumano();
        $obj->queja = $request['queja'];
        $obj->fecha_recepcion = Carbon::parse($request['fecha_recepcion'])->format('d-m-Y H:i:s');
        $obj->abogados = $request['abogado'];
        $obj->estado_procesal = $request['estado_procesal'];
        $obj->asunto = $request['asunto'];
        $obj->derecho_violado = $request['derecho_violado'];
        
        $obj->save();
        // $data = DB::insert('insert into tb_reprecursoshumanos (queja, name) values (?, ?)', [1, 'Dayle'])
        
        // return redirect()->action('RecursosHumanosController@index');
        return response()->json($obj);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Recibimos los datos

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Obtiene el catologo de estados procesales
     */
    public function obtenerEstadosProcesales()
    {
        $data = new EstadoProcesal();

        return response()->json($data::all());
    }

    /**
     * Obtiene el catalogo de abogados
     */
    public function obtenerAbogados(){
        $data = DB::select('select t0.user,t0.nombreCompleto from tb_empleados t0
        inner join tb_datoslaborales t1 on t1.user = t0.user
        inner join tb_catnombramientos t2 on t2.id = t1.nombramiento
        where t2.id in (?,?,?)', [1,2,3]);

        return response()->json($data);
    }

    /**
     * Obtenemos todos los reportes de recursos humanos
     */
    public function obtenerReportes(){
        $data = DB::select('select t0.id, t0.created_at as fecha_captura, t0.fecha_recepcion, t0.asunto, t1.nombre as estado_procesal, t2.nombreCompleto as abogado
        from tb_reprecursoshumanos t0
        inner join tb_catestadosprocesales t1 on t1.id = t0.estado_procesal
        inner join tb_empleados t2 on t2.user = t0.abogados');

        return response()->json($data);
    }
}
