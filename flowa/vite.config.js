import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            // Define aquí los puntos de entrada (archivos principales) de tu aplicación.
            // Esto incluye el CSS principal (donde se cargan Tailwind y DaisyUI) 
            // y el JS principal (donde se inicializa Alpine, si no lo haces en línea).
            input: [
                'resources/css/app.css', // ⬅️ Este es tu CSS
                'resources/js/app.js'   // ⬅️ Este es tu JS
            ],
            refresh: true,
        }),
    ],
});