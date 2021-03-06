
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import router from './router.js';
import FullCalendar from 'vue-full-calendar';
import VueProgressBar from 'vue-progressbar';
import swal from 'sweetalert2';
import moment from 'moment';
import vSelect from 'vue-select';
import store from "./store";

window.swal = swal;

const toast = swal.mixin({
    toast: true,
    position:'top-end',
    showConfirmButton: false,
    timer: 5000
});
window.toast = toast;

Vue.component('v-select',vSelect);

Vue.use(FullCalendar);
Vue.use(VueProgressBar,{
    color: 'blue',
    failedColor: 'red',
    thickness: '5px'   
});

Vue.filter('dateToBR', function (date) {
    return (date) ? moment(date).format('DD/MM/YYYY') : '-------';
});
Vue.filter('dateTimeBR', function (date) {
  return moment(date).format('DD/MM/YYYY H:m');
});
Vue.filter('sliceName', function (data) {
  return data.slice(0,17);
});

const app = new Vue({
    el: '#app',
    store,
    router,
    mounted () {
        //  [App.vue specific] When App.vue is finish loading finish the progress bar
        this.$Progress.finish()
    },
    created () {
        //  [App.vue specific] When App.vue is first loaded start the progress bar
        this.$Progress.start()
        //  hook the progress bar to start before we move router-view
        this.$router.beforeEach((to, from, next) => {
          //  does the page we want to go to have a meta.progress object
          if (to.meta.progress !== undefined) {
            let meta = to.meta.progress
            // parse meta tags
            this.$Progress.parseMeta(meta)
          }
          //  start the progress bar
          this.$Progress.start()
          //  continue to next page
          next()
        })
        //  hook the progress bar to finish after we've finished moving router-view
        this.$router.afterEach((to, from) => {
          //  finish the progress bar
          this.$Progress.finish()
        })
    }
});
