/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('pagination', require('laravel-vue-pagination'));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
/*
    Clients
 */
Vue.component('clients-index', require('./components/clients/index.vue').default);
Vue.component('clients-show', require('./components/clients/show.vue').default);
Vue.component('clients-create', require('./components/clients/create.vue').default);
Vue.component('clients-form', require('./components/clients/form.vue').default);
Vue.component('clients-edit', require('./components/clients/edit.vue').default);

/*
    Transactions
 */
Vue.component('transactions-index', require('./components/transactions/index.vue').default);
Vue.component('transactions-show', require('./components/transactions/show.vue').default);
Vue.component('transactions-create', require('./components/transactions/create.vue').default);
Vue.component('transactions-form', require('./components/transactions/form.vue').default);
Vue.component('transactions-edit', require('./components/transactions/edit.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
