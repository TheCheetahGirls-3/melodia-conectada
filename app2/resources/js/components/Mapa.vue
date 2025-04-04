<template>
    <div class="map-container">
        <!-- Input de búsqueda (si lo necesitas) -->
        <div class="search-container">
            <input
                v-model="ubicacion"
                type="text"
                placeholder="Introduce una ubicación"
            />
            <button @click="buscarUbicacion">
                <i class="bi bi-search"></i>
            </button>
        </div>
        <!-- El mapa -->
        <div id="map"></div>
    </div>
</template>

<script>
import mapboxgl from "mapbox-gl";
import axios from "axios";

export default {
    emits: ["ubicacionUsuario"],
    name: "Mapa",
    data() {
        return {
            map: null,
            ubicacion: "",
            marker: null,
            latLng: null, // Ubicación seleccionada
        };
    },
    mounted() {
        mapboxgl.accessToken =
            "pk.eyJ1IjoiY2hpbGxnaWciLCJhIjoiY204aHFjYWR2MDRyejJqczlmbGMxbHYwbyJ9.KJlPU8iYIehhkx-gFSwE0g";

        // Inicializar el mapa
        this.map = new mapboxgl.Map({
            container: "map",
            style: "mapbox://styles/mapbox/streets-v11",
            center: [2.1769, 41.3847], // Ubicación inicial (Barcelona)
            zoom: 12,
        });

        // Agregar marcador
        this.marker = new mapboxgl.Marker({ color: "purple" })
            .setLngLat([2.1769, 41.3847])
            .addTo(this.map);

        // Evento de doble clic
        this.map.on("dblclick", (e) => {
            const { lng, lat } = e.lngLat;
            this.marker.setLngLat([lng, lat]);
            this.latLng = { lng, lat }; // Guardar la ubicación seleccionada
            this.$emit("ubicacionUsuario", lat, lng);
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

                    // Mover el mapa y marcador
                    this.map.flyTo({ center: [lng, lat], zoom: 15 });
                    this.marker.setLngLat([lng, lat]);
                    this.latLng = { lng, lat }; // Guardar la ubicación
                } else {
                    alert("Ubicación no encontrada");
                }
            } catch (error) {
                console.error("Error al obtener la ubicación:", error);
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
    height: 100%;
}
</style>
