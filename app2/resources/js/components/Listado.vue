<template>
    <div id="app" class="container mt-4">
        <h1>Listado de clientes</h1>

        <div v-for="usuario in listado" :key="usuario.id_usuario" class="usuario-card">
            <div v-if="usuario.clientes">
                <p><strong>Nombre:</strong> {{ usuario.clientes.nombre }}</p>
                <p><strong>Ubicación:</strong> {{ usuario.clientes.ubicacion }}</p>
                <p><strong>Descripción:</strong> {{ usuario.clientes.descripcion || 'Sin descripción' }}</p>
                <p><strong>Teléfono:</strong> {{ usuario.clientes.telefono || 'No disponible' }}</p>
                <div v-if="usuario.clientes.foto_perfil">
                    <img :src="usuario.clientes.foto_perfil" alt="Foto de perfil" class="foto-perfil">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            listado: [],
        };
    },
    mounted() {
        this.fetchListado();
    },
    methods: {
        fetchListado() {
            const url = "/melodia-conectada/app2/public/api/usuario";
            axios.get(url)
                .then(response => {
                    this.listado = response.data;
                })
                .catch(error => {
                    console.error("Error obteniendo el listado:", error);
                });
        }
    }
}
</script>

<style>
.usuario-card {
    background: #f9f9f9;
    padding: 15px;
    margin-bottom: 10px;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.foto-perfil {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    margin-top: 10px;
}
</style>
