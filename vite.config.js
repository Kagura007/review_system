import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.jsx',
                'resources/css/project/time_line.css',
            ],
            refresh: true,
        }),
        react({
            fastRefresh: true,
        }),
    ],
});
