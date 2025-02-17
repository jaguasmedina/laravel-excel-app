import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',  // Ruta a tu archivo CSS
                'resources/js/app.js',    // Ruta a tu archivo JS
            ],
            refresh: true,
        }),
    ],
});