@extends('layouts.main_layout')

@section('title', 'Página principal')

@section('content')
<div class="row row-md mb-2">
    <div class="col-md-12">
        <p>Página recursos humanos.</p>
    </div>
</div>
<div class="row row-md mb-2">
    <!-- Content -->
    <div class="content-area py-1">
      <div class="container-fluid">
        <h4>Formulario recursos humanos</h4>
        <!--<ol class="breadcrumb no-bg mb-1">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Forms</a></li>
          <li class="breadcrumb-item active">Basic Form Elements</li>
        </ol>-->
        <div class="box box-block bg-white">
          <h5>Registro</h5>
          <form>
            <div class="form-group">
              <label for="exampleTextarea">Queja</label>
              <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
            </div>
            <div class="form-group row">
              <label for="example-date-input" class="col-xs-2 col-form-label">Fecha de recepcion</label>
              <div class="col-xs-10">
                <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleSelect1">Abogado</label>
              <select class="form-control" id="exampleSelect1">
                <option>Juan</option>
                <option>Francisco</option>
                <option>Alicia</option>
                <option>Tania</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleSelect1">Estado procesal</label>
              <select class="form-control" id="exampleSelect1">
                <option>Investigacion</option>
                <option>Integracion</option>
                <option>Periodo aprobatorio</option>
                <option>informe de ley</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleTextarea">Asunto</label>
              <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleTextarea">Presunto derecho violado</label>
              <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
            </div>
            <!--<div class="form-group">
              <label for="exampleSelect2">Example multiple select</label>
              <select multiple class="form-control" id="exampleSelect2">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleTextarea">Example textarea</label>
              <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
              <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
            </div>
            <fieldset class="form-group">
              <div class="radio">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                  Option one is this and that&mdash;be sure to include why it's great
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                  Option two can be something else and selecting it will deselect option one
                </label>
              </div>
              <div class="radio disabled">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" disabled>
                  Option three is disabled
                </label>
              </div>
            </fieldset>
            <div class="checkbox">
              <label>
                <input type="checkbox"> Check me out
              </label>
            </div>-->
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="submit" class="btn btn-primary">Cancelar</button>
          </form>
        </div>
</div>
@endsection
