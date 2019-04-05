import Vue from 'Vue';
import Vuex from "Vuex";
import axios from 'axios';

Vue.use(Vuex);

axios.defaults.baseURL = 'https://santuariosantateresinha41.com.br/api/';

export const store = new Vuex.Store({
    state: {
        token: localStorage.getItem('access_toke') || null,
    },
    getters: {
        loggedIn(state){
            return state.token !== null
        }
    }
})