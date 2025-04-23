<template>
    <div>
        <div v-if="usuario" class="banner">
            <img class="bannerPic" :src="'/melodia-conectada/app2/public/images/bannerMusico.png'" alt="foto del banner">
            <div class="bannerContent">
                <div class="profilePicDivBg m-5 rounded-circle">
                    <div class="profilePicDiv rounded-circle">
                        <img class="profilePic" :src="'/melodia-conectada/app2/public/images/imagenes_perfil/' + usuario.clientes.foto_perfil" alt="foto de perfil">
                    </div>
                </div>
                <div class="bannerText ms-2">
                    <h1>{{ usuario.clientes.nombre }}</h1>
                    <h4 class="mb-0">
                        {{ usuario.clientes.musicos?.instrumentos?.map(i => i.nombre).join(', ') || usuario.clientes.locales?.tipo_local?.nombre }}
                    </h4>
                    <h4 v-if="usuario.id_tipo_usuario === 3">{{ usuario.clientes.ubicacion }}</h4>
                </div>
                <div class="bannerEnviarMensaje">
                    <!-- Botón "Enviar mensaje" -->
                    <button
                        v-if="!esUsuarioAutenticado" @click="enviarMensaje"
                        id="mensaje-btn"
                        class="btn btn-secondary rounded-pill px-4"
                    >
                        Enviar mensaje
                    </button>
                </div>
            </div>

            <!-- Botón de edición visible solo para el usuario autenticado -->
            <button
                v-if="esUsuarioAutenticado"
                @click="editarPerfil"
                class="btn btn-primary edit-btn"
            >
                Editar perfil
            </button>
        </div>

        <p class="mt-4 mb-4">{{ usuario.clientes.descripcion }}</p>
        <div class="tagRow" v-if="usuario.clientes.musicos?.instrumentos?.length || usuario.clientes.locales?.tipo_local?.nombre || usuario.clientes.musicos?.generos?.length || (usuario.clientes.locales && usuario.clientes.locales.es_accesible !== null)">
            <div
                class="badge text-bg-danger rounded-pill p-2 px-3 mx-1"
                v-if="usuario.clientes.musicos?.instrumentos?.length"
            >
                {{ usuario.clientes.musicos.instrumentos.map(i => i.nombre).join(', ') }}
            </div>
            <div
                class="badge text-bg-danger rounded-pill p-2 px-3 mx-1"
                v-if="usuario.clientes.locales?.tipo_local?.nombre"
            >
                {{ usuario.clientes.locales.tipo_local.nombre }}
            </div>
            <div
                class="badge text-bg-danger rounded-pill p-2 px-3 mx-1"
                v-if="usuario.clientes.musicos?.generos?.length"
            >
                {{ usuario.clientes.musicos.generos.map(g => g.nombre).join(', ') }}
            </div>

            <div
                class="badge text-bg-danger rounded-pill p-2 px-3 mx-1"
                v-if="usuario.clientes.locales && usuario.clientes.locales.es_accesible !== null"
            >
                {{ usuario.clientes.locales.es_accesible === 1 ? 'Accesible' : 'No accesible' }}
            </div>
        </div>

        <h5 class="mt-5 redText">Teléfono</h5>
        <h6>{{ usuario.clientes.telefono }}</h6>
    </div>
</template>

<script>
export default {
    props: {
        usuario: {
            type: Object,
            required: true
        },
        esUsuarioAutenticado: {
            type: Boolean,
            required: true
        },
        usuarioAutenticadoId: {
            type: Number,
            required: true
        }
    },
    mounted() {
        console.log('Prop usuario:', this.usuario);
        console.log('Prop esUsuarioAutenticado:', this.esUsuarioAutenticado);
        console.log('Prop usuarioAutenticadoId:', this.usuarioAutenticadoId);
    },
    methods: {
        editarPerfil() {
            window.location.href = `/melodia-conectada/app2/public/editar-perfil/${this.usuario.id_usuario}`;
        },
        enviarMensaje() {
            const mensaje =
                this.usuario.id_tipo_usuario === 3
                    ? "Me gustaría participar en tu evento publicado."
                    : "Me gustaría contratarte para algún evento futuro.";

            const tipoUsuario = this.usuario.id_tipo_usuario === 2 ? 3 : 2;

            const insertMensaje = {
                contenido: mensaje,
                id_usuario_musico: tipoUsuario === 2 ? this.usuarioAutenticadoId : this.usuario.id_usuario,
                id_usuario_local: tipoUsuario === 3 ? this.usuarioAutenticadoId : this.usuario.id_usuario,
                id_emisor: this.usuarioAutenticadoId,
                id_receptor: this.usuario.id_usuario,
                es_leido: 0,
                tipo_usuario: tipoUsuario,
            };

            axios.post(`/mensajes`, insertMensaje)
                .then((response) => {
                    console.log('Mensaje enviado:', response.data);
                    window.location.href = '/melodia-conectada/app2/public/chat';
                })
                .catch((error) => {
                    console.error("Error al enviar el mensaje:", error);
                });
        }
    }
};
</script>

<style scoped>
.edit-btn {
    position: absolute;
    top: 20px;
    right: 20px;
}
</style>
