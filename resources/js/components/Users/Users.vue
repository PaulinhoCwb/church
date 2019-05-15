<template>
       <div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Usuarios
                        </h3>
                        <div class="card-tools">
                             <router-link class="btn btn-outline-primary btn-sm" to="form-users">Cadastrar Usuario</router-link>
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
                              <tr v-for="(user, index ) in users" :key="index">
                                  <td>{{ user.name }}</td>
                                  <td>{{ user.email }}</td>
                                  <td>{{ user.created_at }}</td>
                                  <td>
                                      <router-link :to="{name:'update.user',params: {id: user.id}}" class="btn btn-outline-primary btn-sm">
                                          <i class="fas fa-pencil-alt"></i>
                                      </router-link>
                                      <a href="#" @click.prevent="deleteUser(user.id, index)" class="btn btn-outline-info btn-sm">
                                          <i class="fas fa-trash-alt"></i>
                                      </a>
                                  </td>
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
            axios.get('users',{
                headers:{
                    Authorization: 'Bearer '+window.sessionStorage.getItem('access_token')
                }
            })
            .then((res) => {
                this.users = res.data.data;
            })
            .catch((res) => {
                toast({
                    type: 'error',
                    title: 'Erro a carregar os dados.'
                });
            });
        },
        deleteUser(id, index) {
            axios.delete('users/'+id,{
                headers: {
                    Authorization: 'Bearer '+ window.sessionStorage.getItem('access_token')
                }
            })
            .then( res => {
                if (res.data.deleted) {
                    this.users.splice(index,1);
                    toast({
                        type: 'success',
                        title: "Operação efetuada com successo"
                    });
                } else {
                     toast({
                        type: 'error',
                        title: "Operação não pode ser efetuada!"
                    });
                }
    
            })
            .catch( res => {
                toast({
                    type: 'error',
                    title: "Operação não pode ser efetuada!"
                });
            });
        }
    },
    mounted () {
        this.getUsers();
    }
}
</script>

<style>

</style>
