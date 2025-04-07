 <template>

    <div class="usuario-lista container mt-4">
        <div class="filtro">
            <filtro :resultado="resultado" :tipus_user="tipus_user" @aplicar-filtros="aplicarFiltros"></filtro>
        </div>
      <div class="div-general">
        <div v-for="user in resultado" :key="user.id_usuario" class="usuario-card">

          <div class="foto-perfil-container">
            <img :src="'/melodia-conectada/app2/public/images/imagenes_perfil/' + user.cliente.foto_perfil" alt="Foto de perfil" class="foto-perfil">
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
                   <p> {{ user.tipo_local.nombre }}</p>
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
      };
    },
    mounted() {
      this.fetchListado();
    },
    methods: {
      fetchListado() {
        if(this.usuario.id_tipo_usuario === 2) {
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
        console.log('Resultados filtrados:', filtros);
        this.resultado = filtros; // Actualiza los resultados mostrados
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

  .div-general {
    padding-top: 5rem;
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
  }

  .foto-perfil {
    width: 150px;
    height:150px;
    border-radius: 10px;
    object-fit: cover;
  }

  .info-cliente p {
    margin: 5px 0;
    font-size: 14px;
    line-height: 1.5;
  }

  .instrumento, .generos {
    display: flex;
    flex-wrap: wrap;
    gap: 5px;
  }

  .instrumento li, .tipo-local p {
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

    .generos li{
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

    .filtro{
        margin-top: 50px;
    }


  </style>
