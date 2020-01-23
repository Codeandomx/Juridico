@extends('layouts.main_layout')

@section('title', 'Penal & Siniestros')

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
                    <li class="breadcrumb-item active"><a href="#">Registros</a></li>
                </ul>
            </nav>

            <br>
            <h3>Reporte de registro</h3>
            
            <br>
            <br>
            <div class="btn-group">
                <a href="{{ route('PSRV') }}" class="btn btn-success">Visitaduria</a>
                <a href="{{ route('PSRAV') }}" class="btn btn-danger">Agencias Varias</a>
                <a href="{{ route('PSRA') }}" class="btn btn-info">Anticorrupción</a>
            </div>
        </div>
    </div>
</div>
@endsection
