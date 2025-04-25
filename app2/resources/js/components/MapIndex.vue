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
            popup: null,
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
                    this.map.on("load", () => {
                        console.log("Mapa cargado exitosamente.");

                        // Llamar a la función para mostrar los marcadores después de que el mapa haya cargado
                        if (this.usuario?.id_tipo_usuario === 2) {
                            this.mostrarMarkerLocal();
                        } else {
                            this.mostrarMarkerMusico();
                        }
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
                    if (this.usuario?.id_tipo_usuario === 2) {
                        this.mostrarMarkerLocal(this.popup);
                    } else {
                        this.mostrarMarkerMusico(this.popup);
                    }
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
        mostrarMarkerMusico() {
            axios
                .get(
                    "http://localhost:80/melodia-conectada/app2/public/api/musico/"
                )
                .then((response) => {
                    const musicos = response.data;
                    const me = this;
                    if (!musicos || musicos.length === 0) {
                        console.log("No hay músicos disponibles");
                        return;
                    }

                    musicos.forEach((musico) => {
                        const ubicacion = musico.cliente?.ubicacion;

                        if (ubicacion && ubicacion.includes(",")) {
                            const [lat, lng] = ubicacion
                                .split(",")
                                .map((coord) => parseFloat(coord.trim()));

                            console.log(
                                "Ubicación del músico",
                                musico.nombre_artistico,
                                lat,
                                lng
                            );

                            if (!isNaN(lat) && !isNaN(lng)) {
                                const marker = new mapboxgl.Marker({
                                    color: "#406767",
                                })
                                    .setLngLat([lng, lat])
                                    .addTo(me.map);

                                const popup = new mapboxgl.Popup({
                                    offset: 25,
                                    maxWidth: "600px",
                                }).setHTML(`
    <div style="
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-family: Arial, sans-serif;
        font-size: 14px;
        padding: 15px;
        max-width: 100%;
        border-radius: 8px;
        background-color: #ffffff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    ">
        <div style="flex: 1; padding-right: 10px;">
            <strong style="display: block; margin-bottom: 8px;">
                ${musico?.cliente?.nombre}
            </strong>
            <a href="http://localhost:80/melodia-conectada/app2/public/perfil/${
                musico.id_usuario
            }"
               target="_blank"
               style="color: #406767; text-decoration: none; font-weight: bold;">
                Ver perfil
            </a>
        </div>
        <div>
            <img src="${
                "/melodia-conectada/app2/public/images/imagenes_perfil/" +
                musico?.cliente?.foto_perfil
            }"
                 alt="Perfil"
                 style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">
        </div>
    </div>
`);

                                marker.setPopup(popup);
                            } else {
                                console.log(
                                    "Ubicación inválida para el músico",
                                    musico.nombre_artistico
                                );
                            }
                        } else {
                            console.log(
                                "El músico no tiene una ubicación válida o no está en el formato adecuado",
                                musico.nombre_artistico
                            );
                        }
                    });
                })
                .catch((error) => {
                    console.error("Error al obtener músicos:", error);
                });
        },

        mostrarMarkerLocal() {
            axios
                .get(
                    "http://localhost:80/melodia-conectada/app2/public/api/local/"
                )
                .then((response) => {
                    const locales = response.data;

                    if (!locales || locales.length === 0) {
                        console.log("No hay locales disponibles");
                        return;
                    }

                    locales.forEach((local) => {
                        const ubicacion = local.cliente?.ubicacion;
                        mapboxgl.accessToken =
                            "pk.eyJ1IjoiY2hpbGxnaWciLCJhIjoiY204aHFjYWR2MDRyejJqczlmbGMxbHYwbyJ9.KJlPU8iYIehhkx-gFSwE0g";
                        const mapboxClient = mapboxSdk({
                            accessToken: mapboxgl.accessToken,
                        });

                        mapboxClient.geocoding
                            .forwardGeocode({
                                query: ubicacion, // Esto se debe cambiar por la dirección correspondiente
                                autocomplete: false,
                                limit: 1,
                            })
                            .send()
                            .then((response) => {
                                if (
                                    !response ||
                                    !response.body ||
                                    !response.body.features ||
                                    !response.body.features.length
                                ) {
                                    console.error("Invalid response:");
                                    console.error(response);
                                    return;
                                }
                                const feature = response.body.features[0];

                                // Create a marker and add it to the map.
                                const marker = new mapboxgl.Marker({
                                    color: "#7C0023",
                                })
                                    .setLngLat(feature.center)
                                    .addTo(this.map);
                                const popup = new mapboxgl.Popup({
                                    offset: 25,
                                    maxWidth: "600px",
                                }).setHTML(`
    <div style="
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-family: Arial, sans-serif;
        font-size: 14px;
        padding: 15px;
        max-width: 100%;
        border-radius: 8px;
        background-color: #ffffff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    ">
        <div style="flex: 1; padding-right: 10px;">
            <strong style="display: block; margin-bottom: 8px;">
                ${local?.cliente?.nombre}
            </strong>
            <a href="http://localhost:80/melodia-conectada/app2/public/perfil/${
                local.id_usuario
            }"
               target="_blank"
               style="color: #7C0023; text-decoration: none; font-weight: bold;">
                Ver perfil
            </a>
        </div>
        <div>
            <img src="${
                "/melodia-conectada/app2/public/images/imagenes_perfil/" +
                local?.cliente?.foto_perfil
            }"
                 alt="Perfil"
                 style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">
        </div>
    </div>
`);

                                marker.setPopup(popup);
                            })
                            .catch((error) => {
                                console.error(
                                    "Error al obtener geocodificación:",
                                    error
                                );
                            });
                    });
                })
                .catch((error) => {
                    console.error("Error al obtener locales:", error);
                });
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

.mapboxgl-popup {
    max-width: 400px;
    font: 12px/20px "Helvetica Neue", Arial, Helvetica, sans-serif;
}
</style>
