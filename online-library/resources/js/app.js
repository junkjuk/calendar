/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import Vuex from 'vuex';
import store from './store/index';

Vue.component('auth', require('./components/auth.vue').default);
Vue.component('calendar', require('./components/calendar.vue').default);
Vue.component('eventForm', require('./components/eventForm.vue').default);

const app = new Vue({
    el: '#app',
    store
});

