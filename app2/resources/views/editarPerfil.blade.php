@extends('layouts.navbar')

@section('contenido')
<div class="container mt-5 pt-5">
    <h2>Editar perfil</h2>
    @if(isset($usuario))
        <form id="editar-perfil-form" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id_usuario" value="{{ $usuario->id_usuario }}">

            <div class="mb-3">
                <label for="foto_perfil" class="form-label">Foto de perfil</label>
                <input type="file" class="form-control" id="foto_perfil" name="foto_perfil">
            </div>

            <div class="mb-3">
                @if($usuario->id_tipo_usuario == 2)
                    <label for="nombre" class="form-label">Nombre completo</label>
                @endif
                @if($usuario->id_tipo_usuario == 3)
                    <label for="nombre" class="form-label">Nombre del establecimiento</label>
                @endif
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $usuario->clientes->nombre }}">
            </div>

            @if($usuario->id_tipo_usuario == 3)
                <div class="mb-3">
                    <label for="ubicacion" class="form-label">Ubicación</label>
                    <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="{{ $usuario->clientes->ubicacion }}">
                </div>
            @endif

            @if($usuario->id_tipo_usuario == 2)
                <div class="mb-3">
                    <label for="nombre_artistico" class="form-label">Nombre artístico</label>
                    <input type="text" class="form-control" id="nombre_artistico" name="nombre_artistico" value="{{ $usuario->clientes->musicos->nombre_artistico }}">
                </div>
            @endif

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion">{{ $usuario->clientes->descripcion }}</textarea>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $usuario->clientes->telefono }}">
            </div>

            @if($usuario->id_tipo_usuario == 2)
                <div class="mb-3">
                    <label for="id_instrumento" class="form-label">Instrumento</label>
                    <select class="form-select" id="id_instrumento" name="id_instrumento">
                        @foreach($instrumentos as $inst)
                            <option value="{{ $inst->id_instrumento }}"
                                {{ $usuario->clientes->musicos->instrumentos->pluck('id_instrumento')->contains($inst->id_instrumento) ? 'selected' : '' }}>
                                {{ $inst->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="id_genero" class="form-label">Género musical</label>
                    <select class="form-select" id="id_genero" name="id_genero">
                        @foreach($generos as $gen)
                            <option value="{{ $gen->id_genero }}"
                                {{ $usuario->clientes->musicos->generos->pluck('id_genero')->contains($gen->id_genero) ? 'selected' : '' }}>
                                {{ $gen->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

            @endif

            @if($usuario->id_tipo_usuario == 3)

                <div class="mb-3">
                    <label for="horario" class="form-label">Horario</label>
                    <input type="text" class="form-control" id="horario" name="horario" value="{{ $usuario->clientes->locales->horario }}">
                </div>

                <div class="mb-3">
                    <label for="id_tipo_local" class="form-label">Tipo de local</label>
                    <select class="form-select" id="id_tipo_local" name="id_tipo_local">
                        @foreach($tipos_local as $tipo)
                            <option value="{{ $tipo->id_tipo_local }}"
                                {{ ($usuario->clientes->locales->tipo_local->id_tipo_local ?? null) == $tipo->id_tipo_local ? 'selected' : '' }}>
                                {{ $tipo->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

            @endif

            <button type="submit" class="btn btn-primary">Guardar cambios</button>
            <a class="ms-4" href="{{ route('perfilpropio') }}">Salir sin guardar cambios</a>
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
        const response = await fetch('/api/actualizar-perfil', {
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
