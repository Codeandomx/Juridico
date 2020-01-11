@extends('layouts.main_layout')

@section('title', 'Reportes derechos humanos')

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
<div class="row row-md mb-2">
    <div class="col-md-12">
        <div class="box box-block bg-white">
                <nav>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Derechos humanos</a></li>
                        <li class="breadcrumb-item active"><a href="#">Reportes</a></li>
                    </ul>
                </nav>
            <br>
            <br>
            <form id="formBuscar" method="POST" action="api/DerechosHumanoReporte">
    
                <div class="row">
                  <div class="col col-md-4 form-group">
                    <label for="exampleSelect1">Fecha inicio</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="fecha_inicio" name="fecha_inicio" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" name="fecha_recepcion">
                      <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                    </div>
                  </div>
                  <div class="col col-md-4 form-group">
                    <label for="exampleSelect1">Fecha fin</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="fecha_fin" name="fecha_fin" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" name="fecha_recepcion">
                      <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                    </div>
                  </div>
                  <div class="col col-md-4 form-group">
                    <label for="exampleSelect1">&nbsp;</label>
                    <div class="input-group pull-right">
                      <button type="submit" class="btn btn-primary">
                       <i class="fa fa-search"></i> &nbsp Buscar</button>
                    </div>
                  </div>
                </div>
    
              </form>
            <br>
            <br>
            <table id="tabla" class="table table-striped table-bordered dataTable" style="width: 100%;">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Queja</th>
                        <th>Fecha de resepción</th>
                        <th>Abogados</th>
                        <th>Estado procesal</th>
                        <th>Asunto</th>
                        <th>Derecho violado</th>
                        <th width="150px">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
            </table>
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
<script type="text/javascript" src="js/site/derechosHumanosReporteSite.js"></script>
@endsection
