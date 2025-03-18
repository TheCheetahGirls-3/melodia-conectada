@extends('layouts.navbar')

@section('title')
    Inicio
@endsection

@section('content')
    <button id="movilBoton">O</button>
    <div class="row buscador">
        <div class="col-12 col-md-4 row-sm-0 columna1 listado">Div 1 (1/3)</div>
        <div class="col-12 col-md-8 row-sm-1 columna2 mapa">Div 2 (2/3)</div>
    </div>

@endsection


<style>

.columna1 {
    background-color: red;
}

.columna2 {
    background-color: blue;
}
</style>

@section('script')
    /resources/js/scriptInicio.js
@endsection

