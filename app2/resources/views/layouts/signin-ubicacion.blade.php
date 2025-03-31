@extends('layouts.principal')

@section('title')
    Inicio
@endsection

@section('content')
    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding-top: 60px;">
        <input type="text" style="width: 40%; box-shadow: 0 4px 8px rgba(127, 113, 113, 0.2); border-radius: 20px;">
        <h4 class="text-center mt-4">Pincha en el mapa para indicar tu ubicación</h4>
        <div class="mapa-container" style="width: 80%; height: 350px; position: relative; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
            <Mapa></Mapa>
        </div>
        <div class="boton-container" style="text-align: center; margin-top: 20px; position: relative; z-index: 10;">
            <a href="{{ url('/index') }}"><button class="btn btn-primary">Siguiente</button></a>
        </div>

    </div>
@endsection




