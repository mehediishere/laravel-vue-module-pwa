// app.js

import { createApp } from 'vue';
import { createPinia } from 'pinia';
import { createRouter, createWebHistory } from 'vue-router';

import App from './components/App.vue';
import Home from './components/Home.vue';
import Home2 from './components/Home2.vue';
import Home3 from './components/Home3.vue';

const routes = [
    { path: '/pos', component: Home },
    { path: '/pos/2', component: Home2 },
    { path: '/pos/3', component: Home3 },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

const app = createApp(App);
app.use(createPinia());
app.use(router);
app.mount('#app');
