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
                                        <input type="text" v-model="form.email" name="email" autocomplete="off" class="form-control" :class="{'is-invalid': form.errors.has('email')}">
                                        <has-error :form="form" field="email"></has-error>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" v-model="form.password" name="password" autocomplete="off" class="form-control" :class="{'is-invalid': form.errors.has('password')}">
                                        <has-error :form="form" field="password"></has-error>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-dark float-right" :disabled="form.busy" type="submit">Salvar</button>
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
            form: new Form ({
                name: "",
                email: "",
                password: ""
            }),
            title: "Cadastro de Usuarios"
        }
    },
    methods: {
        editUser () {
            this.form.put('users/'+this.$route.params.id,{
                headers: {
                    Authorization: 'Bearer '+ window.localStorage.getItem('access_token')
                }
            })
            .then((res) => {
                this.form.reset();
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
        getUser () {
            axios.get('users/'+this.$route.params.id,{
                headers: {
                    Authorization: 'Bearer '+window.localStorage.getItem('access_token')
                }
            })
            .then( res => {
                console.log(res);
                this.form.fill(res.data.data);
            })
            .catch( res => {

            });
        }
    },
    created () {
        this.getUser();
    }
}
</script>

<style>

</style>
