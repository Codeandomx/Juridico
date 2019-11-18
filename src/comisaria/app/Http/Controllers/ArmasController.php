<?php

namespace App\Http\Controllers;

use App\Armas;
use App\Estado;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;

class ArmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('armas');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('armasForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $messages = [
            'required' => 'El :attribute es requerido',
            'max' => 'El :attribute tiene demaciados caracteres'
        ];

        $validator = Validator::make($request->all(), [
            'numero_servicio' => 'required',
            'abogado_integrado' => 'required',
            'estado' => 'required',
            'numero_expediente'  => 'required',
            'poligono'  => 'required',
            'solicitante'  => 'required',
            'encargado' => 'required',
            'fecha_registro' => 'required',
            'motivo_investigacion' => 'required',
            'ofendido' => 'required',
            'fecha_resolucion' => 'required',
            'sentido_resolucion' => 'required',
            'estado_procesal' => 'required'
        ], $messages);

        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()->all()]);
        }else{
            try {
                $formato = 'Y-m-d H:i:s';
                $dateRegistro = strtotime($this->formatDate($request->fecha_registro));
                $dateResolucion = strtotime($this->formatDate($request->fecha_resolucion));

                Armas::updateOrCreate(['id' => $request->id],
                ['numero_servicio' => $request->numero_servicio,
                'abogado_integrado' => $request->abogado_integrado,
                'estado' => $request->estado,
                'numero_expediente' => $request->numero_expediente,
                'poligono' => $request->poligono,
                'solicitante' => $request->solicitante,
                'encargado' => $request->encargado,
                'fecha_registro' => date($formato,$dateRegistro),
                'motivo_investigacion' => $request->motivo_investigacion,
                'ofendido' => $request->ofendido,
                'fecha_resolucion' => date($formato,$dateResolucion),
                'sentido_resolucion' => $request->sentido_resolucion,
                'estado_procesal' => $request->estado_procesal
                ]);

                $response = ['success' => 'Se agrego el registro.'];

        
            } catch (Exception $e) {
                return response()->json(['error' => $e]);
            }
        }

        return response()->json($response,200);
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
        $row = Armas::find($id);
        return response()->json($row);
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
        $data = ['success' => 'Eliminacion completada.'];
        $row = Armas::find($id);
        if($row != null){
            $row->activo = 0;
            $row->save();
            return response()->json($data,200);
        }

        return response()->json(['error:' => 'error']);
    }

    /**
    * Obtiene el catologo de estados
    */
    public function obtenerEstados()
    {
        $data = new Estado();
        return response()->json($data::all());
    }

    //Retorna un string datetime
    public function formatDate($fechaoriginal){

        $aux = Carbon::now();
        $time = $aux->toDateTimeString();

        $time = substr($time,10);
        return $fechaoriginal . $time;
    }
}
