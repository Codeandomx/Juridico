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
        return view('penalSiniestros');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visitaduria');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $messages = [
            'required' => 'El :attribute es requerido',
            'max' => 'El :attribute tiene demaciados caracteres'
        ];

        $validator = Validator::make($request->all(), [
            'numero_consecutivo' => 'required',
            'carpeta_investigacion' => 'required',
            'fecha_asignacion' => 'required',
            'servidor_publico'  => 'required',
            'agencia_mp' => 'required',
            'denunciante'  => 'required',
            'delito'  => 'required',
            'poligono' => 'required',
            'observaciones' => 'required',
            'estado_procesal' => 'required'
        ], $messages);

        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        else{
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

                $response = ['success' => 'Se agrego el registro.'];    
            } catch (Exception $e) {
                return response()->json(['error' => $e]);
            }
        }

        return response()->json($response,200);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
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
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $data = ['success' => 'Eliminacion completada.'];
        $row = PenalSiniestro::find($id);
        if($row != null){
            $row->activo = 0;
            $row->save();
            return response()->json($data,200);
        }

        return response()->json(['error:' => 'error']);
    }

    //Retorna un string datetime
    public function formatDate($fechaoriginal){

        $aux = Carbon::now();
        $time = $aux->toDateTimeString();

        $time = substr($time,10);
        return $fechaoriginal . $time;
    }
}
