<template>
    <div class="container">
        <h1>Aqui hay un filtro</h1>
        <button class="filtro" @click="abrirModal">F</button>
        <div v-if="mostrarModal" class="modal-overlay">
            <div class="modal">
                <h5>Instrumentos</h5>
                <select id="instrumento" v-model="selectedInstrumento">
                    <option v-for="instrumento in instrumentos" :key="instrumento.id_instrumento" :value="instrumento.nombre">
                        {{ instrumentos.nombre }}
                    </option>
                </select>
            </div>
            <h5></h5>
        </div>
    </div>



</template>

<script>
export default {
    props: {
        listado: {
            type: Array,
            required: true,
        },
    },
    data() {
        return {
            mostrarModal: false,
            instrumentos: [],
            selectedInstrumento: "",
        };
    },
    created(){
        this.fetchInstrumentos();
    },
    methods: {
        abrirModal() {
            this.mostrarModal = true;
        },
        cerrarModal() {
            this.mostrarModal = false;
        },
        fetchInstrumentos(){
            axios.get("instrumento")
            .then((response) => {
                    this.instrumentos = response.data;
                })
                .catch((error) => {
                    console.error("Error al cargar los juegos", error);
                });
        }
    },

};
</script>

<style scoped>
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 300px;
    border: 2px solid red; /* Borde temporal para depuración */
}

button {
    cursor: pointer;
    margin: 5px;
}
</style>
