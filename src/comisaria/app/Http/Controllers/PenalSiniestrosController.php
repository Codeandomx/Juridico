<?php

namespace App\Http\Controllers;

use App\PenalSiniestro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DateTime;

class PenalSiniestrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('penalSiniestros');
        return view('penalSiniestrosReporte');
    }

    /**
     * Show the form for creating a new resource depends of the type of form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penalSiniestrosForms');
    }

    public function Visitaduria()
    {
        return view('visitaduria');
    }

    public function AgenciasVarias()
    {
        return view('AgenciasVarias');
    }

    public function Anticorrupcion()
    {
        return view('Anticorrupcion');
    }

    public function store(Request $request)
    {
        $tipo = $request->tipo;
        switch ($tipo) {
            case "visitaduria":
                try {
                    $servidores = $request->input('servidor_publico');
                    $servidores = implode(',', $servidores);

                    $denunciantes = $request->input('denunciante');
                    $denunciantes = implode(',', $denunciantes);

                    $delitos = $request->input('delito');
                    $delitos = implode(',', $delitos);

                    $formato = 'Y-m-d H:i:s';
                    $fecha = $this->formatDate($request->fecha_asignacion);
                    $date = strtotime($fecha);
                    PenalSiniestro::updateOrCreate(['id' => $request->id],
                    [
                        'numero_consecutivo' => $request->numero_consecutivo,
                        'carpeta_investigacion' => $request->carpeta_investigacion,
                        'fecha_asignacion' => date($formato, $date),
                        'agencia_mp' => $request->agencia_mp,
                        'servidor_publico' => $servidores,
                        'denunciante' => $denunciantes,
                        'delito' => $delitos,
                        'poligono' => $request->poligono,
                        'estado_procesal' => $request->estado_procesal,
                        'observaciones' => $request->observaciones
                    ]);

                    $response = ['success' => true]; 
                    return response()->json($response,200);   
                } catch (Exception $e) {
                    return response()->json(['error' => $e]);
                }
            break;
            
            case "agenciasVarias":

            break;

            case "antiCorrupcion":

            break;

            default:
                # code...
                break;
        }

        return response()->json($response,200);
    }


    public function show($id)
    {
        //
    }


    public function edit($id, $tipo)
    {
        switch ($tipo) {
            case "visitaduria":
                try {
                    $row = PenalSiniestro::find($id);

                    if ($row != null) {
                        return response()->json($row);
                    }

                    return response()->json("No se a podido cargar los datos.",203);
                } catch (\Illuminate\Database\QueryException $exception) {
                    $errorInfo = $exception->errorInfo;
                    return response()->json($errorInfo);
                }
            break;

            case "agenciasVarias":

            break;
            
            case "antiCorrupcion":
            break;

            default:
                # code...
                break;
        }
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id, $tipo)
    {
        switch ($tipo) {
            case "visitaduria":
                try {
                    $row = PenalSiniestro::find($id);

                    if($row != null){
                        $row->activo = 0;
                        $row->save();
                        $data = ['success' => 'Eliminacion completada.'];
                        return response()->json($data,200);
                    }
                } catch (\Illuminate\Database\QueryException $exception) {
                    $errorInfo = $exception->errorInfo;
                    return response()->json($errorInfo);
                }
            break;
            
            case "":

            break;

            case "":
                # code...
            break;

            default:
                # code...
                break;
        }

        return response()->json(['error:' => 'error']);
    }

    //Retorna un string datetime
    public function formatDate($fechaoriginal)
    {

        $aux = Carbon::now();
        $time = $aux->toDateTimeString();

        $time = substr($time,10);
        return $fechaoriginal . $time;
    }
}
