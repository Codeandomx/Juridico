@extends('layouts.main_layout')

@section('title', 'Página principal')

@section('styles')
<link rel="stylesheet" href="_vendor/jsgrid/dist/jsgrid.css" />
<link rel="stylesheet" href="_vendor/jsgrid/dist/jsgrid-theme.min.css" />
<link rel="stylesheet" href="_vendor/DataTables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="_vendor/DataTables/Responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="_vendor/DataTables/Buttons/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="_vendor/DataTables/Buttons/css/buttons.bootstrap4.min.css">
<style>
    #btnNuevo{
        margin-bottom: 15px;
    }
</style>
@endsection

@section('content')
<div class="row row-md mb-2">
    <div class="col-md-12">
        <div class="box box-block bg-white">
            <h4 class="mb-1">Penal y siniestros</h4>
            <div class="pull-right">
                <button id="btnNuevo" class="btn btn-primary">Nuevo</button>
            </div>
            <br>
            <br>
            <br>
            <table id="tabla" class="table table-striped table-bordered dataTable">
                <thead>
                    <tr>
                        <th># Consecutivo</th>
                        <th>Carpeta de Investigación</th>
                        <th>fecha de asignación</th>
                        <th>agencia MP</th>
                        <th>Servidor publico</th>
                        <th>Denunciante</th>
                        <th>Delito</th>
                        <th>Poligono</th>
                        <th>Estado procesal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($collection as $item)
                        <tr>
                            <td>{{ $item->numero_consecutivo }}</td>
                            <td>{{ $item->carpeta_investigacion }}</td>
                            <td>{{ $item->fecha_asignacion }}</td>
                            <td>{{ $item->agencia_mp }}</td>
                            <td>{{ $item->servidor_publico }}</td>
                            <td>{{ $item->denunciante }}</td>
                            <td>{{ $item->delito }}</td>
                            <td>{{ $item->poligono }}</td>
                            <td>{{ $item->estado_procesal }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
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
<script type="text/javascript" src="js/site/penalSiniestrosSite.js"></script>
@endsection
