import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                    'resources/css/app.css',
                    'resources/css/pages/login.css',
                    'resources/css/pages/home.css',
                    'resources/css/pages/breathing-space.css',
                    'resources/css/pages/music.css',
                    'resources/css/pages/after-breathing.css',
                    'resources/js/app.js',
            ],
            refresh: true,
            fonts: [
                bunny('Instrument Sans', {
                    weights: [400, 500, 600],
                }),
            ],
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
