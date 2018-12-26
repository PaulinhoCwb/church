import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

export default new VueRouter({
    routes:
    [
        { path: '/', redirect: '/dashboard' },
        { path: '/dashboard', component: require('./components/Dashboard.vue') },
        { path: '/profile', component: require('./components/Profile.vue') },
        { path: '/form', component: require('./components/FormCadastro.vue') },
        { path: '/event', component: require('./components/Event.vue')},
        { path: '/dependents/:id', component: require('./components/Dependents.vue')} 
      ], 
    linkActiveClass: "active",
});
