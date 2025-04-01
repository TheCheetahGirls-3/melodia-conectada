@extends('layouts.inicio')

@section('listado')
    <div>
        <listado :usuario="{{ json_encode(Auth::user()) }}"></listado>
    </div>
@endsection

@section('mapa')
    <Mapa></Mapa>
@endsection

