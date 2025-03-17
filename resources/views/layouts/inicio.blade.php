@extends('layouts.navbar')

@section('title')
    Inicio
@endsection

@section('content')
    <div class="row buscador">
        <div class="col-12 col-md-4 columna1">Div 1 (1/3)</div>
        <div class="col-12 col-md-8 columna2">Div 2 (2/3)</div>
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
