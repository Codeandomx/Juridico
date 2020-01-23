@extends('layouts.main_layout')

@section('title', 'Penal & Siniestros - Archivo')

@section('styles')
<style>
    .btn-group a{
        font-size: 1.5em;
        margin-right: 20px;
        width: 200px !important;
    }
</style>
@endsection

@section('content')
<div class="row row-md mb-2">
    <div class="col-md-12">
        <div class="box box-block bg-white">
            
            <nav>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Penal y Siniestros</a></li>
                    <li class="breadcrumb-item active"><a href="#">Archivo</a></li>
                </ul>
            </nav>

            <br>
            <h3>Archivo de registros</h3>
            
            <br>
            <br>
            <div class="btn-group">
                <a href="{{ route('PSAV') }}" class="btn btn-success">Visitaduria</a>
                <a href="{{ route('PSAAV') }}" class="btn btn-danger">Agencias Varias</a>
                <a href="{{ route('PSAA') }}" class="btn btn-info">Anticorrupción</a>
            </div>
        </div>
    </div>
</div>
@endsection