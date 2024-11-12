import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'; // Import the Vue plugin
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'Modules/Pos/resources/js/app.js'
            ],
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
    build: {
        outDir: 'public/build', // Build output directory
        rollupOptions: {
            output: {
                entryFileNames: (chunk) => {
                    // Place POS-specific assets in `assets/pos` directory
                    if (chunk.name === 'app' && chunk.facadeModuleId.includes('Modules/Pos')) {
                        return 'assets/pos/[name].js';
                    }
                    return 'assets/[name].js';
                },
                chunkFileNames: (chunk) => {
                    return chunk.name.includes('Modules/Pos')
                        ? 'assets/pos/[name].js'
                        : 'assets/[name].js';
                },
                assetFileNames: (assetInfo) => {
                    return assetInfo.name.includes('Modules/Pos')
                        ? 'assets/pos/[name][extname]'
                        : 'assets/[name][extname]';
                },
            },
        },
    },
    server: {
        proxy: {
            '/app': 'http://localhost', // Proxy setup for development if needed
        },
    },
});
