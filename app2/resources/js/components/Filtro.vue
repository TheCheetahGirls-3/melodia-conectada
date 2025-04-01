<template>
    <div class="container">
        <button class="filtro" @click="abrirModal">Filtro</button>
        <div v-if="mostrarModal" class="modal-container">
            <div class="modal">
                <!-- Si es local -->
                <!-- <div v-if="cliente.musicos"> -->
                <h5>Instrumentos</h5>
                <select id="instrumento" v-model="selectedInstrumento">
                    <option v-for="instrumento in instrumentos" :key="instrumento.id_instrumento" :value="instrumento.nombre">
                        {{ instrumento.nombre }}
                    </option>
                </select>
                <h5>Géneros</h5>
                <select id="genero" v-model="selectedGeneros">
                <option v-for="genero in generos" :key="genero.id_genero" :value="genero.nombre">
                    {{ genero.nombre }}
                </option>
                </select>
                <!-- </div> -->

                <!-- Si es múdico -->
                <!-- <div v-if="cliente.musicos">

                </div> -->
                <button @click="cerrarModal">Cerrar</button>
            </div>
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
            resultado: [],
            mostrarModal: false,
            instrumentos: [],
            selectedInstrumento: "",
            generos: [],
            selectedGeneros: "",
        };
    },
    created(){
        this.fetchListado();
        console.log(this.listado);
        this.fetchInstrumentos();
        this.fetchGeneros();
    },

    methods: {
        fetchListado() {
        axios.get('cliente')
          .then(response => {
            this.listado = response.data;
            for (const cliente of this.listado) {
              if (cliente.usuario.id_tipo_usuario !== this.usuario.id_tipo_usuario) {
                this.resultado.push(cliente);
              }
            }
          })
          .catch(error => {
            console.error("Error obteniendo el listado:", error);
          });
        },
        abrirModal() {
            this.mostrarModal = true;
            console.log("Se ha abierto el modal ueeee", this.mostrarModal);
        },
        cerrarModal() {
            this.mostrarModal = false;
        },
        fetchInstrumentos(){
            axios.get("instrumento")
            .then((response) => {
                    this.instrumentos = response.data;
                    console.log(this.instrumentos);
                })
                .catch((error) => {
                    console.error("Error al cargar los juegos", error);
                });
        },
        fetchGeneros(){
            axios.get("genero")
            .then((response) => {
                    this.generos = response.data;
                    console.log(this.generos);
                })
                .catch((error) => {
                    console.error("Error al cargar los juegos", error);
                });
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
    border: 2px solid red;
    z-index: 10000 !important; /* Aún más arriba */
    display: block !important;
    margin-left: 30px;
    top:40%;
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
</style>
