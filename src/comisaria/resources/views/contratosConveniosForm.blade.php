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
                <li class="breadcrumb-item"><a href="#">Contratos y Convenios</a></li>
                <li class="breadcrumb-item active"><a href="#">Formulario</a></li>
            </ul>
        </nav>

        <!-- Mensajes de errores -->
        <div id="erroresBox" class="alert alert-danger print-error-msg" style="display:none">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <ul></ul>
        </div>
            
          <form id="formCC" method="POST" action="{{ route('postCC') }}" enctype="multipart/form-data" autocomplete="off">

            <div class="row">
              <div class="col col-md-4 form-group">
                <label for="exampleTextarea">Objeto de contrato</label>
                <input class="form-control" id="ObjetoContrato" maxlength="15" name="ObjetoContrato" type="text" placeholder="Objeto de contrato">
              </div>

              <div class="col col-md-4 form-group">
                <label for="exampleTextarea">Contratante</label>
                <input class="form-control" id="Contratante" name="Contratante" maxlength="50" type="text" placeholder="Contratante">
              </div>

              <div class="col col-md-4 form-group">
                <label for="fecha registro">Vigencia</label>
                <div class="input-group">
                    <input type="text" class="form-control fecha" id="Vigencia" name="Vigencia" placeholder="yyyy-mm-dd" data-date-format='yyyy-mm-dd' required>
                    <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                </div>
            </div>
            </div>

            <div class="row">
                <div class="col col-md-4 form-group">
                    <label for="exampleTextarea">Fundamento legal</label>
                    <input class="form-control" id="FundamentoLegal" name="FundamentoLegal" maxlength="80" type="text" placeholder="Fundamento legal">
                </div>

                <div class="col col-md-4 form-group">
                    <label for="exampleSelect1">Recurso</label>
                    <input class="form-control" id="Recurso" name="Recurso" type="text" placeholder="Recurso" maxlength="50"/>
                </div>

                <div class="col col-md-4 form-group">
                        <label for="exampleTextarea">ContraPrestacion</label>
                        <input class="form-control" id="ContraPrestacion" name="ContraPrestacion" maxlength="50" type="text" placeholder="ContraPrestacion">
                </div>
            </div>

            <div class="row">

              <div class="col col-md-4 form-group">
                <label for="exampleTextarea">Decreto</label>
                <input class="form-control" id="Decreto" name="Decreto" type="text" placeholder="Decreto" maxlength="50" />
              </div>

              <div class="col col-md-4 form-group">
                <label for="fecha registro">Fecha de Elaboracion</label>
                <div class="input-group">
                    <input type="text" class="form-control fecha" id="FechaElaboracion" name="FechaElaboracion" placeholder="yyyy-mm-dd" data-date-format='yyyy-mm-dd' required>
                    <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                </div>
              </div>

              <div class="col col-md-4 form-group">
                <label for="Tipo">Tipo</label>
                <select class="form-control" id="Tipo" name="Tipo" required></select>
              </div>

            </div>

              <div class="row">

                <div class="col col-md-4 form-group">
                    <label for="file">Subir PDF</label>
                    <br>
                    <label id="browse-label" for="file"><i class="fa fa-upload" aria-hidden="true"></i>Buscar...
                    </label>
                    <input type="file" id="file" name="pdf">
                </div>

                <div class="col col-md-8 form-group">
                  <label for="exampleTextarea">Observaciones</label>
                  <textarea class="form-control" id="observaciones" name="observaciones" rows="4"></textarea>
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
<script type="text/javascript" src="js/site/formContratosSite.js"></script>
@endsection
