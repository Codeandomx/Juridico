@extends('layouts.main_layout')

@section('title', 'Página principal')

@section('metas')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('styles')
<link rel="stylesheet" href="_vendor/select2/dist/css/select2.min.css">
@endsection

@section('content')

<div class="row row-md mb-2">
    <!-- Content -->
    <div class="content-area py-1">
      <div class="container-fluid">
        <div class="box box-block bg-white">
            <nav>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Derechos Humanos</a></li>
                    <li class="breadcrumb-item active"><a href="#">Formulario</a></li>
                </ul>
            </nav>

            <!-- Mostrar los errores -->
            <div class="alert alert-danger print-error-msg" style="display: none;">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <ul id="lista-errores">
                </ul>
            </div>

            <!-- Formulario de registro -->
          <form id="formGuardar" method="POST" action="{{ route('postDH') }}">

            <div class="row">
              <div class="col col-md-12 form-group">
                <label for="exampleTextarea">Queja</label>
                <textarea class="form-control" id="queja" name="queja" rows="3"></textarea>
              </div>
            </div>

            <div class="row">
              <div class="col col-md-6 form-group">
                <label for="exampleSelect1">Fecha de recepción</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="fecha_recepcion" name="fecha_recepcion" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" name="fecha_recepcion">
                  <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                </div>
              </div>
              <div class="col col-md-6 form-group">
                <label for="exampleSelect1">Abogado</label>
                <select class="form-control" id="abogados" name="abogados">
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col col-md-6 form-group">
                <label for="exampleSelect1">Estado procesal</label>
                <select class="form-control" id="estado_procesal" name="estado_procesal">
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col col-md-12 form-group">
                <label for="exampleTextarea">Asunto</label>
                <textarea class="form-control" id="asunto" name="asunto" rows="3"></textarea>
              </div>
            </div>

            <div class="row">
              <div class="col col-md-12 form-group">
                <label for="exampleTextarea">Presunto derecho violado</label>
                <textarea class="form-control" id="derecho_violado" name="derecho_violado" rows="3"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col col-md-12 form-group">
                <div class="pull-right">
                  <button type="submit" class="btn btn-danger" id="btnCancelar">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </div>
            </div>

          </form>
        </div>
    </div>
</div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="_vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.es.min.js"></script>
<script type="text/javascript" src="js/site/formDerechosHumanosSite.js"></script>
@endsection
