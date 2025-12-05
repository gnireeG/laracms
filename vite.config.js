import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import path from 'path';

export default defineConfig({
    resolve: {
        alias: {
            '@': path.resolve(__dirname, './'),
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'packages/laracms/core/resources/css/laracms.css'
            ],
            refresh: [
                'resources/**',
                'packages/laracms/core/resources/views/**',
                'packages/laracms/core/resources/css/**',
                'packages/laracms/core/src/**/*.php',
            ],
        }),
        tailwindcss(),
    ],
});
