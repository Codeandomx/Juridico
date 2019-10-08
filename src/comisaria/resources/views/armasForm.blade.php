@extends('layouts.main_layout')

@section('title', 'Página principal')

@section('metas')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
<div class="row row-md mb-2">
    <!-- Content -->
    <div class="content-area py-1">
      <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/armas" style="font-size: 1.5em;">Armas</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="font-size: 1.4em;">Altas</li>
            </ol>
        </nav>
        <div class="box box-block bg-white">
            <div class="alert alert-danger print-error-msg" style="display:none">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <ul></ul>
            </div>
          <form id="formArmas" method="POST" action="{{ route('postArmas') }}">
            {{-- action="/penal-siniestros-form" --}}
            <div class="row">
              <div class="col col-md-4 form-group">
                <label for="exampleTextarea">Numero consecutivo</label>
                <input class="form-control" id="numero_servicio" maxlength="15" name="numero_servicio" type="text" placeholder="Numero servicio" required>
              </div>

              <div class="col col-md-4 form-group">
                <label for="exampleTextarea">Abogado</label>
                <input class="form-control" id="abogado_integrado'" name="abogado_integrado" maxlength="50" type="text" placeholder="Abogado" required>
              </div>

              <div class="col col-md-4 form-group">
                <label for="exampleSelect1">Estado</label>
                <select class="form-control" id="estado" name="estado"></select>
            </div>
            </div>

            <div class="row">
                <div class="col col-md-4 form-group">
                    <label for="exampleTextarea">Numero de expediente</label>
                    <input class="form-control" id="numero_expediente" name="numero_expediente" maxlength="50" type="text" placeholder="# de expediente" required>
                </div>

                <div class="col col-md-4 form-group">
                    <label for="exampleSelect1">poligono</label>
                    <input class="form-control" id="poligono" name="poligono" type="text" placeholder="poligono" maxlength="50" required/>
                </div>

                <div class="col col-md-4 form-group">
                        <label for="exampleTextarea">Solicitante</label>
                        <input class="form-control" id="solicitante" name="solicitante" maxlength="30" type="text" placeholder="solicitante" required>
                </div>
            </div>

            <div class="row">
              <div class="col col-md-6 form-group">
                <label for="exampleTextarea">Encargado</label>
                <input class="form-control" id="encargado" name="encargado" type="text" placeholder="encargado" maxlength="30" pattern="[A-Za-z]" required/>
              </div>
              <div class="col col-md-6 form-group">
                <label for="fecha registro">Fecha registro</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="fecha_registro" name="fecha_registro" placeholder="dd/mm/yyyy" required>
                    <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                </div>
              </div>
            </div>

            <div class="row">
                <div class="col col-md-4 form-group">
                    <label for="motivo_investigacion">Motivo investigación</label>
                    <input class="form-control" id="motivo_investigacion" name="motivo_investigacion" maxlength="30" type="text" placeholder="motivo de investigacion" required>
                </div>
                <div class="col col-md-4 form-group">
                    <label for="ofendido">ofendido</label>
                    <input class="form-control" id="ofendido" name="ofendido" maxlength="30" type="text" placeholder="ofendido" required>
                </div>

                <div class="col col-md-4 form-group">
                    <label for="fecha resolucion">Fecha resolución</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="fecha_resolucion" name="fecha_resolucion" placeholder="dd/mm/yyyy" required>
                        <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                    </div>
              </div>
            </div>

            <div class="row">
                <div class="col col-md-6 form-group">
                    <label for="sentido resolucion">Sentido resolución</label>
                    <input class="form-control" id="sentido_resolucion" name="sentido_resolucion" maxlength="30" type="text" placeholder="sentido resolución" required>
                </div>
                <div class="col col-md-6 form-group">
                    <label for="estado_procesal">Estado procesal</label>
                    <select class="form-control" id="estado_procesal" name="estado_procesal"></select>
                </div>
            </div>

            <div class="row">
              <div class="col col-md-12 form-group">
                <div class="pull-right">
                  <button type="botton" class="btn btn-danger" id="btnCancelar">Cancelar</button>
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
<script type="text/javascript" src="_vendor/jquery-validate/jquery-validate.js"></script>
<script type="text/javascript" src="_vendor/jquery-validate/additional-methods.min.js"></script>
<script type="text/javascript" src="_vendor/bootstrap-datepicker/dist/js/bdLocal.js"></script>
<script type="text/javascript" src="js/site/formArmasSite.js"></script>
@endsection
