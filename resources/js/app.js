import './bootstrap';

import "bootstrap-icons/font/bootstrap-icons.css";

import * as bootstrap from 'bootstrap'

import { createApp } from 'vue';

import ejemplo from './components/Ejemplo.vue';

const app = createApp({});

app.component('ejemplo', ejemplo);

app.mount('#app');
