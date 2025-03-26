@extends('layouts.navbar')

@section('title')
    Inicio
@endsection

@section('content')
    <button id="movilBoton">O</button>
    <div class="row buscador">
        <div id="listado" class="col-12 col-md-4 row-sm-1 columna1 contenido">@yield('listado')</div>
        <div id="mapa" class="col-12 col-md-8 row-sm-1 columna2 contenido activo">@yield('mapa')</div>
    </div>
@endsection


<style>

.columna1 {
    background-color: rgb(215, 240, 255);
}


</style>


{{-- @section('script')
    /resources/js/scriptInicio.js
@endsection --}}

