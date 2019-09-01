@extends('layouts.main_layout')

@section('title', 'Página principal')

@section('styles')
<link rel="stylesheet" href="_vendor/jsgrid/dist/jsgrid.css" />
<link rel="stylesheet" href="_vendor/jsgrid/dist/jsgrid-theme.min.css" />
<style>
    #btnNuevo{
        margin-bottom: 10px;
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col col-md-12 form-group">
            <button type="submit" id="btn-nuevo" class="btn btn-primary">Nuevo</button>
    </div>
</div>
<div class="row row-md mb-2">
    <div class="col-md-12">
        <div class="box box-block bg-white">
            <h5 class="mb-1">Recursos humanos</h5>
            <div class="pull-right">
                <button id="btnNuevo" class="btn btn-primary">Nuevo</button>
            </div>
            <div id="jsGrid-basic"></div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="_vendor/jsgrid/dist/jsgrid.min.js"></script>
<script type="text/javascript" src="_vendor/jsgrid/demos/db.js"></script>
<script type="text/javascript" src="js/site/recursosHumanosSite.js"></script>
@endsection
