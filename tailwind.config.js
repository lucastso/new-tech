const { colors } = require("laravel-mix/src/Log");

/** @type {import('tailwindcss').Config} */
module.exports = {
    mode: "jit",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                black: {
                    ...colors.black,
                    24: "#242424",
                },
            },
        },
    },
    plugins: [],
};
