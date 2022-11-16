import './bootstrap';
import router from './router/index.js';
// require('./bootstrap');

import {createApp} from 'vue'

import App from './App.vue'

createApp(App).use(router).mount("#app")