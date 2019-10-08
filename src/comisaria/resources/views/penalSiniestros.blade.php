@extends('layouts.main_layout')

@section('title', 'Página principal')

@section('metas')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

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
<!-- Modal -->
<div class="modal fade" id="ajaxModel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="modelHeading"></h4>

            </div>

            <div class="modal-body">

                <form id="productForm" name="productForm" class="form-horizontal">

                   <input type="hidden" name="id" id="id">

                   <!-- ---------------------------------------------------------------------------------------------------------------------- -->
                   <div class="row">
                        <div class="col col-md-6 form-group">
                            <label for="exampleTextarea">Numero consecutivo</label>
                            <input class="form-control" id="numero_consecutivo" maxlength="15" name="numero_consecutivo" type="text" placeholder="Numero consecutivo" required>
                        </div>

                        <div class="col col-md-6 form-group">
                            <label for="exampleTextarea">Carpeta de investigación</label>
                            <input class="form-control" id="carpeta_investigacion" name="carpeta_investigacion" maxlength="150" type="text" placeholder="Carpeta investigación" required>
                        </div>
                    </div>

                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->

                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->
                    <div class="row">
                        <div class="col col-md-4 form-group">
                            <label for="exampleSelect1">Fecha de asignación</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="fecha_asignacion" name="fecha_asignacion" placeholder="dd/mm/yyyy" required>
                                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                            </div>
                        </div>
                        <div class="col col-md-4 form-group">
                                <label for="exampleTextarea">Agencia MP</label>
                                <input class="form-control" id="agencia_mp" name="agencia_mp" maxlength="50" type="text" placeholder="agencia MP" required>
                        </div>
                        <div class="col col-md-4 form-group">
                            <label for="exampleSelect1">Servidor publico</label>
                            <select class="form-control" id="servidor_publico" name="servidor_publico"></select>
                        </div>
                    </div>
                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->

                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->
                    <div class="row">
                        <div class="col col-md-6 form-group">
                            <label for="exampleTextarea">Denunciante</label>
                            <input class="form-control" id="denunciante" name="denunciante" maxlength="30" type="text" placeholder="denunciante" required>
                        </div>
                        <div class="col col-md-6 form-group">
                            <label for="exampleTextarea">Delito</label>
                            <input class="form-control" id="delito" name="delito" type="text" placeholder="delito" maxlength="30" pattern="[A-Za-z]*" required/>
                        </div>
                    </div>

                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->

                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->
                    <div class="row">
                        <div class="col col-md-6 form-group">
                            <label for="exampleTextarea">Poligono</label>
                            <input class="form-control" id="poligono" name="poligono" type="text" placeholder="poligono" maxlength="50" required/>
                        </div>
                        <div class="col col-md-6 form-group">
                            <label for="exampleSelect1">Estado procesal</label>
                            <select class="form-control" id="estado_procesal" name="estado_procesal" required></select>
                        </div>
                    </div>


                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->
                    <div class="row">
                        <div class="col col-md-12 form-group">
                            <label for="exampleTextarea">Observaciones</label>
                            <textarea class="form-control" id="observaciones" name="observaciones" rows="3" required></textarea>
                        </div>
                    </div>
                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->


                    <div class="col-md-offset-8 col-md-4">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Guardar cambios</button>
                    </div>

                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->
                </form>
            </div>
        </div>
    </div>
</div> <!-- Fin del modal -->

<div class="row row-md mb-2">
    <div class="col-md-12">
        <div class="box box-block bg-white">
            <h4 class="mb-1">Penal y siniestros</h4>
            <div class="pull-right">
                <button id="btnNuevo" class="btn btn-primary" href="javascript:void(0)">Nuevo</button>
            </div>
            <br>
            <br>
            <br>
            <table id="tabla" class="table table-striped table-bordered dataTable">
                <thead>
                    <tr>
                        <th>id</th>
                        <th># Consecutivo</th>
                        <th>Carpeta de Investigación</th>
                        <th>fecha de asignación</th>
                        <th>agencia MP</th>
                        <th>Servidor publico</th>
                        <th>Denunciante</th>
                        <th>Delito</th>
                        <th>Poligono</th>
                        <th>Estado procesal</th>
                        <th>&nbsp;</th>
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
<script type="text/javascript" src="js/site/penalSiniestrosSite.js"></script>
@endsection

