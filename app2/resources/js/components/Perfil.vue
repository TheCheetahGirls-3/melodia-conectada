<template>
    <div v-if="usuario">
        <banner-perfil :usuario="usuario" />

        <!-- Muestra el reproductor de música solo si el usuario es un músico -->
        <music-player v-if="usuario.id_tipo_usuario === 2" :multimedias="usuario.clientes.multimedias" />
        
        <!-- Muestra la galería de multimedia para todos los usuarios -->
        <galeria-multimedia :multimedias="usuario.clientes.multimedias" />

    </div>
</template>

<script>
export default {
    props: ['id'],
    data() {
        return {
            usuario: null
        };
    },
    mounted() {
        this.obtenerDatosPerfil();
    },
    methods: {
        async obtenerDatosPerfil() {
            try {
                const response = await axios.get(`/perfil/${this.id}`);

                if (response.data) {
                    this.usuario = response.data;
                } else {
                    console.error("La respuesta de la API no contiene datos válidos.");
                }
            } catch (error) {
                console.error("Error cargando perfil", error);
            }
        }
    }
};
</script>