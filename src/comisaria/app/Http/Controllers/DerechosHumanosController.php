<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\EstadoProcesal;
use App\RepRecursoHumano;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class DerechosHumanosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('derechosHumanos');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
        return view('derechosHumanosForm');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try{
            RepRecursoHumano::updateOrCreate(['id' => $request->id],
            [
                'queja' => $request->queja,
                'fecha_recepcion' => date('Y-m-d H:i:s', strtotime($request['fecha_recepcion'])),
                'abogados' => $request->abogados,
                'estado_procesal' => $request->estado_procesal,
                'asunto' => $request->asunto,
                'derecho_violado' => $request->derecho_violado,
                'activo' => true
            ]);

            $response = ['success' => 'El registro se creo con exito.'];

            return response()->json($response,200);
        } catch(Excepction $e){
            return response()->json(['error'=>$e], 500);
        }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $row = RepRecursoHumano::find($id);

            if ($row != null) {
                return response()->json($row);
            }

            return response()->json("No se a podido cargar los datos.",203);
        } catch (\Illuminate\Database\QueryException $exception) {
            $errorInfo = $exception->errorInfo;
            return response()->json($errorInfo);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ['success' => 'Eliminacion completada.'];
        $row = RepRecursoHumano::find($id);
        if($row != null){
            $row->activo = false;
            $row->save();
            return response()->json($data,200);
        }

        return response()->json(['error:' => 'error'], 500);
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
        $data = DB::select('select t0.id, t0.created_at as fecha_captura, t0.fecha_recepcion,
        t0.asunto, t1.nombre as nombre_estado_procesal, t1.id as estado_procesal,
        t2.nombreCompleto as nombre_abogado, t2.user as abogado
        from tb_reprecursoshumanos t0
        inner join tb_catestadosprocesales t1 on t1.id = t0.estado_procesal
        inner join tb_empleados t2 on t2.user = t0.abogados');

        return response()->json($data);
    }
}
