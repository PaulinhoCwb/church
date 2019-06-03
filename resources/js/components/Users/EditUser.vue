<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-12"> 
                <div class="card card-default">
                    <div class="card-header">
                        {{ title }}
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="editUser">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Nome</label>
                                        <input type="text" v-model="user.name" name="name" autocomplete="off" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" v-model="user.email" name="email" autocomplete="off" class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" v-model="user.password" name="password" autocomplete="off" class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-dark float-right" type="submit">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'editUser',
    data () {
        return {
            user: {
                name: "",
                email: "",
                password: ""
            },
            title: "Edição de Usuarios"
        }
    },
    methods: {
        editUser () {
            axios.put('users/'+this.$route.params.id,this.user,{
                headers: {
                    Authorization: 'Bearer '+ window.sessionStorage.getItem('access_token')
                }
            })
            .then((res) => {
               if (res.data.updated) {
                this.limpaForm();
                    toast({
                        type: 'success',
                        title: 'Cadastro realizado com successo'
                    });
               } else {
                    toast({
                        type: 'error',
                        title: 'Erro ao efetuar a operação'
                    });
               }
            })
            .catch((res) => {
                toast({
                    type: 'error',
                    title: 'Erro ao efetuar a operação'
                });
            });
        },
        getUser () {
            axios.get('users/'+this.$route.params.id,{
                headers: {
                    Authorization: 'Bearer '+window.sessionStorage.getItem('access_token')
                }
            })
            .then( res => {
                this.fillForm(res.data.data);
                // this.user.name = res.data.data.name;
                // this.user.email = res.data.data.email;
                console.log(this.user);
            })
            .catch( res => {
                toast({
                    type: "error",
                    title: "Erro ao processar a operação!"
                });
            });
        },
        limpaForm () {
            for (const field in this.user) {
                this.user[field] = "";
            }
        },
        fillForm (data) { 
            for(const field in data) {
                this.user[field] = data[field];
            }
        }
    },
    created () {
        this.getUser();
    }
}
</script>

<style>

</style>
