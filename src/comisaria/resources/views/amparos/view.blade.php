@extends('layouts.main_layout')

@section('title', 'Amparos')

@section('metas')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')

<div class="row row-md mb-2">
    <!-- Content -->
    <div class="content-area py-1">
      <div class="container-fluid">
        <h4>Resumen Amparos</h4>
        <div class="box box-block bg-white">
            <nav>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/amparos">Amparos</a></li>
                    <li class="breadcrumb-item active"><a href="#">Resumen</a></li>
                </ul>
            </nav>

          <div class="row">
            <div class="col-sm-6">
                <label style="font-weight:bold;">Fecha de recepción</label>
                <br>{{ $info->fecha_ingreso }}
            </div>
            <div class="col-sm-6">
                <label style="font-weight:bold;">Abogado</label>
                <br>{{ $info->empleado }}
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
                <label style="font-weight:bold;">Quejoso</label>
                <br>{{ $info->quejoso }}
            </div>
            <div class="col-sm-6">
                <label style="font-weight:bold;">Juzgado y expediente</label>
                <br>{{ $info->juzgado_y_expediente }}
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
                <label style="font-weight:bold;">Acto reclamo</label>
                <br>{{ $info->acto_reclamo }}
            </div>
            <div class="col-sm-6">
                <label style="font-weight:bold;">Suspensión</label>
                <br>{{ $info->nsuspension }}
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
                <label style="font-weight:bold;">Recurso diverso</label>
                <br>{{ $info->recurso_diverso }}
            </div>
            <div class="col-sm-6">
                <label style="font-weight:bold;">Activo o pasivo</label>
                <br>{{ $info->nactivo }}
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
                <label style="font-weight:bold;">Sentencia</label>
                <br>{{ $info->sentencia }}
            </div>
            <div class="col-sm-6">
                <label style="font-weight:bold;">Ejecutoria</label>
                <br>{{ $info->fecha_ejecutoria }}
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
                <label style="font-weight:bold;">Recurso de revisión</label>
                <br>{{ $info->recurso_revision }}
            </div>
            <div class="col-sm-6">
                <label style="font-weight:bold;">Requerimientos (Conteo)</label>
                <br>{{ $info->requerimientos }}
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
                <label style="font-weight:bold;">Semaforo</label>
                <br>{{ $info->nsuspension }}
            </div>
            <div class="col-sm-6">
                <label style="font-weight:bold;">Indice de ejecucion</label>
                <br>{{ $info->nincidente }}
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
                <label style="font-weight:bold;">Status</label>
                <br>{{ $info->nestado }}
            </div>
            <div class="col-sm-6">
                <label style="font-weight:bold;">Estado procesal actual</label>
                <br>{{ $info->nprocesal }}
            </div>
          </div>

        </div>
</div>
@endsection

@section('scripts')
@endsection
