import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

export default new VueRouter({
    routes:
    [
        { path: '', redirect: '/login' },
        { path: '/', redirect: '/login' },
        { path: '/event', component: require('./components/Event.vue') },
        { path: '/login', component: require('./components/Auth/Login.vue') },
        { path: '/master', component: require('./components/Layout/Master.vue'),
            children: [
                { path: '/', redirect: '/dashboard'},
                { path: '/form', component: require('./components/FormCadastro.vue') },
                { path: '/dependents/:id', component: require('./components/Dependents.vue')},
                { path: '/profile/:id', component: require('./components/Profile.vue'), name: 'profile' },
                { path: '/dashboard', component: require('./components/Dashboard.vue'), name: 'dashboard' },
                { path: '/tithe', component: require('./components/Tithe.vue')},
                { path: '/tithe/:id', component: require('./components/TitheSingle.vue'), name: 'tithe-single'},
                { path: '/search', component: require('./components/Search.vue')},
                { path: '/news', component: require('./components/news/News.vue')},
                { path: '/form-news', component: require('./components/news/FormNews.vue')},
                { path: '/intencoes', component: require('./components/intentions/Itentions.vue')},
            ] 
        },
      ],
    mode: 'hash',
    linkActiveClass: "active",
});
