@extends('layouts.main_layout')

@section('title', 'Página principal')

@section('content')

<div class="row row-md mb-2">
    <!-- Content -->
    <div class="content-area py-1">
      <div class="container-fluid">
        <h4>Formulario recursos humanos</h4>
        <div class="box box-block bg-white">
          <form>
            <div class="row">
              <div class="col col-md-12 form-group">
                <label for="exampleTextarea">Queja</label>
                <textarea class="form-control" id="queja" rows="3"></textarea>
              </div>
            </div>

            <div class="row">
              <div class="col col-md-6 form-group">
                <label for="exampleSelect1">Fecha de recepción</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="fecha" placeholder="dd/mm/yyyy" name="fecha">
                  <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                </div>
              </div>
              <div class="col col-md-6 form-group">
                <label for="exampleSelect1">Abogado</label>
                <select class="form-control" id="abogado">
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col col-md-6 form-group">
                <label for="exampleSelect1">Estado procesal</label>
                <select class="form-control" id="estado">
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col col-md-12 form-group">
                <label for="exampleTextarea">Asunto</label>
                <textarea class="form-control" id="asunto" rows="3"></textarea>
              </div>
            </div>

            <div class="row">
              <div class="col col-md-12 form-group">
                <label for="exampleTextarea">Presunto derecho violado</label>
                <textarea class="form-control" id="presunto" rows="3"></textarea>
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
@endsection

@section('scripts')
<script type="text/javascript" src="_vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.es.min.js"></script>
<script type="text/javascript" src="js/site/formRecursosHumanosSite.js"></script>
@endsection