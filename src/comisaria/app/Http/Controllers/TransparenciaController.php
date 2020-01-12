<?php

namespace App\Http\Controllers;

use App\Observaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Transparencia;
use Carbon\Carbon;
use Exception;

class TransparenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transparencia.transparencia');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transparencia.transparenciaForm');
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
            'Folio' => 'required',
            'Expediente'  => 'required',
            'Solicitante'  => 'required',
            'Recepcion'  => 'required',
            'Informacion' => 'required',
            'Derivado' => 'required',
            'Canalizacion' => 'required',
            'Respuesta' => 'required',
            'Envio_UT' => 'required',
            'Fecha' => 'required',
            'idObservacion' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }else{
             try {
                $formato = 'Y-m-d H:i:s';
                $dateRecepcion = strtotime($this->formatDate($request->Recepcion));
                $dateFecha = strtotime($this->formatDate($request->Fecha));
                Transparencia::updateOrCreate(['id' => $request->id],
                [
                    'Folio' => $request->Folio,
                    'Expediente' => $request->Expediente,
                    'Solicitante' => $request->Solicitante,
                    'Recepcion' => date($formato,$dateRecepcion),
                    'Informacion' => $request->Informacion,
                    'Derivado' => $request->Derivado,
                    'Canalizacion' => $request->Canalizacion,
                    'Respuesta' => $request->Respuesta,
                    'Envio_UT' => $request->Envio_UT,
                    'Fecha' =>  date($formato, $dateFecha),
                    'idObservacion' => $request->idObservacion
                ]);

                $response = ['success' => 'Se agrego el registro.'];           
            } catch (Exception $e) {
                return response()->json(['error' => $e],500);
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
        $row = Transparencia::find($id);
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
        $row = Transparencia::find($id);
        if($row != null){
            $row->activo = 0;
            $row->save();
            return response()->json($data,200);
        }

        return response()->json(['error:' => 'error']);
    }

    public function obtenerObservaciones()
    {
        $data = new Observaciones();
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
