<?php

namespace App\Http\Controllers;

use App\Armas;
use App\Estado;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        // $arma = new Armas();
        // $arma->numero_servicio=$request->numero_servicio;
        // $arma->abogado_integrado=$request->abogado_integrado;
        // $arma = estado;
        // $arma = numero_expediente;
        // $arma = poligono;
        // $arma = solicitante;
        // $arma = encargado;
        // $arma = fecha_registro;
        // $arma = motivo_investigacion;
        // $arma = ofendido;
        // $arma = fecha_resolucion;
        // $arma = sentido_resolucion;
        // $arma = estado_procesal;

        Armas::updateOrCreate(['id' => $request->id],
        ['numero_servicio' => $request->numero_servicio,
        'abogado_integrado' => $request->abogado_integrado,
        'estado' => $request->estado,
        'numero_expediente' => $request->numero_expediente,
        'poligono' => $request->poligono,
        'solicitante' => $request->solicitante,
        'encargado' => $request->encargado,
        'fecha_registro' => Carbon::now(),
        'motivo_investigacion' => $request->motivo_investigacion,
        'ofendido' => $request->ofendido,
        'fecha_resolucion' => Carbon::now(),
        'sentido_resolucion' => $request->sentido_resolucion,
        'estado_procesal' => $request->estado_procesal
        ]);

        return response()->json(['success' => 'Registro guardado correctamente.']);
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
}
