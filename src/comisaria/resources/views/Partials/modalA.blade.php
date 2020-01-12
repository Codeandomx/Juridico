<!-- Modal -->
<div class="modal fade" id="ajaxModel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="modelHeading"></h4>

            </div>

            <div class="modal-body">

            <form id="formArmas" method="POST" action="{{ route('postArmas') }}">

              <input type="hidden" name="id" id="id">

              <div class="row">
                <div class="col col-md-4 form-group">
                  <label for="exampleTextarea">Numero consecutivo</label>
                  <input class="form-control" id="numero_servicio" maxlength="15" name="numero_servicio" type="text" placeholder="Numero servicio" required>
                </div>

                <div class="col col-md-4 form-group">
                  <label for="exampleTextarea">Abogado</label>
                  <select class="form-control" id="abogado_integrado" name="abogado_integrado"></select>
                </div>

                <div class="col col-md-4 form-group">
                  <label for="exampleSelect1">Estado</label>
                  <select class="form-control" id="estado" name="estado"></select>
                </div>
              </div>

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

              <div class="row">
                <div class="col col-md-6 form-group">
                  <label for="exampleTextarea">Encargado</label>
                  <input class="form-control" id="encargado" name="encargado" type="text" placeholder="encargado" maxlength="30" pattern="[A-Za-z]" required/>
                </div>
                <div class="col col-md-6 form-group">
                  <label for="fecha registro">Fecha registro</label>
                  <div class="input-group">
                      <input type="text" class="form-control" id="fecha_registro" name="fecha_registro" placeholder="yyyy-mm-dd" data-date-format='yyyy-mm-dd' required>
                      <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                  </div>
                </div>
              </div>

              <div class="row">
                  <div class="col col-md-4 form-group">
                      <label for="motivo_investigacion">Motivo investigación</label>
                      <input class="form-control" id="motivo_investigacion" name="motivo_investigacion" maxlength="30" type="text" placeholder="motivo de investigacion" required>
                  </div>
                  <div class="col col-md-4 form-group">
                      <label for="ofendido">ofendido</label>
                      <input class="form-control" id="ofendido" name="ofendido" maxlength="30" type="text" placeholder="ofendido" required>
                  </div>

                  <div class="col col-md-4 form-group">
                      <label for="fecha resolucion">Fecha resolución</label>
                      <div class="input-group">
                          <input type="text" class="form-control" id="fecha_resolucion" name="fecha_resolucion" placeholder="yyyy-mm-dd" data-date-format='yyyy-mm-dd' required>
                          <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                      </div>
                </div>
              </div>

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

              <div class="col-md-offset-8 col-md-4">
               <button type="submit" class="btn btn-primary" id="saveBtn" value="create">
                 <i class="fa fa-save"> </i> &nbsp Guardar
               </button>
              </div>

            </form>
            </div>
        </div>
    </div>
</div> <!-- Fin del modal -->

<br>
