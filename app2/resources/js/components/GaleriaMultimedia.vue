<template>
    <div>
        <h5 class="mt-5 redText">Galería</h5>

        <div v-if="imagenesYVideos.length > 0" id="mz-gallery-container">
            <div id="mz-gallery">
                <figure v-for="(media, index) in imagenesYVideos" :key="index">
                    <img
                        v-if="media.id_tipo_multimedia === 1"
                        :src="media.ruta"
                        width="700"
                        height="700"
                        :alt="media.ruta"
                    />
                    <video
                        v-else-if="media.id_tipo_multimedia === 2"
                        :src="media.ruta"
                        width="700"
                        height="700"
                        controls
                    >
                        Tu navegador no soporta la reproducción de videos.
                    </video>
                </figure>
            </div>
        </div>

        <p v-else>No hay multimedia disponible.</p>

        <button v-if="esUsuarioAutenticado" @click="abrirSelectorArchivos" class="btn btn-primary mt-3">
            Añadir foto/video
        </button>

        <input
            type="file"
            ref="archivoInput"
            style="display: none;"
            @change="subirArchivo"
            accept="image/*, video/*"
        />
    </div>
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
        },
        usuario: {
            type: Number,
            required: true
        }
    },
    computed: {
        imagenesYVideos() {

            return this.multimedias.filter(media => [1, 2].includes(media.id_tipo_multimedia));
        }
    },
    methods: {
        abrirSelectorArchivos() {

            this.$refs.archivoInput.click();
        },
        async subirArchivo(event) {
            const archivo = event.target.files[0];
            console.log("Archivo seleccionado:", archivo);

            if (!archivo) {
                console.error("No se seleccionó ningún archivo.");
                return;
            }

            const formData = new FormData();
            formData.append('archivo', archivo);
            formData.append('id_usuario', this.usuario);

            try {
                console.log("Enviando archivo al servidor...");

                const response = await axios.post('/multimedia', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                });

                console.log("Archivo subido correctamente:", response.data);

                this.$emit('archivo-subido', response.data);
            } catch (error) {
                console.error("Error subiendo archivo:", error);
            }
        }
    }
};
</script>

