// tailwind.config.js

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        // Asegúrate de que todas tus vistas, incluyendo la de login, estén aquí
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                blue: {
                    50: '#eff6ff',
                    100: '#dbeafe',
                    200: '#bfdbfe',
                    500: '#3b82f6',
                    600: '#2563eb',
                    700: '#1d4ed8',
                    800: '#1e40af',
                    900: '#1e3a8a',
                },
            },
        },
    },

    // 🔥 ESTO ES CRÍTICO: Asegúrate de que 'daisyui' esté aquí
    plugins: [
        require('daisyui'),
    ],

    // Opcional: Esto te asegura que solo se cargue el tema 'light'
    daisyui: {
        themes: ["light"],
    },
}