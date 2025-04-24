import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/app.scss','resources/js/app.js'],
            refresh: true,
        }),
        vue()
    ],
    resolve: {
        alias: {
            'vue': 'vue/dist/vue.esm-bundler.js'
        }
    },
    build: {
        outDir: 'public/build',       // <--- dónde guardar los archivos de build
        manifest: true,               // <--- genera el manifest.json requerido por Laravel
        sourcemap: false,             // opcional, puedes dejarlo en true si te interesa
        rollupOptions: {
            input: [
                'resources/css/app.css',
                'resources/css/app.scss',
                'resources/js/app.js'
            ],
        },
    },
    base: '/build/',
});
