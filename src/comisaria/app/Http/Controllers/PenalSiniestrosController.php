<?php

namespace App\Http\Controllers;

use App\PenalSiniestro;
use App\AgenciasVarias;
use App\Anticorrupcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DateTime;

class PenalSiniestrosController extends Controller
{
    public function index()
    {
        //return view('penalSiniestros');
        return view('penalSiniestrosReporte');
    }

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

    public function VisitaduriaForm()
    {
        return view('VisitaduriaForm');
    }

    public function AgenciasVariasForm()
    {
        return view('AgenciasVariasForm');
    }

    public function AnticorrupcionForm()
    {
        return view('AnticorrupcionForm');
    }

    public function VisitaduriaReporte()
    {
        return view('VisitaduriaReporte');
    }

    public function AgenciasVariasReporte()
    {
        return view('AgenciasVariasReporte');
    }

    public function AnticorrupcionReporte()
    {
        return view('AnticorrupcionReporte');
    }

    public function VisitaduriaArchivo()
    {
        return view('VisitaduriaArchivo');
    }

    public function AgenciasVariasArchivo()
    {
        return view('AgenciasVariasArchivo');
    }

    public function AnticorrupcionArchivo()
    {
        return view('AnticorrupcionArchivo');
    }

    public function archivo()
    {
        return view('penalSiniestrosArchivo');
    }

    public function store(Request $request)
    {
        //dump("Karla");
        $tipo = $request->tipo;
        $formato = 'Y-m-d H:i:s';
        switch ($tipo) {
            case "visitaduria":
                try {
                    $servidores = $request->input('servidor_publico');
                    $servidores = implode(',', $servidores);

                    $denunciantes = $request->input('denunciante');
                    $denunciantes = implode(',', $denunciantes);

                    $delitos = $request->input('delito');
                    $delitos = implode(',', $delitos);

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
                try {
                    $fecha = $this->formatDate($request->fecha_asignacion);
                    $date = strtotime($fecha);

                    AgenciasVarias::updateOrCreate(['id' => $request->id],
                    [
                        'expediente' => $request->expediente,
                        'carpetaAdministrativa' => $request->carpetaAdministrativa,
                        'carpetaInvestigacion' => $request->carpetaInvestigacion,
                        'fechaAsignacion' => date($formato,$date),
                        'averiguacionPrevia' => $request->averiguacionPrevia,
                        'civil' => $request->civil,
                        'policia' => $request->policia,
                        'observaciones' => $request->observaciones
                    ]);

                    $response = ['success' => true];
                    return response()->json($response,200);
                } catch (Exception $e) {
                    return response()->json(['error' => $e]);
                }
            break;

            case "antiCorrupcion":
               try {
                    $fecha = $this->formatDate($request->fecha_asignacion);
                    $date = strtotime($fecha);

                    Anticorrupcion::updateOrCreate(['id' => $request->id],
                    [
                        'expediente' => $request->expediente,
                        'carpetaAdministracion' => $request->carpetaAdministrativa,
                        'carpetaInvestigacion' => $request->carpetaInvestigacion,
                        'fechaAsignacion' => date($formato,$date),
                        'averiguacionPrevia' => $request->averiguacionPrevia,
                        'civil' => $request->civil,
                        'policia' => $request->policia,
                        'observaciones' => $request->observaciones
                    ]);

                    $response = ['success' => true];
                    return response()->json($response,200);
                } catch (Exception $e) {
                    return response()->json(['error' => $e]);
                }
            break;
        }

        return response()->json($response,500);
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
                try {
                    $row = AgenciasVarias::find($id);

                    if ($row != null) {
                        return response()->json($row);
                    }
                } catch (\Illuminate\Database\QueryException $exception) {
                     $errorInfo = $exception->errorInfo;
                    return response()->json($errorInfo);
                }
            break;

            case "antiCorrupcion":
                try {
                    $row = Anticorrupcion::find($id);

                    if ($row != null) {
                        return response()->json($row);
                    }
                } catch (\Illuminate\Database\QueryException $exception) {
                     $errorInfo = $exception->errorInfo;
                    return response()->json($errorInfo);
                }
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
                        $row->activo = !$row->activo;
                        $row->save();
                        $data = ['success' => true];
                        return response()->json($data,200);
                    }
                } catch (\Illuminate\Database\QueryException $exception) {
                    $errorInfo = $exception->errorInfo;
                    return response()->json($errorInfo);
                }
            break;

            case "agenciasVarias":
                try {
                    $row = AgenciasVarias::find($id);

                    if($row != null){
                        $row->activo = !$row->activo;
                        $row->save();
                        $data = ['success' => true];
                        return response()->json($data,200);
                    }
                } catch (\Illuminate\Database\QueryException $exception) {
                    $errorInfo = $exception->errorInfo;
                    return response()->json($errorInfo);
                }
            break;

            case "antiCorrupcion":
                try {
                    $row = Anticorrupcion::find($id);

                    if($row != null){
                        $row->activo = !$row->activo;
                        $row->save();
                        $data = ['success' => true];
                        return response()->json($data,200);
                    }
                } catch (\Illuminate\Database\QueryException $exception) {
                    $errorInfo = $exception->errorInfo;
                    return response()->json($errorInfo);
                }
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
