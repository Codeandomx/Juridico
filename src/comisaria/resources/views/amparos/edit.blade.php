@extends('layouts.main_layout')

@section('title', 'Editar Reporte de amparos')

@section('metas')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')

<div class="row row-md mb-2">
    <!-- Content -->
    <div class="content-area py-1">
      <div class="container-fluid">
        <h4>Formulario amparos</h4>
        <div class="box box-block bg-white">
          <form id="formGuardar" method="PUT" action="/amparos-form">

            <input type="hiden" name="id" id="id" value="{{$info->id}}">
            <input type="hidden" name="abo" id="abo" value="{{$info->abogado}}">
            <input type="hidden" name="fecha1" id="fecha1" value="{{$info->fecha_ingreso}}">
            <input type="hidden" name="fecha2" id="fecha2" value="{{$info->fecha_ejecutoria}}">

            <div class="row">
              <div class="col col-md-6 form-group">
                <label for="fecha_recepcion">Fecha de recepción</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="fecha_recepcion" name="fecha_recepcion" placeholder="dd/mm/yyyy" name="fecha_recepcion">
                  <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                </div>
              </div>
              <div class="col col-md-6 form-group">
                <label for="exampleSelect1">Abogado</label>
                <select class="form-control" id="abogado" name="abogado">
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col col-md-6 form-group">
                <label for="quejoso">Quejoso</label>
                <textarea class="form-control" id="quejoso" name="quejoso" rows="1">{{ $info->quejoso }}</textarea>
              </div>
              <div class="col col-md-6 form-group">
                <label for="juzgado_expediente">Juzgado y expediente</label>
                <textarea class="form-control" id="juzgado_expediente" name="juzgado_expediente" rows="1">{{ $info->juzgado_y_expediente }}</textarea>
              </div>
            </div>

            <div class="row">
              <div class="col col-md-6 form-group">
                <label for="acto_reclamo">Acto reclamo</label>
                <textarea class="form-control" id="acto_reclamo" name="acto_reclamo" rows="1">{{ $info->acto_reclamo }}</textarea>
              </div>
              <div class="col col-md-6 form-group">
                <label for="suspension">Suspensión</label>
                <select class="form-control" id="suspension" name="suspension">
                  @foreach($cat['suspensiones'] as $c)
                  <option value="{{$c->id}}" @if($info->suspension == $c->id) selected @endif>{{$c->nombre}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col col-md-6 form-group">
                <label for="recurso_diverso">Recurso diverso</label>
                <textarea class="form-control" id="recurso_diverso" name="recurso_diverso" rows="1">{{ $info->recurso_diverso }}</textarea>
              </div>
              <div class="col col-md-6 form-group">
                <label for="activo_pasivo">Activo o pasivo</label>
                <select class="form-control" id="activo_pasivo" name="activo_pasivo">
                  @foreach($cat['activos'] as $c)
                  <option value="{{$c->id}}" @if($info->suspension == $c->id) selected @endif>{{$c->nombre}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col col-md-6 form-group">
                <label for="sentencia">Sentencia</label>
                <textarea class="form-control" id="sentencia" name="sentencia" rows="1">{{ $info->sentencia }}</textarea>
              </div>
              <div class="col col-md-6 form-group">
                <label for="fecha_ejecutoria">Ejecutoria</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="fecha_ejecutoria" name="fecha_ejecutoria" placeholder="dd/mm/yyyy" name="fecha_recepcion">
                  <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col col-md-6 form-group">
                <label for="recurso_revision">Recurso de revisión</label>
                <textarea class="form-control" id="recurso_revision" name="recurso_revision" rows="1">{{ $info->recurso_revision }}</textarea>
              </div>
              <div class="col col-md-6 form-group">
                <label for="requerimientos">Requerimientos (Conteo)</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="requerimientos" name="requerimientos" placeholder="" name="requerimientos" value="{{$info->requerimientos}}">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col col-md-6 form-group">
                <label for="semaforo">Semaforo</label>
                <select class="form-control" id="semaforo" name="semaforo">
                  @foreach($cat['semaforos'] as $c)
                  <option value="{{$c->id}}" @if($info->suspension == $c->id) selected @endif>{{$c->nombre}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col col-md-6 form-group">
                <label for="indice_ejecucion">Indice de ejecucion</label>
                <select class="form-control" id="indice_ejecucion" name="indice_ejecucion">
                  @foreach($cat['incidentes'] as $c)
                  <option value="{{$c->id}}" @if($info->suspension == $c->id) selected @endif>{{$c->nombre}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col col-md-6 form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                  @foreach($cat['estados'] as $c)
                  <option value="{{$c->id}}" @if($info->suspension == $c->id) selected @endif>{{$c->nombre}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col col-md-6 form-group">
                <label for="estado_procesal_actual">Estado procesal actual</label>
                <select class="form-control" id="estado_procesal_actual" name="estado_procesal_actual">
                  @foreach($cat['procesal'] as $c)
                  <option value="{{$c->id}}" @if($info->suspension == $c->id) selected @endif>{{$c->nombre}}</option>
                  @endforeach
                </select>
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
<script type="text/javascript" src="/_vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.es.min.js"></script>
<script type="text/javascript" src="/js/moment.min.js"></script>
<script type="text/javascript" src="/js/site/editAmparosSite.js"></script>
@endsection
