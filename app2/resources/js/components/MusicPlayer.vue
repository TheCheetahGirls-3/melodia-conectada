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

    <!-- Botón para subir nuevos audios si el perfil pertenece al usuario autenticado -->
    <button v-if="esUsuarioAutenticado" @click="abrirSelectorArchivos" class="btn btn-primary mt-3">
        Subir audio
    </button>

    <!-- Input oculto para seleccionar archivos -->
    <input
        type="file"
        ref="archivoInput"
        style="display: none;"
        @change="subirArchivo"
        accept="audio/*"
    />
</template>

<script>
export default {
    props: {
        multimedias: {
            type: Array,
            required: true
        },
        esUsuarioAutenticado: {
            type: Boolean,
            required: true
        }
    },
    computed: {
        // Filtra solo los audios (id_tipo_multimedia === 2)
        audios() {
            return this.multimedias.filter(media => media.id_tipo_multimedia === 2);
        }
    },
    methods: {
        abrirSelectorArchivos() {
            // Abre el selector de archivos
            this.$refs.archivoInput.click();
        },
        async subirArchivo(event) {
            const archivo = event.target.files[0];
            if (!archivo) {
                console.error("No se seleccionó ningún archivo.");
                return;
            }

            const formData = new FormData();
            formData.append('archivo', archivo);

            try {
                // Envía el archivo al servidor
                const response = await axios.post('/api/multimedia', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                });

                console.log("Audio subido correctamente:", response.data);

                // Notifica al padre para actualizar los datos
                this.$emit('audio-subido', response.data);
            } catch (error) {
                console.error("Error subiendo audio:", error);
            }
        }
    }
};
</script>