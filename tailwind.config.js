import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "selector",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "light-primary-1": "#ffffff",
                "light-primary-2": "#f3f3f3",
                "light-primary-3": "#f2f7ff",
                "dark-primary-1": "#11121e",
                "dark-primary-2": "#1d1d29",
                "secondary-1": "#ffbc11",
                "secondary-2": "#4578f9",
                "secondary-3": "#43b430",
                "secondary-4": "#cb3eff",
                "typography-1": "#ffffff",
                "typography-2": "#7b7b7b",
                "typography-3": "#000000",
            },
        },
    },

    plugins: [forms],
};
