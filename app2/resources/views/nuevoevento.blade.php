@extends('layouts.navbar')

@section('contenido')
<div class="container mt-5 pt-5">
    <h2>Añadir nuevo evento</h2>
    @if(isset($usuario))
        <form id="editar-perfil-form" method="POST" action="{{ url('/api/crear-evento') }}">
            @csrf
            <input type="hidden" name="id_usuario" value="{{ $usuario->id_usuario }}">

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del evento">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción del evento"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Crear evento</button>
        </form>
    @else
        <p>No se encontró información del usuario.</p>
    @endif
</div>

<script>

</script>
@endsection
