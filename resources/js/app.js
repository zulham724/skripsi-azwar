
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');
window.swal = require('sweetalert2');
import VueCharts from 'vue-chartjs';
import { Bar, Line } from 'vue-chartjs';
import $ from 'jquery';
import 'datatables.net';
import 'datatables.net-buttons';
window.pattern = require('patternomaly');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('role-field-component',require('./components/RoleFieldComponent.vue'));
Vue.component('comparison-table-component',require('./components/ComparisonTableComponent.vue'));
Vue.component('comparison-date-component',require('./components/ComparisonDateComponent.vue'));
Vue.component('comparison-bandwidth-component',require('./components/ComparisonBandwidthComponent.vue'));
Vue.component('comparison-cpu-component',require('./components/ComparisonCpuComponent.vue'));
Vue.component('comparison-memory-component',require('./components/ComparisonMemoryComponent.vue'));

const app = new Vue({
    el: '#app'
});
