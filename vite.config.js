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
                    'resources/css/pages/chat-option.css',
                    'resources/css/pages/chat-interface.css',
                    'resources/css/pages/journal.css',
                    'resources/css/pages/journal-summary.css',
                    'resources/css/pages/decision.css',
                    'resources/css/pages/decision-summary.css',
                    'resources/css/pages/action-plan.css',
                    'resources/css/pages/psikolog.css',
                    'resources/css/pages/profile.css',
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
