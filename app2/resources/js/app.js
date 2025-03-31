import './bootstrap';
// import "bootstrap-icons/font/bootstrap-icons.css";
import * as bootstrap from 'bootstrap'

import { createApp } from 'vue';

import Listado from './components/Listado.vue';
import Mapa from './components/Mapa.vue';
import pruebaListado from './components/PruebaFiltro.vue';

const app = createApp({});

app.component('listado', Listado);
app.component('Mapa', Mapa);
app.component('prueba-filtro', pruebaListado);

app.mount('#app');

