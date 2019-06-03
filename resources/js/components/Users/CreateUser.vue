<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-12"> 
                <div class="card card-default">
                    <div class="card-header">
                        {{ title }}
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="createUser" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Nome</label>
                                        <input type="text" v-model="form.name" name="name" autocomplete="off" class="form-control" :class="{'is-invalid': form.errors.has('name')}">
                                        <has-error :form="form" field="name"></has-error>
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
                                        <input type="password" v-model="user.password" name="password" autocomplete="off" class="form-control">
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
    name: 'createUser',
    data () {
        return {
            user:{
                name: "",
                email: "",
                password: ""
            },
            title: "Cadastro de Usuarios"
        }
    },
    methods: {
        createUser () {
            axios.post('users',this.user,{
                headers: {
                    Authorization: 'Bearer '+window.sessionStorage.getItem('access_token')
                }
            })
            .then((res) => {
                this.limpaForm();
                 toast({
                    type: 'success',
                    title: 'Cadastro realizado com successo'
                });
            })
            .catch((res) => {
                toast({
                    type: 'error',
                    title: 'Erro ao efetuar a operação'
                });
            });
        },
        limpaForm () {
            for (const field in this.user) {
                this.user[field] = "";
            }
        }
    }
}
</script>

<style>

</style>
