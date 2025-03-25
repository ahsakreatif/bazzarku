import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                  50: '#eef3ff',
                  100: '#dce6ff',
                  200: '#bcd0ff',
                  300: '#8eafff',
                  400: '#5c83ff',
                  500: '#3558ff',
                  600: '#1a34ff',
                  700: '#03269E', // Base primary color
                  800: '#021d7a',
                  900: '#021a66',
                  950: '#000d3b',
                },
            },
        },
    },
    plugins: [],
};
