@extends('layouts.navbar')

@section('contenido')
<div class="container mt-5 pt-5">
    <h2>Editar perfil</h2>
    @if(isset($usuario))
        <form id="editar-perfil-form" method="POST">
            @csrf
            <input type="hidden" name="id_usuario" value="{{ $usuario->id_usuario }}">

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $usuario->clientes->nombre }}">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion">{{ $usuario->clientes->descripcion }}</textarea>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $usuario->clientes->telefono }}">
            </div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    @else
        <p>No se encontró información del usuario.</p>
    @endif
</div>

<script>
document.getElementById('editar-perfil-form').addEventListener('submit', async function (event) {
    event.preventDefault();

    const formData = new FormData(this);

    try {
        const response = await fetch('/actualizar-perfil', {
            method: 'POST',
            body: formData,
        });

        const result = await response.json();

        if (response.ok) {
            alert(result.message);
            window.location.href = `/perfil/${result.usuario.id_usuario}`;
        } else {
            alert('Error al actualizar el perfil.');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Ocurrió un error al procesar la solicitud.');
    }
});
</script>
@endsection
