/** @type {import('tailwindcss').Config} */
const defaultTheme = require("tailwindcss/defaultTheme");
module.exports = {
    content: ["./src/**/*.{astro,html,js,jsx,md,mdx,svelte,ts,tsx,vue}"],
    theme: {
        extend: {
            fontFamily: {
                sans: ["InterVariable", "Inter", ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            'master': {
                100: '#1f2636',
                200: '#2a3247'
            },
            'master-text': {
                100: '#ffffff',
                200: '#696b69',
            },
            yellow: {
                100: '#f9e79f',
                200: '#f7dc6f',
                300: '#f4d03f',
                400: '#f1c40f',
                500: '#e8b800',
                600: '#b79500',
                700: '#846200',
                800: '#513000',
                900: '#1f0d00',
            },
            rarity: {
                poor: '#9d9d9d',
                common: '#ffffff',
                uncommon: '#1eff00',
                rare: '#0070dd',
                epic: '#a335ee',
                legendary: '#ff8000',
                artifact: '#e6cc80',
                heirloom: '#00ccff',
                wow: '#00ccff',
            }
        }
    },
    plugins: [
        require("@tailwindcss/typography")
    ],
};
