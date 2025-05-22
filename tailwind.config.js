import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            animation: {
                fadeIn: 'fadeIn 1s ease-out',
                shake: 'shake 2.5s ease-in-out infinite',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '100%' }
                },
                shake: {
                    '0%, 100%': { transform: 'translateX(0)' },
                    '20%': { transform: 'translateX(-2px)' },
                    '40%': { transform: 'translateX(2px)' },
                    '60%': { transform: 'translateX(-2px)' },
                    '80%': { transform: 'translateX(2px)' },
                },
            }
        },
    },

    plugins: [forms, require('@tailwindcss/line-clamp')],
};


