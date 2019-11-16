@extends('layouts.main_layout')

@section('title', 'Armas')

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
                        <div class="col col-md-4 form-group">
                            <label for="exampleTextarea">Numero servicio</label>
                            <input class="form-control" id="numero_servicio" maxlength="15" name="numero_servicio" type="text" placeholder="Numero servicio" required>
                        </div>

                        <div class="col col-md-4 form-group">
                            <label for="exampleTextarea">Abogado integrado</label>
                            <input class="form-control" id="abogado_integrado" name="abogado_integrado" maxlength="50" type="text" placeholder="abogado integrado" required>
                        </div>

                        <div class="col col-md-4 form-group">
                            <label for="exampleSelect1">Estado</label>
                            <select class="form-control" id="estado" name="estado"></select>
                        </div>
                    </div>

                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->

                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->
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

                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->

                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->
                    <div class="row">
                        <div class="col col-md-4 form-group">
                            <label for="exampleTextarea">Encargado</label>
                            <input class="form-control" id="encargado" name="encargado" type="text" placeholder="encargado" maxlength="30" pattern="[A-Za-z]*" required/>
                        </div>

                        <div class="col col-md-4 form-group">
                            <label for="fecha registro">Fecha registro</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="fecha_registro" name="fecha_registro" placeholder="dd/mm/yyyy" required>
                                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                            </div>
                        </div>

                        <div class="col col-md-4 form-group">
                            <label for="motivo_investigacion">Motivo investigación</label>
                            <input class="form-control" id="motivo_investigacion" name="motivo_investigacion" maxlength="30" type="text" placeholder="motivo de investigacion" required>
                        </div>
                    </div>


                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->
                    <div class="row">
                        <div class="col col-md-6 form-group">
                            <label for="ofendido">ofendido</label>
                            <input class="form-control" id="ofendido" name="ofendido" maxlength="30" type="text" placeholder="ofendido" required>
                        </div>

                        <div class="col col-md-6 form-group">
                                <label for="fecha resolucion">Fecha resolución</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="fecha_resolucion" name="fecha_resolucion" placeholder="dd/mm/yyyy" required>
                                    <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                </div>
                          </div>
                    </div>
                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->

                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->
                    <div class="row">
                        <div class="col col-md-6 form-group">
                            <label for="sentido resolucion">Sentido resolución</label>
                            <input class="form-control" id="sentido_resolucion" name="sentido_resolucion" maxlength="30" type="text" placeholder="sentido resolución" required>
                        </div>
                        <div class="col col-md-6 form-group">
                            <label for="estado_procesal">Estado procesal</label>
                            <select class="form-control" id="estado_procesal" name="estado_procesal"></select>
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
            <h4 class="mb-1">Armas</h4>
            <div class="pull-right">
                <button id="btnNuevo" class="btn btn-primary"  href="javascript:void(0)">Nuevo</button>
            </div>
            <br>
            <br>
            <br>
            <table id="tablaArmas" class="table table-striped table-bordered dataTable">
                <thead>
                    <tr>
                        <th>id</th>
                        <th># de servicio</th>
                        <th>Abogado</th>
                        <th>Estado</th>
                        <th># de espediente</th>
                        <th>Poligono</th>
                        <th>Solicitante</th>
                        <th>Encargado</th>
                        <th>Fecha registro</th>
                        <th>Motivo de investigación</th>
                        <th>Ofendido</th>
                        <th>Fecha de resolución</th>
                        <th>Sentido resolución</th>
                        <th>Estado procesal</th>
                        <th width="160px">&nbsp;</th>
                    </tr>
                </thead>
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
<script type="text/javascript" src="js/site/armasSite.js"></script>
@endsection
