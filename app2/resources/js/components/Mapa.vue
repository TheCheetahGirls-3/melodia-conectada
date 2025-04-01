<template>
    <div class="map-container">
        <div class="search-container">
            <input
                v-model="ubicacion"
                type="text"
                placeholder="Introduce una ubicación"
            />
            <button @click="buscarUbicacion">Aceptar</button>
        </div>
        <div id="map"></div>
    </div>
</template>

<script>
import mapboxgl from "mapbox-gl";
import axios from "axios";

export default {
    name: "Mapa",
    data() {
        return {
            map: null,
            ubicacion: "",
            marker: null,
        };
    },
    mounted() {
        // Configurar el token de Mapbox
        mapboxgl.accessToken =
            "pk.eyJ1IjoiY2hpbGxnaWciLCJhIjoiY204aHFjYWR2MDRyejJqczlmbGMxbHYwbyJ9.KJlPU8iYIehhkx-gFSwE0g";

        // Inicializar el mapa
        this.map = new mapboxgl.Map({
            container: "map",
            style: "mapbox://styles/mapbox/streets-v11",
            center: [2.1769, 41.3847], // Ubicación inicial (Barcelona)
            zoom: 12,
        });

        // Agregar un marcador inicial en el centro
        this.marker = new mapboxgl.Marker()
            .setLngLat([2.1769, 41.3847])
            .addTo(this.map);

        // Evento para capturar doble clic y agregar marcador
        this.map.on("dblclick", (e) => {
            const { lng, lat } = e.lngLat;

            // Mover el marcador a la nueva posición
            this.marker.setLngLat([lng, lat]);

            // Guardar ubicación en la base de datos
            this.guardarUbicacion(lng, lat);
        });
    },
    methods: {
        async buscarUbicacion() {
            if (!this.ubicacion.trim()) return;

            try {
                const response = await axios.get(
                    `https://api.mapbox.com/geocoding/v5/mapbox.places/${this.ubicacion}.json`,
                    {
                        params: {
                            access_token: mapboxgl.accessToken,
                            limit: 1,
                        },
                    }
                );

                if (response.data.features.length > 0) {
                    const [lng, lat] = response.data.features[0].center;

                    // Mover el mapa a la nueva ubicación
                    this.map.flyTo({
                        center: [lng, lat],
                        zoom: 15,
                    });

                    // Mover el marcador a la nueva ubicación
                    this.marker.setLngLat([lng, lat]);

                    // Guardar ubicación en la base de datos
                    this.guardarUbicacion(lng, lat);
                } else {
                    alert("Ubicación no encontrada");
                }
            } catch (error) {
                console.error("Error al obtener la ubicación:", error);
            }
        },
        async guardarUbicacion(lng, lat) {
            try {
                const response = await axios.post("/api/guardar-ubicacion", {
                    id_usuario: 1, // Cambiar por el ID del usuario autenticado
                    ubicacion: `${lat}, ${lng}`,
                });

                console.log("Ubicación guardada:", response.data);
                alert("Ubicación guardada correctamente");
            } catch (error) {
                console.error("Error al guardar la ubicación:", error);
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

.search-container {
    position: absolute;
    top: 10px;
    left: 50%;
    transform: translateX(-50%);
    background: white;
    padding: 10px;
    border-radius: 8px;
    display: flex;
    gap: 8px;
    z-index: 1050;
}

input {
    width: 250px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

#map {
    width: 100%;
    height: 100vh;
}
</style>
