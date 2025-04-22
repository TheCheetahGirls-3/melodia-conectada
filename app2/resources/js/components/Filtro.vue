<template>
    <div class="container">
        <button class="filtro" @click="abrirModal">Filtro</button>

        <div v-if="tipus_user === 2">

            <div v-if="mostrarModal" class="modal-container">
                <div class="modal">
                    <button class="close-button" @click="cerrarModal">×</button>
                    <form class="MiForm">
                        <h5>Instrumentos</h5>
                        <select id="instrumento" v-model="selectedInstrumento">
                            <option v-for="instrumento in instrumentos" :key="instrumento.id_instrumento"
                                :value="instrumento.id_instrumento">
                                {{ instrumento.nombre }}
                            </option>
                        </select>
                        <h5>Géneros</h5>
                        <select id="genero" v-model="selectedGeneros">
                            <option v-for="genero in generos" :key="genero.id_genero" :value="genero.id_genero">
                                {{ genero.nombre }}
                            </option>
                        </select>
                        <button type="button" class="btn btn-secondary" @click="submitForm">Buscar</button>
                    </form>
                </div>
            </div>
        </div>

        <div v-if="tipus_user === 3">
            <div v-if="mostrarModal" class="modal-container">
                <div class="modal">
                    <button class="close-button" @click="cerrarModal">×</button>
                    <form class="MiForm">
                        <h5>Tipo Local</h5>
                        <select id="tipoLocal" v-model="selectedTipoLocal">
                            <option v-for="tipo_local in tipo_locales" :key="tipo_local.id_tipo_local"
                                :value="tipo_local.id_tipo_local">
                                {{ tipo_local.nombre }}
                            </option>
                        </select>
                        <h5>Es accesible</h5>
                        <div class="selector">
                            <label :class="{ active: selectedEsAccesible === '1' }"
                                @click="selectedEsAccesible = '1'">Sí</label>
                            <label :class="{ active: selectedEsAccesible === '0' }"
                                @click="selectedEsAccesible = '0'">No</label>
                        </div>

                        <button type="button" class="btn btn-secondary" @click="submitForm">Buscar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        resultado: {
            type: Array,
            required: true,
        },
        tipus_user: {
            type: Number,
            required: true,
        },
    },
    data() {
        return {
            mostrarModal: false,
            instrumentos: [],
            selectedInstrumento: "",
            generos: [],
            selectedGeneros: "",
            tipo_locales: [],
            selectedtipoLocal: "",
            selectedEsAccesible: "1",

        };
    },
    mounted() {
        this.fetchInstrumentos();
        this.fetchGeneros();
        this.fetchTipoLocales();
        this.fetchEsAccesible();
    },

    methods: {
        abrirModal() {
            this.selectedInstrumento = "";
            this.selectedGeneros = "";
            this.selectedTipoLocal = "";
            this.selectedEsAccesible = "1";
            this.mostrarModal = true;
        },
        cerrarModal() {
            this.mostrarModal = false;
        },
        fetchInstrumentos() {
            axios.get("instrumento")
                .then((response) => {
                    this.instrumentos = response.data;
                    console.log(this.instrumentos);
                })
                .catch((error) => {
                    console.error("Error al cargar los instrumentos", error);
                });
        },
        fetchGeneros() {
            axios.get("genero")
                .then((response) => {
                    this.generos = response.data;
                    console.log(this.generos);
                })
                .catch((error) => {
                    console.error("Error al cargar los generos", error);
                });
        },
        fetchTipoLocales() {
            axios.get("tipo_local")
                .then((response) => {
                    this.tipo_locales = response.data;
                    console.log(this.tipo_locales);
                })
                .catch((error) => {
                    console.error("Error al cargar los tipos de locales", error)
                })
        },
        fetchEsAccesible() {
            axios.get(`/api/locales?es_accesible=${this.selectedEsAccesible}`)
                .then((response) => {
                    this.locales = response.data;
                    console.log("Locales filtrados:", this.locales);
                })
                .catch((error) => {
                    console.error("Error al cargar los locales:", error);
                });
        },
        submitForm() {
            if (this.tipus_user === 2) {
                axios.get(`musico/filtrar/${this.selectedInstrumento}/${this.selectedGeneros}`)
                    .then((response) => {
                        if (response.data.length > 0) {
                            this.$emit('aplicar-filtros', response.data);
                        } else {
                            this.$emit('sin-resultados', 'músicos');
                        }
                    })
                    .catch((error) => {
                        console.error('Error al filtrar músicos:', error);
                    });
            }

            if (this.tipus_user === 3) {
                axios.get(`local/filtrar/${this.selectedTipoLocal}/${this.selectedEsAccesible}`)
                    .then((response) => {
                        if (response.data.length > 0) {
                            this.$emit('aplicar-filtros', response.data);
                        } else {
                            this.$emit('sin-resultados', 'locales');
                        }
                    })
                    .catch((error) => {
                        console.error('Error al filtrar locales:', error);
                    });
            }

            this.selectedInstrumento = "";
            this.selectedGeneros = "";
            this.selectedTipoLocal = "";
            this.selectedEsAccesible = "1";

            this.cerrarModal();
        }
    },
};
</script>

<style scoped>
.modal-container {
    position: fixed;
    top: 70px;
    left: 0;
    width: 35% !important;
    height: 100%;
    background: rgba(0, 0, 0, 0.3);
    display: flex;
    justify-content: start;
    align-items: start;
    padding-top: 50px;
    z-index: 1030;
}

.modal {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 30% !important;
    height: auto;
    z-index: 10000 !important;
    display: block !important;
    margin-left: 30px;
    top: 25%;
}

select {
    width: 100%;
    margin: 10px 0;
    padding: 5px;
}

button {
    cursor: pointer;
    margin-top: 10px;
}

.modal h5 {
    font-size: 18px;
    color: #406767;
    margin-top: 20px;
    margin-bottom: 8px;
}

select {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
    margin-bottom: 20px;
    background-color: white;
    color: #406767;
}

.btn-secondary {
    background-color: #406767;
    color: white;
    border: none;
    border-radius: 999px;
    padding: 10px 20px;
    font-size: 16px;
    width: 100%;
    margin-top: 10px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-secondary:hover {
    background-color: #305050;
}

.modal .close-button {
    position: absolute;
    right: 10px;
    font-size: 22px;
    color: #a73c3c;
    cursor: pointer;
    background: none;
    border: none;
    margin: 0;
}

.filtro {
    background-color: #406767;
    color: white;
    border: none;
    border-radius: 8px;
    padding: 10px 16px;
    font-size: 16px;
    cursor: pointer;
    margin-bottom: 20px;
}

.selector {
    display: flex;
    border: 1px solid #ccc;
    border-radius: 8px;
    overflow: hidden;
    width: 100%;
    margin-bottom: 20px;
    cursor: pointer;
}

.selector label {
    flex: 1;
    text-align: center;
    padding: 12px;
    background-color: white;
    color: #406767;
    font-weight: bold;
    transition: all 0.3s ease;
}

.selector label.active {
    background-color: #406767;
    color: white;
}
</style>
