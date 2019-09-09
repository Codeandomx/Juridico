@extends('layouts.main_layout')

@section('title', 'Penal')

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
          <form id="formPenalSiniestros" method="POST" action="{{ route('registroPS') }}">

            <div class="row">
              <div class="col col-md-4 form-group">
                <label for="exampleTextarea">Numero consecutivo</label>
                <input class="form-control" id="numero_consecutivo" name="numero_consecutivo" type="text" placeholder="Numero consecutivo">
              </div>

              <div class="col col-md-4 form-group">
                <label for="exampleTextarea">Carpeta de investigación</label>
                <input class="form-control" id="carpeta_investigacion" name="carpeta_investigacion" type="text" placeholder="Carpeta investigación">
              </div>

              <div class="col col-md-4 form-group">
                <label for="exampleSelect1">Fecha de asignación</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="fecha_asignacion" name="fecha_asignacion" placeholder="dd/mm/yyyy">
                  <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                </div>
              </div>
            </div>

            <div class="row">
                <div class="col col-md-4 form-group">
                    <label for="exampleTextarea">Agencia MP</label>
                    <input class="form-control" id="agencia_mp" name="agencia_mp" type="text" placeholder="agencia MP">
                </div>

                <div class="col col-md-4 form-group">
                    <label for="exampleSelect1">Servidor publico</label>
                    <select class="form-control" id="servidor_publico" name="servidor_publico" required>
                    </select>
                </div>

                <div class="col col-md-4 form-group">
                        <label for="exampleTextarea">Denunciante</label>
                        <input class="form-control" id="denunciante" name="denunciante" type="text" placeholder="denunciante" required>
                </div>
            </div>

            <div class="row">
              <div class="col col-md-6 form-group">
                <label for="exampleTextarea">Delito</label>
                <input class="form-control" id="delito" name="delito" type="text" placeholder="delito" required/>
              </div>
              <div class="col col-md-6 form-group">
                    <label for="exampleTextarea">Poligono</label>
                    <input class="form-control" id="poligono" name="poligono" type="text" placeholder="poligono" required/>
              </div>
            </div>

            <div class="row">
                <div class="col col-md-4 form-group">
                    <label for="exampleSelect1">Estado procesal</label>
                    <select class="form-control" id="estado_procesal" name="estado_procesal">
                    </select>
                </div>
            </div>

            <div class="row">
              <div class="col col-md-12 form-group">
                <label for="exampleTextarea">Observaciones</label>
                <textarea class="form-control" id="observaciones" name="observaciones" rows="3"></textarea>
              </div>
            </div>

            <div class="row">
              <div class="col col-md-12 form-group">
                <div class="pull-right">
                  <button type="submit" class="btn btn-danger" id="btnCancelar">Cancelar</button>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.es.min.js"></script>
<script type="text/javascript" src="js/site/formRecursosHumanosSite.js"></script>
@endsection
