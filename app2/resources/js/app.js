import './bootstrap';
// import "bootstrap-icons/font/bootstrap-icons.css";
import * as bootstrap from 'bootstrap'
import 'bootstrap-icons/font/bootstrap-icons.css';

import { createApp } from 'vue';

import Listado from './components/Listado.vue';
import Mapa from './components/Mapa.vue';
import MapaRegCliente from './components/MapaRegCliente.vue';
import MapIndex from './components/MapIndex.vue';
import Chats from './components/Chats.vue';
import Perfil from './components/Perfil.vue';
import BannerPerfil from './components/BannerPerfil.vue';
import MusicPlayer from './components/MusicPlayer.vue';
import GaleriaMultimedia from './components/GaleriaMultimedia.vue';
import Eventos from './components/Eventos.vue';
import Estadisticas from './components/Estadisticas.vue';


const app = createApp({});

app.component('listado', Listado);
app.component('Mapa', Mapa);
app.component('map-reg-cl', MapaRegCliente)
app.component('map-index', MapIndex)
app.component('chats', Chats);
app.component('perfil', Perfil);
app.component('banner-perfil', BannerPerfil);
app.component('music-player', MusicPlayer);
app.component('galeria-multimedia', GaleriaMultimedia);
app.component('eventos', Eventos);
app.component('estadisticas', Estadisticas);

app.mount('#app');

