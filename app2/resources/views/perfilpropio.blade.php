@extends('layouts.navbar')

@section('title')
    Mi Perfil
@endsection

@section('contenido')
<div class="container">
    <!-- Pasar el ID del usuario autenticado -->
    <perfil :id="{{ Auth::id() }}" :usuario-autenticado-id="{{ Auth::id() }}"></perfil>
</div>

@endsection
