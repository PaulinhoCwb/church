import axios from 'axios'
const state = {
        token: null,
        scopes: null
};

const getters = {
    getToken: state => {
        return state.access_token;
    }
};

const actions = {
    logIn ({ commit }, payload) {
        return new Promise((resolve,reject) => {
            axios.post('https://santuariosantateresinha41.com.br/api/login',{
                payload
            }).then( response => {
                commit('setToken', response.data.access_token);
                resolve(response);
            }).catch( response => {
                reject(response);
            });
        });
    }
};

const mutations = {
    setToken: (state, token) => (state.token = token)
};

export default {
    state,
    getters,
    actions,
    mutations
};