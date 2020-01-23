@extends('layouts.main_layout')

@section('title', 'Pagina Principal')

@section('metas')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('styles')
<link rel="stylesheet" href="_vendor/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="css/radios.css">
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
                <li class="breadcrumb-item"><a href="#">Penal y Siniestros</a></li>
                <li class="breadcrumb-item active"><a href="#">Anticorrupcion</a></li>
            </ul>
        </nav>

        <div class="alert alert-danger print-error-msg" style="display:none">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <ul>
                <li>Ha ocurrido un error, revise el formulario o su conexión a internet.</li>
            </ul>
        </div>

        <form id="formAnticorrupcion" method="POST" action="{{ route('postPS') }}" autocomplete="off">
          
          <input name="tipo" type="hidden" value="antiCorrupcion">

          <div class="row">

            <div class="col col-md-4 form-group">
              <label for="expediente">Expediente</label>
              <input class="form-control" id="expediente" maxlength="15" name="expediente" type="text" placeholder="Carpeta de Administrativa" required>
            </div>

            <div class="col col-md-4 form-group">
              <label for="carpeta administrativa">Carpeta de Administrativa</label>
              <input class="form-control" id="carpetaAdministrativa" maxlength="15" name="carpetaAdministrativa" type="text" placeholder="Carpeta de Administrativa" required>
            </div>

            <div class="col col-md-4 form-group">
              <label for="Carpeta de investigación">Carpeta de investigación</label>
              <input class="form-control" id="carpetaInvestigacion" name="carpetaInvestigacion" maxlength="25" type="text" placeholder="Carpeta investigación" required>
            </div>

          </div>

          <div class="row">

            <div class="col col-md-4 form-group">
              <label for="Fecha de asignación">Fecha asignación</label>
              <div class="input-group">
                <input type="text" class="form-control" id="fechaAsignacion" name="fechaAsignacion" placeholder="dd/mm/yyyy" data-date-format='yyyy-mm-dd' required>
                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
              </div>
            </div>

            <div class="col col-md-4 form-group">
              <label for="averiguacion previa">Averiguación previa</label>
              <input class="form-control" id="averiguacionPrevia" name="averiguacionPrevia" maxlength="30" type="text" placeholder="Averiguación previa" required>
            </div>

            <div class="col col-md-4 form-group""></div>

          </div>

          <div class="row">

            <div class="col col-md-4 form-group">
              <label for="Civil">Personal involucrado: &nbsp</label>
              <input type="radio" id="radio1" name="radios" value="civil">
              <label for="radio1">Civil</label>
              <input type="radio" id="radio2" name="radios" value="policia">
              <label for="radio2">Policia</label>
            </div>

            <div class="col col-md-4 form-group" id="cajaCivil" style="display: none;">
              <label for="Civil">Civil presunto</label>
              <input class="form-control" id="civil" name="civil" maxlength="25" type="text" placeholder="civil">
            </div>

            <div class="col col-md-4 form-group" id="cajaPolicia" style="display: none;">
              <label for="Policia">Policia</label>
              <input class="form-control" id="policia" name="policia" maxlength="25" type="text" placeholder="policia">
            </div>

            <div class="col col-md-4 form-group"></div>

          </div>

          <div class="row">
            <div class="col col-md-12 form-group">
              <label for="exampleTextarea">Observaciones</label>
              <textarea class="form-control" id="observaciones" name="observaciones" rows="4"></textarea>
            </div>
          </div>

          <div class="row">
            <div class="col col-md-12 form-group">
              <div class="pull-right">
                <button type="botton" class="btn btn-danger" id="btnCancelar">
                      <i class="fa fa-trash"></i> &nbsp Cancelar
                </button>
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
<script type="text/javascript" src="_vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="_vendor/jquery-validate/jquery-validate.js"></script>
<script type="text/javascript" src="_vendor/jquery-validate/additional-methods.min.js"></script>
<script type="text/javascript" src="_vendor/bootstrap-datepicker/dist/js/bdLocal.js"></script>
<script type="text/javascript" src="_vendor/select2/dist/js/select2.min.js"></script>
<script type="text/javascript" src="_vendor/sweetAlert/sweetalert.min.js"></script>
<script type="text/javascript" src="_vendor/jquery-validate/jquery-validate.js"></script>
<script type="text/javascript" src="_vendor/jquery-validate/additional-methods.min.js"></script>
<script type="text/javascript" src="js/site/formAnticorrupcionSite.js"></script>
@endsection
