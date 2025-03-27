<template>
    <div id="app" class="container mt-4">
        <h1>Aquí debería salir debajo los filtros</h1>
        <div class="filtro">
            <prueba-filtro :listado="listado"></prueba-filtro>
        </div>
        <div v-for="cliente in resultado" :key="cliente.id_usuario" class="usuario-card">
                <p><strong>Nombre:</strong> {{ cliente.nombre }}</p>
                <p><strong>Ubicación:</strong> {{ cliente.ubicacion }}</p>
                <p><strong>Descripción:</strong> {{ cliente.descripcion || 'Sin descripción' }}</p>
                <p><strong>Teléfono:</strong> {{ cliente.telefono || 'No disponible' }}</p>
                <div v-if="cliente.foto_perfil">
                    <img :src="cliente.foto_perfil" alt="Foto de perfil" class="foto-perfil">
                </div>
        </div>
    </div>
</template>

<script>
import pruebaFiltro from "./Filtro.vue";

export default {
    components:{
        pruebaFiltro
    },
    props: {
        usuario: {
            type: Object
        }
    },
    data() {
        return {
            listado: [],
            resultado:[],
        };
    },
    mounted() {
        this.fetchListado();
    },
    methods: {
        fetchListado() {

            axios.get(url)
                .then(response => {
                    this.listado = response.data;
                    for(const cliente of this.listado){
                        if (cliente.usuario.id_tipo_usuario !== this.usuario.id_tipo_usuario){
                            this.resultado.push(cliente);
                        }
                    }
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
