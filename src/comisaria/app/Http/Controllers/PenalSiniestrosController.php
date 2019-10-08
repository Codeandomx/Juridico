<?php

namespace App\Http\Controllers;

use App\PenalSiniestro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

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
        return view('penalSiniestrosForm');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => 'El :attribute es requerido',
            'max' => 'El :attribute tiene demaciados caracteres'
        ];

        $validator = Validator::make($request->all(), [
            'fecha_asignacion' => 'required',
            //'servidor_publico'  => 'required',
            'denunciante'  => 'required|string|max:30',
            'delito'  => 'required|string|max:50',
            'poligono' => 'required',
            'estado_procesal' => 'required'
        ], $messages);

        if($validator->fails()){
            //$response = $validator->messages();
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        else{
            // $penal = new PenalSiniestro();
            // $penal->numero_consecutivo=$request->numero_consecutivo;
            // $penal->carpeta_investigacion=$request->carpeta_investigacion;
            // $penal->fecha_asignacion=Carbon::now();
            // $penal->agencia_mp=$request->agencia_mp;
            // $penal->servidor_publico=$request->servidor_publico;
            // $penal->denunciante=$request->denunciante;
            // $penal->delito=$request->delito;
            // $penal->poligono=$request->poligono;
            // $penal->estado_procesal=$request->estado_procesal;
            // $penal->observaciones=$request->observaciones;
            // $penal->save();
            $response = ['success' => 'Se agrego el registro.'];

            PenalSiniestro::updateOrCreate(['id' => $request->id],
            [
                'numero_consecutivo' => $request->numero_consecutivo,
                'carpeta_investigacion' => $request->carpeta_investigacion,
                'fecha_asignacion' => Carbon::now(),
                'agencia_mp' => $request->agencia_mp,
                'servidor_publico' => $request->servidor_publico,
                'denunciante' => $request->denunciante,
                'delito' => $request->delito,
                'poligono' => $request->poligono,
                'estado_procesal' => $request->estado_procesal,
                'observaciones' => $request->observaciones
            ]);
        }

        return response()->json($response,200);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $row = PenalSiniestro::find($id);
        return response()->json($row);
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
}
