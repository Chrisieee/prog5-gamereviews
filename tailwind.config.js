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
            padding: {
                basic: '6rem',
            },
            colors: {
                background: '#caece9',
                nav: '#4ea19a',
                review: '#70e8dd',
                reviewborder: '#55b3aa',
            }
        },
    },

    plugins: [forms],
};
