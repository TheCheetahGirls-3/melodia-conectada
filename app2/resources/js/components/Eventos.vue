<template>
    <div>
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
        eventos: {
            type: Array,
            required: true
        },
        esUsuarioAutenticado: {
            type: Boolean,
            required: true
        }
    },

};
</script>
