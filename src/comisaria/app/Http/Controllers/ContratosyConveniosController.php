<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContratosyConvenios;
use App\TipoContrato;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DateTime;

class ContratosyConveniosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contratosConveniosReporte');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contratosConveniosForm');
    }

    public function archivo()
    {
        return view('contratosConveniosArchivo');
    }

    public function reporte()
    {
        return view('contratosConveniosReporte');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $file = $request->file('archivoPDF');

        $filename = $file->getClientOriginalName();

        $validator = Validator::make($request->all(), [
            'archivoPDF' => 'max:10000|mimes:pdf',
        ]);

        if ($validator->fails()) {
            $response = ['success' => false, 'error' => $validator->messages()];
            return response()->json($response, 200);
        }

        if ($file != null) {
            $file->store('pdfs');
        }

        $formato = 'Y-m-d H:i:s';
        try {
            $fechaVigencia = $this->formatDate($request->Vigencia);
            $dateVigencia = strtotime($fechaVigencia);
            $FechaElaboracion = $this->formatDate($request->FechaElaboracion);
            $dateElaboracion = strtotime($FechaElaboracion);

            ContratosyConvenios::updateOrCreate(['id' => $request->id],
                [
                    'ObjetoContrato' => $request->ObjetoContrato,
                    'Contratante' => $request->Contratante,
                    'Vigencia' => date($formato,$dateVigencia),
                    'FundamentoLegal' => $request->FundamentoLegal,
                    'Recurso' => $request->Recurso,
                    'ContraPrestacion' => $request->ContraPrestacion,
                    'Decreto' => $request->Decreto,
                    'FechaElaboracion' => date($formato,$dateElaboracion),
                    'Tipo' => $request->Tipo,
                    'Observacion' => $request->Observacion
                ]);

            $response = ['success' => true];
            return response()->json($response,200);

        } catch (Exception $e) {
            return response()->json(['error' => $e]);
        }

        return response()->json($response,500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('contratosConveniosArchivo');
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
            $row = ContratosyConvenios::find($id);

            if ($row != null) {
                return response()->json($row);
            }

        } catch (\Illuminate\Database\QueryException $exception) {
             $errorInfo = $exception->errorInfo;
            return response()->json($errorInfo);
        }
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
        try {
            $row = ContratosyConvenios::find($id);

            if($row){
                $row->Activo = !$row->Activo;
                $row->save();
                $data = ['success' => 'Eliminacion completada.'];
                return response()->json($data,200);
            }
        } catch (\Illuminate\Database\QueryException $exception) {
            $errorInfo = $exception->errorInfo;
            return response()->json($errorInfo);
        }
    }

    public function obtenerTipos()
    {
        $data = new TipoContrato;
        return response()->json($data::all());
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
