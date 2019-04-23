import Vue from 'Vue'
import Vuex from 'Vuex'
import axios from 'axios'

Vue.use(Vuex);

axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('access_token');
axios.defaults.baseURL = 'https://santuariosantateresinha41.com.br/api/';

export default new Vuex.Store({
    state: { 
        token: null,
        name: "Joao Paulo"
    },
    getters: { 
        loggedIn(state){
            return state.token !== null
        }
    },
    mutations: {
        saveToken (state,token) {
            state.token = token;
        }
    }
});

