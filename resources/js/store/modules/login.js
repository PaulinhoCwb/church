const state = {
    login: {
        access_token: null,
        scopes: null
    }
};

const getters = {
    getToken: state => {
        return state.login.access_token;
    }
};

const actions = {};

const mutations = {};

export default {
    state,
    getters,
    actions,
    mutations
}