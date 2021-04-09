const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
// Normal js files
mix.js('resources/vendor/Onix/js/app.js', 'public/vendor/Onix/js')
    .sourceMaps()
    .version();

// Vue js example
mix.js('resources/vendor/Onix/js/vue.js', 'public/vendor/Onix/js')
    .vue({version: 3})
    .sourceMaps()
    .version();

/* Grape js stuff */
// Onix Grape js preset
mix.js('resources/vendor/Onix/js/grape/onixPreset.js', 'public/vendor/Onix/js')
    .sourceMaps()
    .version();

// Grape js code editor source https://github.com/ju99ernaut/grapesjs-component-code-editor
mix.js('resources/vendor/Onix/js/codeEditor/grapeCodeEditor.js', 'public/vendor/Onix/js')
    .sourceMaps()
    .version();

// Grape js core js
mix.js('resources/vendor/Onix/js/grapeCore.js', 'public/vendor/Onix/js')
    .sourceMaps()
    .version();

/* Grape js stuff */

// Tailwind
const tailwindcss = require('tailwindcss')
mix.sass('resources/vendor/Onix/sass/app.scss', 'public/vendor/Onix/css')
   .options({
      processCssUrls: false,
      postCss: [ tailwindcss('tailwind.config.js') ],
});
