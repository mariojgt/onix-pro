import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel([
            'resources/vendor/Onix/js/app.js', // Normal js files
            'resources/vendor/Onix/css/app.css', // Normal css files
        ])
    ],
    build: {
        outDir: 'public/vendor/Onix',
        emptyOutDir: true,
        rollupOptions: {
            input: {
                app: '/resources/vendor/Onix/js/app.js',
                css: '/resources/vendor/Onix/css/app.css',
            },
        },
    }
});
