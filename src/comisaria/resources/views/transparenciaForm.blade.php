@extends('layouts.main_layout')

@section('title', 'Pagina Principal')

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
                    <li class="breadcrumb-item"><a href="#">Transparencia</a></li>
                    <li class="breadcrumb-item active"><a href="#">Formulario</a></li>
                </ul>
            </nav>

            <!-- Mensajes de errores -->
            <div id="erroresBox" class="alert alert-danger print-error-msg" style="display:none">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <ul></ul>
            </div>            

            <form id="transparenciaForm" method="POST" action="{{ route('postT') }}">

                   <div class="row">
                    <div class="col col-md-6 form-group">
                        <label for="exampleTextarea">Folio</label>
                        <input class="form-control" id="Folio" maxlength="15" name="Folio" placeholder="folio" required>
                    </div>

                    <div class="col col-md-6 form-group">
                        <label for="exampleTextarea">Expediente</label>
                        <input class="form-control" id="Expediente" name="Expediente" maxlength="25" placeholder="Expediente" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-4 form-group">
                        <label for="exampleTextarea">Solicitante</label>
                        <input class="form-control" id="Solicitante" name="Solicitante" maxlength="25" placeholder="Solicitante" required>
                    </div>
                    <div class="col col-md-4 form-group">
                        <label for="exampleSelect1">Recepción</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="Recepcion" name="Recepcion" placeholder="yyyy-mm-dd" data-date-format='yyyy-mm-dd' required>
                            <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                        </div>
                    </div>
                    <div class="col col-md-4 form-group">
                        <label for="exampleTextarea">Información</label>
                        <input class="form-control" id="Informacion" maxlength="50" name="Informacion" placeholder="informacion" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-4 form-group">
                        <label for="exampleTextarea">Derivado</label>
                        <input class="form-control" id="Derivado" name="Derivado" maxlength="30" type="text" placeholder="Derivado" required>
                    </div>
                    <div class="col col-md-4 form-group">
                        <label for="exampleTextarea">Canalización</label>
                        <input class="form-control" id="Canalizacion" name="Canalizacion" type="text" placeholder="Canalizacion" maxlength="30" required />
                    </div>
                    <div class="col col-md-12 form-group">
                        <label for="exampleTextarea">Respuesta</label>
                        <textarea class="form-control" id="Respuesta" name="Respuesta" rows="3" required></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-4 form-group">
                        <label for="exampleTextarea">Envio de UT</label>
                        <input class="form-control" id="Envio_UT" name="Envio_UT" maxlength="50" placeholder="Envio de UT" required>
                    </div>
                    <div class="col col-md-4 form-group">
                        <label for="exampleSelect1">Fecha</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="Fecha" name="Fecha" data-date-format='yyyy-mm-dd' placeholder="yyyy-mm-dd" required>
                            <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                        </div>
                    </div>
                    <div class="col col-md-4 form-group">
                        <label for="Observaciones">Observación</label>
                        <select class="form-control" id="idObservacion" name="idObservacion" required></select>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-12 form-group">
                      <div class="pull-right">
                        <button type="botton" class="btn btn-danger" id="btnCancelar">
                            <i class="fa fa-trash"> </i> &nbsp Cancelar</button>
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
<script type="text/javascript" src="js/site/formtransparenciaSite.js"></script>
@endsection
