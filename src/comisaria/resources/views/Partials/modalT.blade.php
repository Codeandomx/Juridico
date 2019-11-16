<!-- Modal -->
<div class="modal fade" id="ajaxModel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="modelHeading"></h4>

            </div>

            <div class="modal-body">

                <form id="transparenciaForm" name="transparenciaForm" class="form-horizontal">

                   <input type="hidden" name="id" id="id">

                   <!-- ---------------------------------------------------------------------------------------------------------------------- -->
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

                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->

                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->
                    <div class="row">
                        <div class="col col-md-4 form-group">
                            <label for="exampleTextarea">Solicitante</label>
                            <input class="form-control" id="Solicitante" name="Solicitante" maxlength="25" placeholder="Solicitante" required>
                        </div>
                        <div class="col col-md-4 form-group">
                            <label for="exampleSelect1">Recepción</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="Recepcion" name="Recepcion" placeholder="dd/mm/yyyy" required>
                                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                            </div>
                        </div>
                        <div class="col col-md-4 form-group">
                            <label for="exampleTextarea">Información</label>
                            <input class="form-control" id="Informacion" maxlength="50" name="Informacion" placeholder="informacion">
                        </div>
                    </div>
                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->

                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->
                    <div class="row">
                        <div class="col col-md-4 form-group">
                            <label for="exampleTextarea">Derivado</label>
                            <input class="form-control" id="Derivado" name="Derivado" maxlength="30" type="text" placeholder="Derivado">
                        </div>
                        <div class="col col-md-4 form-group">
                            <label for="exampleTextarea">Canalización</label>
                            <input class="form-control" id="Canalizacion" name="Canalizacion" type="text" placeholder="Canalizacion" maxlength="30"/>
                        </div>
                        <div class="col col-md-12 form-group">
                            <label for="exampleTextarea">Respuesta</label>
                            <textarea class="form-control" id="Respuesta" name="Respuesta" rows="3" required></textarea>
                        </div>
                    </div>

                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->

                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->
                    <div class="row">
                        <div class="col col-md-4 form-group">
                            <label for="exampleTextarea">Envio de UT</label>
                            <input class="form-control" id="Envio_UT" name="Envio_UT" maxlength="50" placeholder="Envio de UT">
                        </div>
                        <div class="col col-md-4 form-group">
                            <label for="exampleSelect1">Fecha</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="Fecha" name="Fecha" placeholder="dd/mm/yyyy" required>
                                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                            </div>
                        </div>
                        <div class="col col-md-4 form-group">
                            <label for="Observaciones">Observación</label>
                            <select class="form-control" id="idObservacion" name="idObservacion"></select>
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

<br>
