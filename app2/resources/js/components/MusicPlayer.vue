<template>
    <h5 class="mt-5 redText">Canciones</h5>
    <div class="musicDiv">
        <!-- Muestra solo canciones si hay audios disponibles -->
        <div v-if="audios.length > 0">
            <div v-for="(audio, index) in audios" :key="index" class="musicPlayer rounded-pill">
                <div class="songTitle">
                    <p>{{ audio.ruta }}</p>
                </div>
                <audio controls>
                    <source :src="'/melodia-conectada/app2/public/audio/' + audio.ruta" type="audio/mpeg">
                    Tu navegador no es compatible con el reproductor de música.
                </audio>
            </div>
        </div>
        <!-- Muestra mensaje si no hay audios disponibles -->
        <div v-else>
            <p>No hay canciones disponibles.</p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        multimedias: {
            type: Array,
            required: true
        }
    },
    computed: {
        // Filtra solo los audios (id_tipo_multimedia === 2)
        audios() {
            return this.multimedias.filter(media => media.id_tipo_multimedia === 2);
        }
    }
};
</script>