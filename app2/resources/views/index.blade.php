@extends('layouts.inicio')

@section('listado')
    <div>
        <listado :usuario="{{ json_encode(Auth::user()) }}"></listado>
    </div>
@endsection

@section('mapa')
    <map-index :usuario-id = '{{Auth::user()->id_usuario}}' :usuario="{{ json_encode(Auth::user()) }}"></map-index>
@endsection

