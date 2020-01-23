@extends('layouts.main_layout')

@section('title', 'Penal & Siniestros')

@section('metas')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('styles')
<link rel="stylesheet" href="_vendor/DataTables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="_vendor/DataTables/Responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="_vendor/DataTables/Buttons/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="_vendor/DataTables/Buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="_vendor/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="css/radios.css">
@endsection

@section('content')
<div class="row row-md mb-2">
    <div class="col-md-12">
        <div class="box box-block bg-white">

        <nav>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Penal y Siniestros</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('registrosPS') }}">Registros</a></li>
                <li class="breadcrumb-item active"><a href="#">Agencias Varias</a></li>
            </ul>
        </nav>

        <div class="pull-right">
            <button id="btnNuevo" class="btn btn-primary" href="javascript:void(0)" style="margin-bottom: 15px;">
                <i class="fa fa-plus"> </i> &nbsp Nuevo registro
            </button>
        </div>
        
        <br>
        <h2>Registros activos</h2>
        <table id="tablaAV" class="table table-striped table-bordered dataTable" style="width: 100%;">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Carpeta administrativa</th>
                    <th>Carpeta de Investigación</th>
                    <th>Averiguacion previa</th>
                    <th>Expediente</th>
                    <th>Fecha asignación</th>
                    <th>Civil</th>
                    <th>Policia</th>
                    <th>observaciones</th>
                    <th width="150px">&nbsp;</th>
                </tr>
            </thead>
        </table>   
    </div>
  </div>
</div>

@include('partials.modalAV')
@endsection

@section('scripts')
<script type="text/javascript" src="_vendor/sweetAlert/sweetalert.min.js"></script>
<script type="text/javascript" src="_vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
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
<script type="text/javascript" src="_vendor/select2/dist/js/select2.min.js"></script>
<script type="text/javascript" src="_vendor/jquery-validate/jquery-validate.js"></script>
<script type="text/javascript" src="_vendor/jquery-validate/additional-methods.min.js"></script>
<script type="text/javascript" src="js/site/AgenciasVariasSite.js"></script>
@endsection