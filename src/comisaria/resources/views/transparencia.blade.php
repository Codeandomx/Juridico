@extends('layouts.main_layout')

@section('title', 'Página principal')

@section('metas')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('styles')
<link rel="stylesheet" href="_vendor/DataTables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="_vendor/DataTables/Responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="_vendor/DataTables/Buttons/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="_vendor/DataTables/Buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')
<br>
<div class="row row-md mb-2">
    <div class="col-md-12">
        <div class="box box-block bg-white">
            <nav>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Transparencia</a></li>
                    <li class="breadcrumb-item active"><a href="#">Registros</a></li>
                </ul>
            </nav>

            <!-- Mensajes de error -->
            <div id="erroresBox" class="alert alert-danger print-error-msg" style="display:none">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <ul></ul>
            </div>

            <br>
            <div class="pull-right">
                <button id="btnNuevo" class="btn btn-primary" href="javascript:void(0)" style="margin-bottom: 15px;">
                    <i class="fa fa-plus"> </i> &nbsp Nuevo registro
                </button>
            </div>

            <br>
            <br>
            <br>
            <table id="tabla" class="table table-striped table-bordered dataTable" style="width: 100%;">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Folio</th>
                        <th>Expediente</th>
                        <th>Solicitante</th>
                        <th>Recepcion</th>
                        <th>Información</th>
                        <th>Derivado</th>
                        <th>Canalización</th>
                        <th>Respuesta</th>
                        <th>Envio_UT</th>
                        <th>Fecha</th>
                        <th>Observación</th>
                        <th width="180px">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
            </table>
        </div>
    </div>
</div>
@include('partials.modalT');
@endsection

@section('scripts')
<script type="text/javascript" src="_vendor/sweetAlert/sweetalert.min.js"></script>
<script type="text/javascript" src="_vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="_vendor/jquery-validate/jquery-validate.js"></script>
<script type="text/javascript" src="_vendor/jquery-validate/additional-methods.min.js"></script>
<script type="text/javascript" src="_vendor/bootstrap-datepicker/dist/js/bdLocal.js"></script>
<script type="text/javascript" src="_vendor/DataTables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="_vendor/DataTables/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="_vendor/DataTables/Responsive/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="_vendor/DataTables/Responsive/js/responsive.bootstrap4.min.js"></script>
<script type="text/javascript" src="_vendor/DataTables/Buttons/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="_vendor/DataTables/Buttons/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" src="_vendor/DataTables/JSZip/jszip.min.js"></script>
<script type="text/javascript" src="_vendor/DataTables/pdfmake/build/pdfmake.min.js"></script>
<script type="text/javascript" src="_vendor/DataTables/pdfmake/build/vfs_fonts.js"></script>
<script type="text/javascript" src="_vendor/DataTables/Buttons/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="_vendor/DataTables/Buttons/js/buttons.print.min.js"></script>
<script type="text/javascript" src="_vendor/DataTables/Buttons/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="js/site/transparenciaSite.js"></script>
@endsection
