<template>
    <div id="map" class="map-container"></div>
  </template>

  <script>
  import mapboxgl from 'mapbox-gl'; // Importa Mapbox GL JS

  export default {
    name: 'Mapa',
    mounted() {
      // Asegúrate de que Mapbox GL JS esté cargado
      if (typeof mapboxgl === 'undefined') {
        console.error('Mapbox GL JS no está disponible');
        return;
      }

      // Configura el mapa
      mapboxgl.accessToken = 'pk.eyJ1IjoiY2hpbGxnaWciLCJhIjoiY204aHFjYWR2MDRyejJqczlmbGMxbHYwbyJ9.KJlPU8iYIehhkx-gFSwE0g';

      // Crear el mapa dentro del contenedor
      new mapboxgl.Map({
        container: 'map', // ID del contenedor
        style: 'mapbox://styles/mapbox/streets-v11', // Estilo del mapa
        center: [-74.5, 40], // Posición inicial [lng, lat]
        zoom: 9, // Nivel de zoom inicial
      });
    }
  };
  </script>

  <style scoped>
  .map-container {
    position: absolute;
    top: 0;
    bottom: 0;
    width: 100%;
    height: 100%;
  }
  </style>
