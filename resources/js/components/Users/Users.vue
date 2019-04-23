<template>
       <div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Noticias
                        </h3>
                        <div class="card-tools">
                             <router-link class="btn btn-outline-primary btn-sm" to="form-news">Cadastrar Usuario</router-link>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Nome</td>
                                    <td>Email</td>
                                    <td>Data publicação</td>
                                </tr>
                            </thead>
                            <tbody>
                              <tr v-for="user in users" :key="user.id">
                                  <td>{{ user.titulo }}</td>
                                  <td>{{ user.body }}</td>
                                  <td>{{ user.user.name }}</td>
                              </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Users',
    data () {
        return {
            users: []
        }
    },
    methods: {
        getUsers() {
            axios.get('users')
            .then((res) => {
                this.users = res.data.data;
            })
            .catch((res) => {
                toast({
                    type: 'error',
                    title: 'Erro a carregar os dados.'
                });
            });
        }
    }
}
</script>

<style>

</style>
