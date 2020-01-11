<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ActivosPasivos;
use App\Suspensiones;
use App\Semaforo;
use App\Incidentes;
use App\EstadosAmparos;
use App\EstadosProcesalesAmparos;
use App\TipificacionAmparos;
use App\Amparos;

class AmparosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('amparos.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function archivo()
    {
        return view('amparos.archivo');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reporte()
    {
        return view('amparos.reporte');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
        // Obtenemos los catalogos
        $activos = ActivosPasivos::all();
        $suspensiones = Suspensiones::all();
        $semaforos = Semaforo::all();
        $incidentes = Incidentes::all();
        $estados = EstadosAmparos::all();
        $procesal = EstadosProcesalesAmparos::all();
        $tipificacion = TipificacionAmparos::all();

        $cat = array('activos'=>$activos,'suspensiones'=>$suspensiones,'semaforos'=>$semaforos,'incidentes'=>$incidentes,'estados'=>$estados,'procesal'=>$procesal,'tipificacion'=>$tipificacion);

        return view('amparos.form')->with('cat' ,$cat);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        // Obtenemos la informaciòn
        $info = RepRecursoHumano::find($id);

        return view('amparos.edit')->with('info', $info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try{
          $obj = new Amparos();
          $obj->fecha_ingreso = date('Y-m-d H:i:s', strtotime($request['fecha_ingreso']));
          $obj->abogado = $request['abogado'];
          $obj->quejoso = $request['quejoso'];
          $obj->juzgado_y_expediente = $request['juzgado_expediente'];
          $obj->acto_reclamo = $request['acto_reclamo'];
          $obj->suspension = $request['suspension'];
          $obj->recurso_diverso = $request['recurso_diverso'];
          $obj->activo_pasivo = $request['activo_pasivo'];
          $obj->sentencia = $request['sentencia'];
          $obj->fecha_ejecutoria = date('Y-m-d H:i:s', strtotime($request['fecha_ejecutoria']));
          $obj->recurso_revision = $request['recurso_revision'];
          $obj->semaforo = $request['semaforo'];
          $obj->incidente_ejecucion = $request['indice_ejecucion'];
          $obj->status = $request['status'];
          $obj->status_procesal_actual = $request['estado_procesal_actual'];
          $obj->requerimientos = $request['requerimientos'];

          $obj->save();

          $response = ['success' => 'El registro se creo con exito.'];

            return response()->json($response,200);
        } catch(Excepction $e){
            return response()->json(['error'=>$e], 500);
        }
    }
}
