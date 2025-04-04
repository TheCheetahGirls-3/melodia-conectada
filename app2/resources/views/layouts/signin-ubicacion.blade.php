@extends('layouts.principal')

@section('title')
    Inicio
@endsection

@section('content')
    <div style="display: flex; flex-direction: column; align-items: center; padding-top: 60px; height: 100%;">
        <h4 class="text-center mt-4">Pincha en el mapa para indicar tu ubicación</h4>
        <div class="mapa-container" style="width: 80%; min-height: 450px; position: relative; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
            <Mapa :usuario="{{ json_encode(Auth::user()) }}"></Mapa>
        </div>
        <div class="boton-container" style="text-align: center; margin-top: 20px; position: relative; z-index: 10;">
            {{-- <a href="{{ url('/index') }}"> --}}
                <button onclick="guardarCliente()" class="btn btn-primary">Siguiente</button>
            {{-- </a> --}}
        </div>

    </div>
@endsection


<script>
    function guardarCliente() {
        // Obtener la latitud y longitud seleccionada por el usuario (suponiendo que tienes estos datos en tu mapa)
        const latLng = { lat: 41.3847, lng: 2.1769 };  // Reemplazar con los valores reales del mapa
        const usuario = @json(Auth::user());
        // Validación simple
        if (latLng) {
            axios.get('http://localhost:8080/melodia-conectada/app2/public/ultimo-usuario')  // Llama a la ruta del último usuario
            .then(response => {
                // Guardar el ID del último usuario
                const ultimoUsuarioId = response.data.id_usuario; // Suponiendo que el usuario tiene un campo `id_usuario`

                console.log("Último usuario ID:", ultimoUsuarioId);  // Ver en consola

                // Luego de obtener el último usuario, hacemos el POST para guardar el nuevo cliente
                axios.post('http://localhost:8080/melodia-conectada/app2/public/api/cliente', {
                    id_usuario: ultimoUsuarioId,  // ID del usuario actual
                    ultimo_usuario_id: ultimoUsuarioId,  // Agregar el ID del último usuario
                    ubicacion: `${latLng.lat}, ${latLng.lng}`,
                    nombre: "Nombre del Cliente",
                    telefono: "123456789",
                    descripcion: "Descripción del cliente",
                    foto_perfil: "url-imagen.jpg",
                })
                .then(response => {
                    alert('Cliente registrado exitosamente!');
                    window.location.href = 'http://localhost:8080/melodia-conectada/app2/public/index';
                })
                .catch(error => {
                    console.error("Error al registrar el cliente:", error);
                });
            })
            .catch(error => {
                console.error("Error al obtener el último usuario:", error);
            });
    } else {
        alert("Por favor, selecciona una ubicación en el mapa.");
    }
    }
</script>

