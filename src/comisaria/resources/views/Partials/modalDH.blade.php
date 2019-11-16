<!-- Modal -->
<div class="modal fade" id="ajaxModel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="modelHeading"></h4>

            </div>

            <div class="modal-body">

                <form id="productForm" name="productForm" class="form-horizontal" action="{{ route('postDH') }}">

                   <input type="hidden" name="id" id="id">

                   <!-- ---------------------------------------------------------------------------------------------------------------------- -->
                   <div class="row">
                    <div class="col col-md-12 form-group">
                      <label for="exampleTextarea">Queja</label>
                      <textarea class="form-control" id="queja" name="queja" rows="3"></textarea>
                    </div>
                  </div>

                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->

                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->
                    <div class="row">
                        <div class="col col-md-6 form-group">
                          <label for="exampleSelect1">Fecha de recepción</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="fecha_recepcion" name="fecha_recepcion" placeholder="dd/mm/yyyy" name="fecha_recepcion">
                            <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                          </div>
                        </div>
                        <div class="col col-md-6 form-group">
                          <label for="exampleSelect1">Abogado</label>
                          <select class="form-control" id="abogados" name="abogados">
                            <option value="1">Jose Manuel</option>
                            <option value="2">Marco Antonio</option>
                            <option value="3">Jose Luis</option>
                            <option value="4">Angel Damian</option>
                          </select>
                        </div>
                      </div>
                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->

                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->
                    <div class="row">
                        <div class="col col-md-6 form-group">
                          <label for="exampleSelect1">Estado procesal</label>
                          <select class="form-control" id="estado_procesal" name="estado_procesal">
                          </select>
                        </div>
                    </div>

                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->

                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->
                    <div class="row">
                        <div class="col col-md-12 form-group">
                          <label for="exampleTextarea">Asunto</label>
                          <textarea class="form-control" id="asunto" name="asunto" rows="3"></textarea>
                        </div>
                    </div>


                    <!-- ---------------------------------------------------------------------------------------------------------------------- -->
                    <div class="row">
                        <div class="col col-md-12 form-group">
                          <label for="exampleTextarea">Presunto derecho violado</label>
                          <textarea class="form-control" id="derecho_violado" name="derecho_violado" rows="3"></textarea>
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
