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
        <div class="box box-block bg-white">

        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Armas</a></li>
                <li class="breadcrumb-item active"><a href="#">Formulario</a></li>
            </ul>
        </nav>

        <!-- Mensajes de errores -->
        <div id="erroresBox" class="alert alert-danger print-error-msg" style="display:none">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <ul></ul>
        </div>
            
          <form id="formArmas" method="POST" action="{{ route('postArmas') }}">

            <div class="row">
              <div class="col col-md-4 form-group">
                <label for="exampleTextarea">Numero de servicio</label>
                <input class="form-control" id="numero_servicio" maxlength="15" name="numero_servicio" type="text" placeholder="Numero servicio" required>
              </div>

              <div class="col col-md-4 form-group">
                <label for="exampleTextarea">Abogado</label>
                <input class="form-control" id="abogado_integrado'" name="abogado_integrado" maxlength="50" type="text" placeholder="Abogado" required>
              </div>

              <div class="col col-md-4 form-group">
                <label for="exampleSelect1">Estado</label>
                <select class="form-control" id="estado" name="estado" required></select>
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
                <input class="form-control" id="encargado" name="encargado" type="text" placeholder="encargado" maxlength="30" required/>
              </div>
              <div class="col col-md-6 form-group">
                <label for="fecha registro">Fecha registro</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="fecha_registro" name="fecha_registro" placeholder="yyyy-mm-dd" data-date-format='yyyy-mm-dd' required>
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
                        <input type="text" class="form-control" id="fecha_resolucion" name="fecha_resolucion" placeholder="yyyy-mm-dd" data-date-format='yyyy-mm-dd' required>
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
                    <select class="form-control" id="estado_procesal" name="estado_procesal" required></select>
                </div>
            </div>

            <div class="row">
              <div class="col col-md-12 form-group">
                <div class="pull-right">
                  <button type="botton" class="btn btn-danger" id="btnCancelar"><i class="fa fa-trash"> </i> &nbsp Cancelar</button>
                  <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"> </i> &nbsp Guardar
                </button>
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
<script type="text/javascript" src="_vendor/sweetAlert/sweetalert.min.js"></script>
<script type="text/javascript" src="_vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="_vendor/jquery-validate/jquery-validate.js"></script>
<script type="text/javascript" src="_vendor/jquery-validate/additional-methods.min.js"></script>
<script type="text/javascript" src="_vendor/bootstrap-datepicker/dist/js/bdLocal.js"></script>
<script type="text/javascript" src="js/site/formArmasSite.js"></script>
@endsection