<style>

    #mz-gallery-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100%;
    }

    #mz-gallery {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-start;
    width: calc(100% - 70px);
    height: calc(100% - 50px);
    height: 30rem;
    width: 100%;
    background-color: white;
    outline-offset: 20px;
    overflow-x: auto;
    overflow-y: hidden;
    scroll-snap-type: x mandatory;
    scroll-padding: 0 0 0 55px;
    scroll-behavior: smooth;
    /* firefox scrollbar */
    scrollbar-color: #c2c2c2 var(--gray);
    scrollbar-width: auto;

    }

    @keyframes background {
    0% {
        background-position: -300% 100%;
    }
    100% {
        background-position: 100% -300%;
    }
    }

    #mz-gallery::-webkit-scrollbar {
    height: 25px;
    }

    #mz-gallery::-webkit-scrollbar-track {
    background: transparent;
    }

    #mz-gallery::-webkit-scrollbar-thumb {
    background: #666;
    }

    #mz-gallery::-webkit-scrollbar-thumb:hover {
    background: #555;
    }

    #mz-gallery::-webkit-scrollbar-thumb:active {
    background: #444;
    }

    #mz-gallery::-webkit-scrollbar-button:single-button:horizontal:decrement {
    height: 25px;
    width: 80px;
    background-color: lawngreen;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-box-arrow-left' viewBox='0 0 16 16'%3E%3Cpath fill-rule='evenodd' d='M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z'/%3E%3Cpath fill-rule='evenodd' d='M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z'/%3E%3C/svg%3E");
    background-size: 20px;
    background-position: center;
    background-repeat: no-repeat;
    }

    #mz-gallery::-webkit-scrollbar-button:single-button:horizontal:increment {
    height: 25px;
    width: 80px;
    background-color: lawngreen;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-box-arrow-right' viewBox='0 0 16 16'%3E%3Cpath fill-rule='evenodd' d='M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z'/%3E%3Cpath fill-rule='evenodd' d='M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z'/%3E%3C/svg%3E");
    background-size: 20px;
    background-position: center;
    background-repeat: no-repeat;
    }

    #mz-gallery::-webkit-scrollbar-button:single-button:horizontal:decrement:hover,
    #mz-gallery::-webkit-scrollbar-button:single-button:horizontal:increment:hover {
    background-color: #59b500;
    }

    #mz-gallery::-webkit-scrollbar-button:single-button:horizontal:decrement:active,
    #mz-gallery::-webkit-scrollbar-button:single-button:horizontal:increment:active {
    background-color: #3d7d00;
    }

    #mz-gallery figure {
    position: relative;
    margin: unset;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 80%;
    width: auto;
    min-height: 100px;
    margin-right: 60px;
    scroll-snap-align: start;
    transition: all 0.3s ease-in-out;
    }

    #mz-gallery figure:nth-child(1) {
    margin-left: 60px;
    }

    #mz-gallery figure div {
    position: absolute;
    width: 1%;
    height: 1%;
    background: transparent;
    opacity: 0;
    transition: all 0.3s ease-in-out;
    }

    #mz-gallery figure img, #mz-gallery figure video {
    height: 100%;
    width: auto;
    box-shadow: 10px 5px 5px var(--gray);
    border-radius: 5px;
    opacity: 0.9;
    filter: brightness(1);
    outline: 1px solid transparent;
    outline-offset: -40px;
    transition: all 0.3s ease-in-out;
    }

    #mz-gallery figure:hover img, #mz-gallery figure:hover video {
    height: calc(100% - 40px);
    transition: all 0.3s ease-in-out;
    cursor: pointer;
    }

    #mz-gallery figure:hover {
    padding: 0px 20px;
    }

    #mz-gallery figure:hover div {
    width: 25%;
    height: 25%;
    opacity: 1;
    transition: all 0.3s ease-in-out;
    }

    @media (max-width: 1145px) {
        #mz-gallery figure {
            scroll-snap-align: center;
        }
        #mz-gallery {
            scroll-padding: 0px 0px 0px 0px !important;
        }
    }

    @media (max-width: 610px) {
        #mz-gallery {
            max-height: 320px;
        }
        #mz-gallery figure {
            margin-right: 20px;
        }
        #mz-gallery figure:nth-child(1) {
            margin-left: 20px;
        }
    }

    @media (max-height: 340px) {
        #mz-gallery {
            background-size: 30px 30px;
            scroll-padding: 0 0 0 28px;
        }
        #mz-gallery figure {
            margin-right: 30px;
        }
        #mz-gallery figure:nth-child(1) {
            margin-left: 30px;
        }
    }

    @media (max-height: 280px) {
        #mz-gallery::-webkit-scrollbar {
            height: 20px;
        }
        #mz-gallery::-webkit-scrollbar-button:single-button:horizontal:decrement,
        #mz-gallery::-webkit-scrollbar-button:single-button:horizontal:increment {
            width: 80px;
            height: 20px;
            background-size: 15px;
        }
    }

    @media (max-height: 230px) {
        #mz-gallery figure:hover img, #mz-gallery figure:hover video {
            outline-offset: 10px;
        }
    }

    @media (max-height: 165px) {
        #mz-gallery {
            scroll-padding: 0 0 0 18px;
            margin: 0px;
        }
        #mz-gallery figure {
            margin-right: 20px;
        }
        #mz-gallery figure:nth-child(1) {
            margin-left: 20px;
        }
    }

    /* touch screen devices */

    @media (pointer: coarse) {
        #mz-gallery * {
            pointer-events: none;
        }
        #mz-gallery::-webkit-scrollbar {
            height: 35px;
        }
        #mz-gallery {
            scroll-snap-type: unset;
            scroll-padding: unset;
            scroll-behavior: unset;
        }
        #mz-gallery figure {
            scroll-snap-align: unset;
        }
    }

</style>
