
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.$ = window.jQuery = require('jquery'); 
window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component('cargo', require('./components/Cargo.vue'));
Vue.component('codigo', require('./components/Codigo.vue'));
Vue.component('tipo', require('./components/Tipo.vue'));
Vue.component('rol', require('./components/Rol.vue'));
Vue.component('documento', require('./components/Documento.vue'));
Vue.component('user', require('./components/Usuario.vue'));
Vue.component('proceso', require('./components/Proceso.vue'));
const app = new Vue({
    el: '#app',
    data:{
        menu:0
    }
});
