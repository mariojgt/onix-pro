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

mix.js('resources/vendor/Onix/js/app.js', 'public/vendor/Onix/js');

mix.sass('resources/vendor/Onix/sass/app.scss', 'public/vendor/Onix/css');
