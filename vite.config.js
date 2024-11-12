import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'; // Import the Vue plugin
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue()
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js'), // Alias for main resources
            'Modules': path.resolve(__dirname, 'Modules'), // Alias for your modules
        },
    },
    server: {
        proxy: {
            '/app': 'http://localhost', // Proxy setup for development if needed
        },
    },
});
