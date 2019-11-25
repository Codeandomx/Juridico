@extends('layouts.main_layout')

@section('title', 'Pagina Principal')

@section('metas')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('styles')
<link rel="stylesheet" href="_vendor/select2/dist/css/select2.min.css">
@endsection

@section('styles')
<link rel="stylesheet" href="_vendor/DataTables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="_vendor/DataTables/Responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="_vendor/DataTables/Buttons/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="_vendor/DataTables/Buttons/css/buttons.bootstrap4.min.css">
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
                    <li class="breadcrumb-item active"><a href="#">Visitaduria</a></li>
                </ul>
            </nav>

            <div class="alert alert-danger print-error-msg" style="display:none">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <ul>
                    <li>Ha ocurrido un error, revise el formulario o su conexión a internet.</li>
                </ul>
            </div>

            <form id="formPenalSiniestros" method="POST" action="{{ route('postPS') }}">
              
              <input name="tipo" type="hidden" value="visitaduria">

              <div class="row">
                <div class="col col-md-4 form-group">
                  <label for="Numero consecutivo">Numero consecutivo</label>
                  <input class="form-control" id="numero_consecutivo" maxlength="15" name="numero_consecutivo" type="text" placeholder="Numero consecutivo" required>
                </div>

                <div class="col col-md-4 form-group">
                  <label for="Carpeta de investigación">Carpeta de investigación</label>
                  <input class="form-control" id="carpeta_investigacion" name="carpeta_investigacion" maxlength="150" type="text" placeholder="Carpeta investigación" required>
                </div>

                <div class="col col-md-4 form-group">
                  <label for="Fecha de asignación">Fecha de asignación</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="fecha_asignacion" name="fecha_asignacion" placeholder="dd/mm/yyyy" data-date-format='yyyy-mm-dd' required>
                    <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                  </div>
                </div>
              </div>

              <div class="row">
                  <div class="col col-md-4 form-group">
                      <label for="Agencia MP">Agencia MP</label>
                      <input class="form-control" id="agencia_mp" name="agencia_mp" maxlength="50" type="text" placeholder="agencia MP" required>
                  </div>

                  <div class="col col-md-4 form-group">
                      <label for="Servidores publicos">Servidores publicos</label>
                      <br>
                      <select class="form-control" multiple="multiple" id="servidor_publico" name="servidor_publico[]"></select>
                  </div>

                  <div class="col col-md-4 form-group">
                    <label for="exampleTextarea">Denunciante</label>
                    <select class="form-control" multiple="multiple" id="denunciante" name="denunciante[]"></select>
                  </div>
              </div>

              <div class="row">
                <div class="col col-md-4 form-group">
                  <label for="exampleTextarea">Delito</label>
                  <select class="form-control" multiple="multipled" id="delito" name="delito[]"></select>
                </div>

                <div class="col col-md-4 form-group">
                      <label for="exampleTextarea">Poligono</label>
                      <input class="form-control" id="poligono" name="poligono" type="text" placeholder="poligono" maxlength="50" required/>
                </div>

                <div class="col col-md-4 form-group">
                  
                </div>
              </div>

              <div class="row">
                <div class="col col-md-4 form-group">
                    <label for="exampleSelect1">Estado procesal</label>
                    <select class="form-control" id="estado_procesal" name="estado_procesal" required>
                    </select>
                </div>
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
<script type="text/javascript" src="js/site/formVisitaduriaSite.js"></script>
@endsection
