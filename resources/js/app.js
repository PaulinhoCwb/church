
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import { Form, HasError, AlertError } from 'vform';
import router from './router.js';
import FullCalendar from 'vue-full-calendar';
import VueProgressBar from 'vue-progressbar';
import swal from 'sweetalert2';
import moment from 'moment';

window.Form = Form;
window.swal = swal;

const toast = swal.mixin({
    toast: true,
    position:'top-end',
    ShowConfirmButton: false,
    timer: 3000
});
window.toast = toast;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)


Vue.use(FullCalendar);
Vue.use(VueProgressBar,{
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '10px'   
});

Vue.filter('dateToBR', function (date) {
    return moment(date).format('DD/MM/YYYY');
});
// let routes = [
//     { path: '/', redirect: '/dashboard' },
//     { path: '/dashboard', component: require('./components/Dashboard.vue') },
//     { path: '/profile', component: require('./components/Profile.vue') },
//     { path: '/form', component: require('./components/FormCadastro.vue') },
//     { path: '/event', component: require('./components/Event.vue')},
//     { path: '/dependents/:id', component: require('./components/Dependents.vue')} 
//   ];

//  const router = new VueRouter({
//      routes, // short for `routes: routes`
//      linkActiveClass: "active",
//  });

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
// Vue.component('navbar-component', require('./components/Profile.vue'));
// Vue.component('menu-component', require('./components/Dashboard.vue'));
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router: router
});
