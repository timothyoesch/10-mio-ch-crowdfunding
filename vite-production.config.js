import { defineConfig } from 'vite';
import vue from "@vitejs/plugin-vue";
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import i18n from 'laravel-vue-i18n/vite';
import path from 'path';


export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
        vue(),
        i18n()
    ],

    resolve: {
        alias: {
            '@fonts': path.resolve(__dirname, 'resources/css/typo/fonts'),
        }
    },

    esbuild: {
        drop: ['console', 'debugger'], // Remove console and debugger statements for production
    },
});
