module.exports = {
    content: [
        "./index.html",
        "./src/**/*.{vue,js,ts,jsx,tsx}",
        "./resources/products/**/*.{vue,js,ts,jsx,tsx}",
        "./node_modules/flowbite/**/*.js",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
    },
    plugins: [require("flowbite/plugin")],
};
