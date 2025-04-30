<template>

    <div class="usuario-lista container mt-4">
        <div class="filtro-botones">
            <filtro :resultado="resultado" :tipus_user="tipus_user" @aplicar-filtros="aplicarFiltros"
                @sin-resultados="mostrarMensajeSinResultados" />
            <p v-if="filtrosAplicados || mensajeSinResultados" class="borrar-filtros" @click="borrarFiltros">
                Borrar filtros
            </p>
        </div>

        <div v-if="mensajeSinResultados" class="alerta">
            {{ textoMensajeSinResultados }}
        </div>

        <div class="div-general">
            <div v-for="user in resultado" :key="user.id_usuario" @click="irAlPerfil(user.id_usuario)" class="usuario-card">
                <div class="foto-perfil-container">
                    <img :src="url + user.cliente.foto_perfil"
                        alt="Foto de perfil" class="foto-perfil">
                </div>

                <div class="info-cliente">
                    <h4><strong> {{ user.cliente.nombre }} </strong></h4>

                    <div v-if="this.usuario.id_tipo_usuario === 3">
                        <p> {{ user.cliente.descripcion }}</p>
                        <ul class="m-0 p-0">
                            <div class="instrumento">
                                <li v-for="instrumento in user.instrumentos" :key="instrumento.id_instrumento">
                                    {{ instrumento.nombre }}
                                </li>
                            </div>
                            <div class="generos">
                                <li v-for="genero in user.generos" :key="genero.id_genero">
                                    {{ genero.nombre }}
                                </li>
                            </div>
                        </ul>
                    </div>

                    <div v-if="this.usuario.id_tipo_usuario === 2">
                        <p> {{ user.cliente.ubicacion }}</p>
                        <p> {{ user.cliente.telefono }}</p>
                        <p> {{ user.horario }}</p>
                        <div class="tipo-local">
                            <p> {{ user.tipo_local?.nombre }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import filtro from './Filtro.vue';

export default {
    components: { filtro },
    props: {
        usuario: {
            type: Object
        }
    },
    data() {
        return {
            resultado: [],
            tipus_user: 0,
            filtrosAplicados: false,
            mensajeSinResultados: false,
            textoMensajeSinResultados: "",
            url: import.meta.env.VITE_PROFILEIMGURL,
        };
    },
    mounted() {
        this.fetchListado();
    },
    methods: {
        fetchListado() {
            if (this.usuario.id_tipo_usuario === 2) {
                axios.get('local')
                    .then(response => {
                        this.resultado = response.data;
                        this.tipus_user = 3;
                    })
                    .catch(error => {
                        console.error("Error obteniendo el listado:", error);
                    });
            }
            else if (this.usuario.id_tipo_usuario === 3) {
                axios.get('musico')
                    .then(response => {
                        this.resultado = response.data;
                        this.tipus_user = 2;
                    })
                    .catch(error => {
                        console.error("Error obteniendo el listado:", error);
                    });
            }
        },
        aplicarFiltros(filtros) {
            this.resultado = filtros;
            this.filtrosAplicados = true;
            this.mensajeSinResultados = "";
        },
        borrarFiltros() {
            this.fetchListado();
            this.filtrosAplicados = false;
            this.mensajeSinResultados = false;
            this.textoMensajeSinResultados = "";
        },
        mostrarMensajeSinResultados(tipo) {
            this.resultado = [];
            this.mensajeSinResultados = true;
            this.textoMensajeSinResultados = `No hay ${tipo} con estos filtros.`;
        },
        irAlPerfil(id_usuarioClicado) {
            window.location.href = `${window.location.origin}/melodia-conectada/app2/public/perfil/${id_usuarioClicado}`;
        }
    },

}
</script>

<style scoped>
.usuario-lista {
    max-height: 95vh;
    overflow-y: scroll;
}

.usuario-lista::-webkit-scrollbar {
    display: none;
}

.usuario-lista {
    scrollbar-width: none;
}

.usuario-card {
    background: #f9f9f9;
    padding: 15px;
    margin-bottom: 10px;
    border-radius: 6px;
    border: 1px solid #CEAC91;
    display: flex;
    align-items: center;
    gap: 20px;
    cursor: pointer;
}

.foto-perfil {
    width: 150px;
    height: 150px;
    border-radius: 10px;
    object-fit: cover;
}

.info-cliente p {
    margin: 5px 0;
    font-size: 14px;
    line-height: 1.5;
}

.instrumento,
.generos {
    display: flex;
    flex-wrap: wrap;
    gap: 5px;
}

.instrumento li,
.tipo-local p {
    background: #7C0023;
    padding: 5px 10px;
    border-radius: 5px;
    color: white;
    font-size: 12px;
    text-decoration: none;
    list-style: none;
    display: inline-block;
    margin: 2px;
}

.generos li {
    background: #406767;
    padding: 5px 10px;
    border-radius: 5px;
    color: white;
    font-size: 12px;
    text-decoration: none;
    list-style: none;
    display: inline-block;
    margin: 2px;
}

.filtro {
    margin-top: 50px;
}

.filtro-botones {
    align-items: center;
    margin-top: 50px;
}

.borrar-filtros {
    color: red;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-block;
    margin: 0px 15px 15px 15px;
}

.borrar-filtros:hover {
    text-decoration: none;
    transform: scale(1.05);
}

.alerta {
    background-color: #ffe0e0;
    color: #a80000;
    padding: 10px 15px;
    margin: 15px;
    border: 1px solid #ffb3b3;
    border-radius: 8px;
    font-weight: bold;
    text-align: center;
}
</style>
