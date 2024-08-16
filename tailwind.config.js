import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
export default {
    presets: [require("./vendor/wireui/wireui/tailwind.config.js")],
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./vendor/wireui/wireui/src/*.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/src/WireUi/**/*.php",
        "./vendor/wireui/wireui/src/Components/**/*.php",
    ],

    theme: {
        extend: {
            colors: {
                primary: {
                    light: "#c7d2fe",
                    DEFAULT: "#a5b4fc",
                    dark: "#818cf8",
                },
                secondary: {
                    light: "#f3f4f6",
                    DEFAULT: "#d1d5db",
                    dark: "#9ca3af",
                },
                positive: {
                    light: "#d1fae5",
                    DEFAULT: "#a7f3d0",
                    dark: "#6ee7b7",
                },
                negative: {
                    light: "#fee2e2",
                    DEFAULT: "#fecaca",
                    dark: "#fca5a5",
                },
                warning: {
                    light: "#fef3c7",
                    DEFAULT: "#fde68a",
                    dark: "#fcd34d",
                },
                info: {
                    light: "#bfdbfe",
                    DEFAULT: "#93c5fd",
                    dark: "#60a5fa",
                },
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
