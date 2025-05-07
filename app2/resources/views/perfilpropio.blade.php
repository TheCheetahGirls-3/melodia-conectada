@extends('layouts.navbar')

@section('title')
    Mi Perfil
@endsection

@section('contenido')
<div class="container">

    <perfil :id="{{ Auth::id() }}" :usuario-autenticado-id="{{ Auth::id() }}"></perfil>

</div>

@endsection
