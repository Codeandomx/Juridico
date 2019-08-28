@extends('layouts.main_layout')

@section('title', 'Página principal')

@section('content')

<div class="row row-md mb-2">
    <!-- Content -->
    <div class="content-area py-1">
      <div class="container-fluid">
        <h4>Formulario recursos humanos</h4>
        <div class="box box-block bg-white">
          <h5>Registro</h5>
          <form>
            <div class="row">
              <div class="col col-md-12 form-group">
                <label for="exampleTextarea">Queja</label>
                <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
              </div>
            </div>

            <div class="row">
              <div class="col col-md-6 form-group">
                <label for="example-date-input">Fecha de recepcion</label>
                <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
              </div>
              <div class="col col-md-6 form-group">
                <label for="exampleSelect1">Abogado</label>
                <select class="form-control" id="exampleSelect1">
                  <option>Juan</option>
                  <option>Francisco</option>
                  <option>Alicia</option>
                  <option>Tania</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col col-md-6 form-group">
                <label for="exampleSelect1">Estado procesal</label>
                <select class="form-control" id="exampleSelect1">
                  <option>Investigacion</option>
                  <option>Integracion</option>
                  <option>Periodo aprobatorio</option>
                  <option>informe de ley</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col col-md-12 form-group">
                <label for="exampleTextarea">Asunto</label>
                <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
              </div>
            </div>

            <div class="row">
              <div class="col col-md-12 form-group">
                <label for="exampleTextarea">Presunto derecho violado</label>
                <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col col-md-12 form-group">
                <div class="pull-right">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <button type="submit" class="btn btn-danger">Cancelar</button>
                </div>
              </div>
            </div>

          </form>
        </div>
</div>
@endsection
