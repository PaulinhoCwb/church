<template>
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
                                    <label for="">Nome</label>
                                    <input type="text" v-model="form.email" name="email" autocomplete="off" class="form-control" :class="{'is-invalid': form.errors.has('email')}">
                                    <has-error :form="form" field="email"></has-error>
                                </div>
                            </div>
                        </div>
                    </form>
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
            })
        }
    },
    methods: {
        createUser () {
            axios.post('')
            .then((res) => {
                this.form.reset();
            })
            .catch((res) => {
                toast({
                    type: 'success',
                    title: 'Cadastro realizado com successo'
                });
            });
        }
    }
}
</script>

<style>

</style>
