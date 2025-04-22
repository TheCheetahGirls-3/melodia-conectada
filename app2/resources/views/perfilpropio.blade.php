@extends('layouts.navbar')

@section('title')
    Mi Perfil
@endsection

@section('contenido')
<div class="container">
    <!-- Pasar el ID del usuario autenticado -->
    <perfil :id="{{ Auth::id() }}" :usuario-autenticado-id="{{ Auth::id() }}"></perfil>
</div>

<h5 class="mt-5 redText">Estadísticas</h5>
<div class="estadisticasDiv">
    <div class="estadistica">Estadística 1</div>
    <div class="estadistica">Estadística 2</div>
</div>
@endsection
