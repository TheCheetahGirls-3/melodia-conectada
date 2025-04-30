@extends('layouts.navbar')

@section('title')
    Perfil de Usuario
@endsection

@section('contenido')
<div class="container">

    <perfil :id="{{ $id }}" :usuario-autenticado-id="{{ Auth::id() }}"></perfil>

</div>


<h5 class="mt-5 redText">Estadísticas</h5>
<div class="estadisticasDiv">
    <div class="estadistica">Estadística 1</div>
    <div class="estadistica">Estadística 2</div>
</div>
@endsection
