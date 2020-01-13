@extends('layouts.main_layout')

@section('title', 'Transparencia')

@section('metas')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div class="row row-md mb-2">
    <!-- Content -->
    <div class="content-area py-1">
      <div class="container-fluid">
        <div class="box box-block bg-white">
            <h4>Resumen Transparencia</h4>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/transparencia">Transparencia</a></li>
                    <li class="breadcrumb-item active"><a href="#">Resumen</a></li>
                </ul>
            </nav>

            <div class="row">
              <div class="col-sm-6">
                  <label style="font-weight:bold;">Folio</label>
                  <br>{{ $info->Folio }}
              </div>
              <div class="col-sm-6">
                  <label style="font-weight:bold;">Expediente</label>
                  <br>{{ $info->Expediente }}
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                  <label style="font-weight:bold;">Solicitante</label>
                  <br>{{ $info->Solicitante }}
              </div>
              <div class="col-sm-6">
                  <label style="font-weight:bold;">Recepción</label>
                  <br>{{ $info->Recepcion }}
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                  <label style="font-weight:bold;">Información</label>
                  <br>{{ $info->Informacion }}
              </div>
              <div class="col-sm-6">
                  <label style="font-weight:bold;">Derivado</label>
                  <br>{{ $info->Derivado }}
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                  <label style="font-weight:bold;">Canalización</label>
                  <br>{{ $info->Canalizacion }}
              </div>
              <div class="col-sm-6">
                  <label style="font-weight:bold;">Respuesta</label>
                  <br>{{ $info->Respuesta }}
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                  <label style="font-weight:bold;">Fecha</label>
                  <br>{{ $info->Fecha }}
              </div>
              <div class="col-sm-6">
                  <label style="font-weight:bold;">Envio de UT</label>
                  <br>{{ $info->Envio_UT }}
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                  <label style="font-weight:bold;">Observacion</label>
                  <br>{{ $info->nobservacion }}
              </div>
              <div class="col-sm-6">
              </div>
            </div>

        </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
@endsection
