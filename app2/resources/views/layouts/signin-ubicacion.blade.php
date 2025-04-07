@extends('layouts.principal')

@section('title')
    Inicio
@endsection

@section('content')
    <map-reg-cl :usuario-id = '{{Auth::user()->id_usuario}}' :usuario="{{ json_encode(Auth::user()) }}"></map-reg-cl>
@endsection
