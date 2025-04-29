<template lang="">
    <div
        style="
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
        "
    >
        <h4 class="text-center mt-4">
            Pincha en el mapa para indicar tu ubicación
        </h4>
        <div
            class="mapa-container"
            style="
                width: 80%;
                min-height: 450px;
                position: relative;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            "
        >
            <Mapa @ubicacionUsuario="guardarUbi"></Mapa>
        </div>
        <div
            class="boton-container"
            style="
                text-align: center;
                margin-top: 20px;
                position: relative;
                z-index: 10;
            "
        >
            <button @click="guardarCliente()" class="btn btn-primary">
                Siguiente
            </button>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        usuarioId: Number,
        usuario: {
            type: Object,
        },
    },
    data() {
        return {
            latitud: 0,
            longitud: 0,
        };
    },
    methods: {
        guardarUbi(latitud, longitud) {
            this.latitud = latitud;
            this.longitud = longitud;
        },

        guardarCliente() {
            // Obtener la latitud y longitud seleccionada por el usuario (suponiendo que tienes estos datos en tu mapa)

            // Validación simple
            if (this.latitud != 0 && this.longitud != 0) {
                const me = this;
                // Luego de obtener el último usuario, hacemos el POST para guardar el nuevo cliente
                axios
                    .post(
                        "/cliente",
                        {
                            id_usuario: me.usuarioId, // ID del usuario actual
                            latitud: me.latitud,
                            longitud: me.longitud,
                        }
                    )
                    .then((response) => {
                        // Si el usuario es músico, creamos también su entrada en la tabla músico
                        if (me.usuario.id_tipo_usuario === 2) {
                            axios.post(
                                "/musico",
                                {
                                    id_usuario: me.usuario.id_usuario,
                                }
                            );
                        } else if (me.usuario.id_tipo_usuario === 3) {
                            axios.post('/local', {
                                    id_usuario: me.usuario.id_usuario,
                            });

                        }

                        alert("Cliente registrado exitosamente!");
                        window.location.href =
                            "/index";
                    })
                    .catch((error) => {
                        console.error("Error al registrar el cliente:", error);
                    });
            } else {
                alert("Por favor, selecciona una ubicación en el mapa.");
            }
        },
    },
};
</script>
<style lang=""></style>
