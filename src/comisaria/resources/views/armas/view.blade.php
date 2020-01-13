@extends('layouts.main_layout')

@section('title', 'Armas')

@section('metas')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
<div class="row row-md mb-2">
    <!-- Content -->
    <div class="content-area py-1">
      <div class="container-fluid">
        <h4>Resumen Armas</h4>
        <div class="box box-block bg-white">

        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/armas">Armas</a></li>
                <li class="breadcrumb-item active"><a href="#">Resumen</a></li>
            </ul>
        </nav>
        
        <div class="row">
            <div class="col-sm-6">
                <label style="font-weight:bold;">Número de servicio</label>
                <br>{{ $info->numero_servicio }}
            </div>
            <div class="col-sm-6">
                <label style="font-weight:bold;">Abogado</label>
                <br>{{ $info->empleado }}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <label style="font-weight:bold;">Estado</label>
                <br>{{ $info->nestado }}
            </div>
            <div class="col-sm-6">
                <label style="font-weight:bold;">Numero de expediente</label>
                <br>{{ $info->numero_expediente }}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <label style="font-weight:bold;">Poligono</label>
                <br>{{ $info->poligono }}
            </div>
            <div class="col-sm-6">
                <label style="font-weight:bold;">Solicitante</label>
                <br>{{ $info->solicitante }}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <label style="font-weight:bold;">Encargado</label>
                <br>{{ $info->encargado }}
            </div>
            <div class="col-sm-6">
                <label style="font-weight:bold;">Fecha registro</label>
                <br>{{ $info->fecha_registro }}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <label style="font-weight:bold;">Motivo investigación</label>
                <br>{{ $info->motivo_investigacion }}
            </div>
            <div class="col-sm-6">
                <label style="font-weight:bold;">Ofendido</label>
                <br>{{ $info->ofendido }}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <label style="font-weight:bold;">Fecha resolución</label>
                <br>{{ $info->fecha_resolucion }}
            </div>
            <div class="col-sm-6">
                <label style="font-weight:bold;">Sentido resolución</label>
                <br>{{ $info->sentido_resolucion }}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <label style="font-weight:bold;">Estado procesal</label>
                <br>{{ $info->nestado }}
            </div>
        </div>
        </div>
      </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
