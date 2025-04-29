<template>
    <div v-if="usuario">
        <h5 class="mt-5 redText">Eventos</h5>

        <div class="eventosDiv">

            <div v-if="eventos.length > 0">
                <div v-for="(evento, index) in eventos" :key="index" class="eventoDiv mb-4 col-12">
                    <div class="eventTitleDiv col-6">
                        <p class="eventTitle">{{ evento.nombre }}</p>
                    </div>
                    <div class="eventDescriptionDiv col-6">
                        <p class="eventDescription">
                            <span>{{evento.fecha_inicio}}</span>
                            <span>{{evento.fecha_fin}}</span>
                        </p>
                    </div>
                </div>
            </div>

            <div v-else>
                <p>No hay eventos disponibles.</p>
            </div>

        </div>

        <button v-if="esUsuarioAutenticado" @click="abrirFormularioEvento" class="btn btn-primary mt-3">
            Añadir evento
        </button>

    </div>
</template>

<script>
export default {
    props: {
        usuario: {
            type: Object,
            required: true
        },
        eventos: {
            type: Array,
            required: true
        },
        usuarioAutenticadoId: {
            type: Number,
            required: true
        },
        esUsuarioAutenticado: {
            type: Boolean,
            required: true
        }

    },
    mounted() {
        console.log("usuarioAutenticadoId:", this.usuarioAutenticadoId);
    },
    methods: {
        abrirFormularioEvento() {
            console.log("usuarioAutenticadoId:", this.usuarioAutenticadoId);
            console.log("Tipo de dato:", typeof this.usuarioAutenticadoId);

            if (!this.usuarioAutenticadoId) {
                alert('Error: No se pudo obtener la información del usuario.');
                return;
            }

            window.location.href = `/melodia-conectada/app2/public/evento/${this.usuario.id_usuario}`;
        }
    }
};
</script>
