@extends('layouts.main_layout')

@section('title', 'Pagina Principal')

@section('metas')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
<div class="row row-md mb-2">
    <!-- Content -->
    <div class="content-area py-1">
      <div class="container-fluid">
        <h4>Penal y siniestros</h4>
        <div class="box box-block bg-white">
            <div class="alert alert-danger print-error-msg" style="display:none">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <ul></ul>
            </div>
          <form id="formPenalSiniestros" method="POST" action="{{ route('postPS') }}">
            {{-- action="/penal-siniestros-form" --}}
            <div class="row">
              <div class="col col-md-4 form-group">
                <label for="exampleTextarea">Numero consecutivo</label>
                <input class="form-control" id="numero_consecutivo" maxlength="15" name="numero_consecutivo" type="text" placeholder="Numero consecutivo" required>
              </div>

              <div class="col col-md-4 form-group">
                <label for="exampleTextarea">Carpeta de investigación</label>
                <input class="form-control" id="carpeta_investigacion" name="carpeta_investigacion" maxlength="150" type="text" placeholder="Carpeta investigación" required>
              </div>

              <div class="col col-md-4 form-group">
                <label for="exampleSelect1">Fecha de asignación</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="fecha_asignacion" name="fecha_asignacion" placeholder="dd/mm/yyyy" required>
                  <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                </div>
              </div>
            </div>

            <div class="row">
                <div class="col col-md-4 form-group">
                    <label for="exampleTextarea">Agencia MP</label>
                    <input class="form-control" id="agencia_mp" name="agencia_mp" maxlength="50" type="text" placeholder="agencia MP" required>
                </div>

                <div class="col col-md-4 form-group">
                    <label for="exampleSelect1">Servidor publico</label>
                    <select class="form-control" id="servidor_publico" name="servidor_publico">
                    </select>
                </div>

                <div class="col col-md-4 form-group">
                        <label for="exampleTextarea">Denunciante</label>
                        <input class="form-control" id="denunciante" name="denunciante" maxlength="30" type="text" placeholder="denunciante" required>
                </div>
            </div>

            <div class="row">
              <div class="col col-md-6 form-group">
                <label for="exampleTextarea">Delito</label>
                <input class="form-control" id="delito" name="delito" type="text" placeholder="delito" maxlength="30" pattern="[A-Za-z]*" required/>
              </div>
              <div class="col col-md-6 form-group">
                    <label for="exampleTextarea">Poligono</label>
                    <input class="form-control" id="poligono" name="poligono" type="text" placeholder="poligono" maxlength="50" required/>
              </div>
            </div>

            <div class="row">
                <div class="col col-md-4 form-group">
                    <label for="exampleSelect1">Estado procesal</label>
                    <select class="form-control" id="estado_procesal" name="estado_procesal" required>
                    </select>
                </div>
            </div>

            <div class="row">
              <div class="col col-md-12 form-group">
                <label for="exampleTextarea">Observaciones</label>
                <textarea class="form-control" id="observaciones" name="observaciones" rows="3" required></textarea>
              </div>
            </div>

            <div class="row">
              <div class="col col-md-12 form-group">
                <div class="pull-right">
                  <button type="botton" class="btn btn-danger" id="btnCancelar">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="_vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="_vendor/jquery-validate/jquery-validate.js"></script>
<script type="text/javascript" src="_vendor/jquery-validate/additional-methods.min.js"></script>
<script type="text/javascript" src="_vendor/bootstrap-datepicker/dist/js/bdLocal.js"></script>
<script type="text/javascript" src="js/site/formPenalSiniestrosSite.js"></script>
@endsection
