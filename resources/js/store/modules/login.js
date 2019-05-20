const state = {
        access_token: null,
        scopes: null
};

const getters = {
    getToken: state => {
        return state.login.access_token;
    }
};

const actions = {
    async fetchTodos ({ commit }) {
        const response = await axios.get('https://santuariosantateresinha41.com.br/api/login');
        commit('setToken', response.data.access_token);
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