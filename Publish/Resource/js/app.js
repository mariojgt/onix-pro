/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./extra');

window.Vue = require('vue');

window.grapesjs = require('grapesjs');

window.ClassicEditor = require('@ckeditor/ckeditor5-build-classic');

//import grapesjs_preset from 'grapesjs-preset-webpage-ca';

//reusable componentes
//Vue.component('dropdown-reusable', require('./components/reusable/DropDown.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
