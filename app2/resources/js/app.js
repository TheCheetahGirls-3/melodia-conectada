import './bootstrap';



// import "bootstrap-icons/font/bootstrap-icons.css";


import * as bootstrap from 'bootstrap'

import { createApp } from 'vue';




import Listado from './components/Listado.vue';

const app = createApp({});



app.component('listado', Listado);


app.mount('#app');
