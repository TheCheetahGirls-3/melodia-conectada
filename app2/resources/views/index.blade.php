@extends('layouts.inicio')

@section('listado')
    <div id="app">
        <listado :usuario="{{ json_encode(Auth::user()) }}"></listado>
    </div>
@endsection

@section('mapa')
    <Mapa></Mapa>
@endsection


<style>
    h1 {
        padding-top: 300px;
        color: black;

    }
</style>
