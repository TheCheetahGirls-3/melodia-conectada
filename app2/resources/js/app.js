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


const app = createApp({});

app.component('listado', Listado);
app.component('Mapa', Mapa);
app.component('map-reg-cl', MapaRegCliente)
app.component('map-index', MapIndex)
app.component('chats', Chats);

app.mount('#app');

