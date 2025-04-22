<template>
    <div v-if="usuario">
        <banner-perfil :usuario="usuario" 
            :es-usuario-autenticado="esUsuarioAutenticado"
        />

        <!-- Muestra el reproductor de música solo si el usuario es un músico -->
        <music-player v-if="usuario.id_tipo_usuario === 2" 
            :multimedias="usuario.clientes.multimedias" 
            :es-usuario-autenticado="esUsuarioAutenticado"
        />
        
        <!-- Muestra la galería de multimedia para todos los usuarios -->
        <galeria-multimedia 
            :multimedias="usuario.clientes.multimedias" 
            :es-usuario-autenticado="esUsuarioAutenticado"
        />
    </div>
</template>

<script>
export default {
    props: ['id', 'usuarioAutenticadoId'], // Recibir el ID del usuario autenticado
    data() {
        return {
            usuario: null
        };
    },
    mounted() {
        this.obtenerDatosPerfil();
    },
    computed: {
        esUsuarioAutenticado() {
            // Compara el ID del usuario del perfil con el ID del usuario autenticado
            return this.usuario?.id_usuario === this.usuarioAutenticadoId;
        }
    },
    methods: {
        async obtenerDatosPerfil() {
            try {
                const response = await axios.get(`/perfil/${this.id}`);
                this.usuario = response.data; // Asegúrate de que la respuesta tenga la estructura correcta
            } catch (error) {
                console.error("Error cargando perfil", error);
            }
        }
    }
};
</script>