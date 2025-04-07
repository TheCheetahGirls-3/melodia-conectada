<template>
    <div class="map-container">
        <!-- Solo el mapa -->
        <div id="map"></div>
    </div>
</template>

<script>
import mapboxgl from "mapbox-gl";

export default {
    props: {
        usuarioId: Number,
        usuario: {
            type: Object,
        },
    },
    emits: ["ubicacionUsuario"],
    name: "MapaSoloVista",
    data() {
        return {
            map: null,
            marker: null,
            latLng: null, // Ubicación seleccionada
        };
    },
    mounted() {
        mapboxgl.accessToken =
            "pk.eyJ1IjoiY2hpbGxnaWciLCJhIjoiY204aHFjYWR2MDRyejJqczlmbGMxbHYwbyJ9.KJlPU8iYIehhkx-gFSwE0g";

        // Hacer la llamada a la API para obtener la ubicación del cliente
        axios
            .get(
                `http://localhost:80/melodia-conectada/app2/public/api/cliente/${this.usuarioId}`
            )
            .then((response) => {
                const cliente = response.data;
                if (cliente && cliente.ubicacion) {
                    const me = this;
                    const ubicacion = cliente.ubicacion.split(","); // Asumimos que la ubicación está en formato "lat,lng"
                    const lat = parseFloat(ubicacion[0]);
                    const lng = parseFloat(ubicacion[1]);

                    // Inicializar el mapa con la ubicación del cliente
                    me.map = new mapboxgl.Map({
                        container: "map",
                        style: "mapbox://styles/mapbox/streets-v11",
                        center: [lng, lat], // Usar la ubicación del cliente
                        zoom: 12,
                    });

                    // Agregar marcador inicial en la ubicación del cliente
                    me.marker = new mapboxgl.Marker({ color: "purple" })
                        .setLngLat([lng, lat])
                        .addTo(this.map);

                    // Escuchar el doble clic para actualizar la ubicación
                    me.map.on("dblclick", (e) => {
                        const { lng, lat } = e.lngLat;
                        this.marker.setLngLat([lng, lat]);
                        this.latLng = { lng, lat };
                        this.$emit("ubicacionUsuario", lat, lng);
                    });
                    this.mostrarMarkerLocalMusico();
                } else {
                    console.log("No se encontró la ubicación del cliente");
                }
            })
            .catch((error) => {
                console.error(
                    "Error al obtener la ubicación del cliente:",
                    error
                );
            });
    },

    methods: {
        mostrarMarkerLocalMusico() {
        const me = this;

        // Verificamos si el usuario es músico (id_tipo_usuario = 2) o local (id_tipo_usuario = 3)
        if (this.usuario.id_tipo_usuario == 2) {
            // Usuario es MÚSICO → Mostrar LOCALES
            axios
                .get("http://localhost:8080/melodia-conectada/app2/public/api/cliente")
                .then((response) => {
                    // Verifica que 'response.data.data' sea un array
                    if (Array.isArray(response.data.data)) {
                        const clientes = response.data.data;

                        // Itera sobre los clientes y agrega el marcador para los locales
                        clientes.forEach((cliente) => {
                            if (cliente.ubicacion && cliente.locales) {
                                const [lat, lng] = cliente.ubicacion.split(",").map(parseFloat);
                                new mapboxgl.Marker({ color: "green" })
                                    .setLngLat([lng, lat])
                                    .addTo(me.map);
                            }
                        });
                    } else {
                        console.log("La respuesta de la API no contiene un array válido de clientes.");
                    }
                })
                .catch((error) => {
                    console.error("Error al obtener los clientes:", error);
                });
        } else if (this.usuario.id_tipo_usuario == 3) {
            // Usuario es LOCAL → Mostrar MÚSICOS
            axios
                .get("http://localhost:8080/melodia-conectada/app2/public/api/cliente")
                .then((response) => {
                    // Verifica que 'response.data.data' sea un array
                    if (Array.isArray(response.data.data)) {
                        const clientes = response.data.data;

                        // Itera sobre los clientes y agrega el marcador para los músicos
                        clientes.forEach((cliente) => {
                            if (cliente.ubicacion && cliente.musicos) {
                                const [lat, lng] = cliente.ubicacion.split(",").map(parseFloat);
                                new mapboxgl.Marker({ color: "orange" }) // Usar otro color para los músicos
                                    .setLngLat([lng, lat])
                                    .addTo(me.map);
                            }
                        });
                    } else {
                        console.log("La respuesta de la API no contiene un array válido de clientes.");
                    }
                })
                .catch((error) => {
                    console.error("Error al obtener los clientes:", error);
                });
        }
    },
    },
};
</script>

<style scoped>
.map-container {
    position: relative;
    width: 100%;
    height: 100%;
}

#map {
    width: 100%;
    height: 100%;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}
</style>
