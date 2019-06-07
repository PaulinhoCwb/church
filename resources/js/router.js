import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

export default new VueRouter({
    routes:
    [
        { path: '', redirect: '/login' },
        { path: '/', redirect: '/login' },
        { path: '/login', component: require('./components/Auth/Login.vue') },
        { path: '/master', component: require('./components/Layout/Master.vue'),
            children: [
                { path: '/', redirect: '/dashboard'},
                { path: '/form', component: require('./components/FormCadastro.vue') },
                { path: '/form/:id', component: require('./components/Peoples/EditPeople.vue'), name:'edit.user' },
                { path: '/dependents/:id', component: require('./components/Dependents.vue')},
                { path: '/profile/:id', component: require('./components/Profile.vue'), name: 'profile' },
                { path: '/dashboard', component: require('./components/Dashboard.vue'), name: 'dashboard' },
                { path: '/tithe', component: require('./components/Tithe.vue')},
                { path: '/tithe/:id', component: require('./components/TitheSingle.vue'), name: 'tithe-single'},
                { path: '/search', component: require('./components/Search.vue')},
                { path: '/news', component: require('./components/news/News.vue')},
                { path: '/form-news', component: require('./components/news/FormNews.vue')},
                { path: '/edit-news/:id', component: require('./components/news/EditNews.vue'), name: 'edit.news'},
                { path: '/intencoes', component: require('./components/intentions/Itentions.vue')},
                { path: '/event', component: require('./components/Event.vue') },
                { path: '/users', component: require('./components/Users/Users.vue') },
                { path: '/form-users/:id', component: require('./components/Users/EditUser.vue'), name: 'update.user'},
                { path: '/form-users', component: require('./components/Users/CreateUser.vue')},
                { path: '/event/view/:id', component: require('./components/Event/ViewEvent.vue'), name: 'event.view'},
                { path: '/birthday', component: require('./components/Peoples/Birthdays.vue'), name: 'birthday'},
                { path: '/catequese/create', component: require('./components/Catequese/FormCatequese.vue'), name: 'catequese'},
                { path: '/event/create/:date', component: require('./components/Event/EventForm.vue'), name: 'event.create'},
                { path: '/event/edit/:id', component: require('./components/Event/EditEvent.vue'), name: 'event.edit'},
                { path: '/avisos', component: require('./components/Avisos/Avisos.vue'), name: 'avisos'},
            ] 
        },
      ],
    mode: 'history',
    linkActiveClass: "active",
});
