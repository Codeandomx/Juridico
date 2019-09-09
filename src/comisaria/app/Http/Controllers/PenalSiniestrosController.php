<?php

namespace App\Http\Controllers;

use App\PenalSiniestro;
use App\Http\Requests\PenalStoreResquest;
use Illuminate\Http\Request;

class PenalSiniestrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = PenalSiniestro::listado()->get();
        return view('penalSiniestros',compact('collection'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Resquest $request)
    {
        $validator = $request->validate([
            'fecha_asignacion' => 'required',
            'servidor_publico'  => 'required',
            'denunciante'  => 'required|string|max:30',
            'delito'  => 'required|string|max:50',
            'poligono' => 'required',
            'estado_procesal' => 'required'
        ]);

        //para testear ees el DD
        dd($request);
        //insnercion a l BD
        $penal = new PenalJuridico;
        $penal->numero_consecutivo=$request->numero_consecutivo;
        $penal->carpeta_investigacion=$request->carpeta_investigacion;
        $penal->fecha_asignacion=$request->fecha_asignacion;
        $penal->agencia_mp=$request->agencia_mp;
        $penal->servidor_publico=$request->servidor_publico;
        $penal->denunciante=$request->denunciante;
        $penal->delito=$request->delito;
        $penal->poligono=$request->poligono;
        $penal->estado_procesal=$request->estado_procesal;
        $penal->observaciones=$request->observaciones;
        $penal->save();

        //acceder al id guardado
        $penal->id_penal;

        //redireccionar la pagina despues de guardar
        return redirect()->route('penal-siniestros');
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
}
