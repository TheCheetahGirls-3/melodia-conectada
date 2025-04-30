@extends('layouts.navbar')

@section('title')
    Perfil de Usuario
@endsection

@section('contenido')
<div class="container">
    <!-- Pasar el ID del usuario visitado -->
    <perfil :id="{{ $id }}" :usuario-autenticado-id="{{ Auth::id() }}"></perfil>

    {{-- Parte de los eventos --}}
    {{-- <h5 class="mt-5 redText">Eventos</h5>
    <div class="eventosDiv">
        <div class="eventoDiv mb-4 col-12">
            <div class="eventTitleDiv col-6">
                <p class="eventTitle">Fiesta de cumpleaños</p>
            </div>
            <div class="eventDescriptionDiv col-6">
                <p class="eventDescription"><span>Lunes 15 de Marzo de 12h a 18h</span></p>
            </div>
        </div>

        <div class="eventoDiv mb-4 col-12">
            <div class="eventTitleDiv col-6">
                <p class="eventTitle">Fiesta de cumpleaños</p>
            </div>
            <div class="eventDescriptionDiv col-6">
                <p class="eventDescription"><span>Lunes 15 de Marzo de 12h a 18h</span></p>
            </div>
        </div>
    </div> --}}

</div>


<h5 class="mt-5 redText">Estadísticas</h5>
<div class="estadisticasDiv">
    <div class="estadistica">Estadística 1</div>
    <div class="estadistica">Estadística 2</div>
</div>
@endsection
