import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'red': '#E20000',
                'dark': '#0E0F10',
                'dark-gray': '#565A5D',
                'blue': '#0D5CAB',
                'graphite': '#292D32',
                'silver': '#DFE5ED',
                'light-gray': '#EFF0F2',
                'neutral-gray': '#CCD1D7',
                'neutral-dark-gray': '#33495F',
                'green': '#46B90E',
                'neutral-light-gray': '#F2F2F2',
                'neutral-gray-2': '#667687',
                'neutral-gray-3': '#99A4AF',
                'neutral-gray-5': '#E0E0E0',
                'gold-1': '#F79700',
                'gold-2': '#E8AA42',
                'blue-2': '#094793',
                'orange': '#F86F03',
                'orange-thin': 'rgba(248, 111, 3, 0.05)',
                'gray-stroke': '#F2F6FE'
            },
            fontSize: {
                xxs: '0.625rem'
            }
        },
    },

    plugins: [forms],
};
