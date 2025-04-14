<template>
    <div v-if="usuario">
        <banner-perfil :usuario="usuario" />
    </div>
</template>

<script>
export default {
    props: ['id'],
    data() {
        return {
        usuario: null // ✅ coincide con el template
        };
    },
    mounted() {
    this.obtenerDatosPerfil();
    },
    methods: {
        async obtenerDatosPerfil() {
            try {
                const response = await axios.get(`/perfil/${this.id}`);
                console.log("Respuesta de la API:", response.data); // Depuración

                // Asignar directamente response.data porque no hay un objeto "data" envolviendo los datos
                if (response.data) {
                    this.usuario = response.data;
                } else {
                    console.error("La respuesta de la API no contiene datos válidos.");
                }
            } catch (error) {
                console.error("Error cargando perfil", error);
            }
        }
    }

}
</script>
  