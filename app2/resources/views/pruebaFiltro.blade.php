@extends('layouts.inicio')

@section('listado')

<div>
    <prueba-filtro :usuario="{{ json_encode(Auth::user()) }}"></prueba-filtro>

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
