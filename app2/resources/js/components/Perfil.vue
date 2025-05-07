<template>
    <div v-if="usuario && usuario.id_usuario">
        <banner-perfil :usuario="usuario" :es-usuario-autenticado="esUsuarioAutenticado"
            :usuario-autenticado-id="usuarioAutenticadoId" />

        <music-player v-if="usuario.id_tipo_usuario === 2" :multimedias="usuario.clientes.multimedias"
            :es-usuario-autenticado="esUsuarioAutenticado" :usuario="usuario.id_usuario" />

        <eventos v-if="usuario && usuario.clientes && usuario.clientes.locales && usuario.id_tipo_usuario === 3"
            :usuario="usuario" :eventos="usuario.clientes.locales.eventos"
            :usuario-autenticado-id="usuarioAutenticadoId" :es-usuario-autenticado="esUsuarioAutenticado" />

        <galeria-multimedia :multimedias="usuario.clientes.multimedias" :es-usuario-autenticado="esUsuarioAutenticado"
            :usuario-autenticado-id="usuarioAutenticadoId" />

        <estadisticas :usuario="usuario" :usuario-autenticado-id="usuarioAutenticadoId" />
    </div>
</template>

<script>
export default {
    props: ['id', 'usuarioAutenticadoId'],
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
            return this.usuario?.id_usuario === this.usuarioAutenticadoId;
        }
    },
    methods: {
        async obtenerDatosPerfil() {
            try {
                const response = await axios.get(`/perfil/${this.id}`);
                console.log('Datos del usuario desde API:', response.data);
                this.usuario = response.data;
            } catch (error) {
                console.error("Error cargando perfil", error);
            }
        }
    }
};
</script>
