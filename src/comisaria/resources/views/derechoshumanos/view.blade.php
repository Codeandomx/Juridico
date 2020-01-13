@extends('layouts.main_layout')

@section('title', 'Derechos Humanos')

@section('metas')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('styles')
@endsection

@section('content')

<div class="row row-md mb-2">
    <!-- Content -->
    <div class="content-area py-1">
      <div class="container-fluid">
        <div class="box box-block bg-white">
            <nav>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/derechos-humanos">Derechos Humanos</a></li>
                    <li class="breadcrumb-item active"><a href="#">Editar</a></li>
                </ul>
            </nav>

            <div class="row">
              <div class="col-sm-6">
                  <label style="font-weight:bold;">Queja</label>
                  <br>{{ $info->queja }}
              </div>
              <div class="col-sm-6">
                  <label style="font-weight:bold;">Fecha de recepción</label>
                  <br>{{ $info->fecha_recepcion }}
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                  <label style="font-weight:bold;">Abogado</label>
                  <br>{{ $info->empleado }}
              </div>
              <div class="col-sm-6">
                  <label style="font-weight:bold;">Estado procesal</label>
                  <br>{{ $info->estado }}
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                  <label style="font-weight:bold;">Asunto</label>
                  <br>{{ $info->asunto }}
              </div>
              <div class="col-sm-6">
                  <label style="font-weight:bold;">Presunto derecho violado</label>
                  <br>{{ $info->derecho_violado }}
              </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@section('scripts')
@endsection