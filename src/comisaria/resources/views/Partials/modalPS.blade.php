<!-- Modal -->
<div class="modal fade" id="ajaxModel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>

            <div class="modal-body">

                <form id="productForm" name="productForm" class="form-horizontal" action="{{ route('postPS') }}">

                   <input type="hidden" name="id" id="id">

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

                    <div class="row">
                        <div class="col col-md-4 form-group">
                            <label for="exampleSelect1">Fecha de asignación</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="fecha_asignacion" name="fecha_asignacion" placeholder="yyyy-mm-dd" required data-date-format='yyyy-mm-dd'>
                                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                            </div>
                        </div>
                        <div class="col col-md-4 form-group">
                                <label for="exampleTextarea">Agencia MP</label>
                                <input class="form-control" id="agencia_mp" name="agencia_mp" maxlength="50" type="text" placeholder="agencia MP" required>
                        </div>
                        <div class="col col-md-4 form-group">
                            <label for="exampleSelect1">Servidor publico</label>
                            <select class="form-control" multiple="multiple" id="servidor_publico" name="servidor_publico[]"></select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-md-6 form-group">
                            <label for="exampleTextarea">Denunciante</label>
                            <select class="form-control" multiple="multiple" id="denunciante" name="denunciante[]"></select>
                        </div>
                        <div class="col col-md-6 form-group">
                            <label for="exampleTextarea">Delito</label>
                           <select class="form-control" multiple="multiple" id="delito" name="delito[]"></select>
                        </div>
                    </div>

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

                    <div class="row">
                        <div class="col col-md-12 form-group">
                            <label for="exampleTextarea">Observaciones</label>
                            <textarea class="form-control" id="observaciones" name="observaciones" rows="3" required></textarea>
                        </div>
                    </div>

                    <div class="col-md-offset-8 col-md-4">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Guardar cambios</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div> <!-- Fin del modal -->

<br>
