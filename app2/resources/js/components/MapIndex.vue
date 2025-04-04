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
                `http://localhost:8080/melodia-conectada/app2/public/api/cliente/${this.usuarioId}`
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

        // // Inicializar el mapa
        // this.map = new mapboxgl.Map({
        //     container: "map",
        //     style: "mapbox://styles/mapbox/streets-v11",
        //     center: [2.1769, 41.3847], // Barcelona
        //     zoom: 12,
        // });

        // // Agregar marcador inicial
        // this.marker = new mapboxgl.Marker({ color: "purple" })
        //     .setLngLat([2.1769, 41.3847])
        //     .addTo(this.map);

        // // Escuchar doble clic para actualizar ubicación
        // this.map.on("dblclick", (e) => {
        //     const { lng, lat } = e.lngLat;
        //     this.marker.setLngLat([lng, lat]);
        //     this.latLng = { lng, lat };
        //     this.$emit("ubicacionUsuario", lat, lng);
        // });
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
