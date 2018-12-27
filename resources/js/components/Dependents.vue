<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">{{ title }}</div>
                <div class="card-body">
                    <form @submit.prevent="createDependent" method="POST">
                        <input type="hidden" v-model="form.people_id" name="people_id" >
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Nome</label>
                                    <input type="text" v-model="form.name" name="name" autocomplete="off" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('name') }">
                                    <has-error :form="form" field="name"></has-error>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Data de Nascimento</label>
                                    <input type="text" v-mask="'##/##/####'" name="dateofbirth" v-model="form.dateofbirth" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Data de Casamento</label>
                                <input type="text" name="weddingdata" v-mask="'##/##/####'" v-model="form.weddingdata" class="form-control">
                            </div>
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-6 mt-3">
                                        <div class="custom-control custom-radio mb-3 pt-3">
                                            <input type="radio" v-model="form.type" value="F" name="type" class="custom-control-input" id="filho">
                                            <label class="custom-control-label" for="filho">Filho</label>
                                        </div>
                                    </div>
                                    <div class="col-6 mt-3 pt-3">
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" v-model="form.type" value="E" name="type" class="custom-control-input" id="wife">
                                            <label class="custom-control-label" for="wife">Cônjuge</label>
                                        </div>
                                    </div>
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
</template>

<script>
import {mask} from 'vue-the-mask'
    export default {
        name: 'dependents',
        directives: {mask},
        data() {
            return {
                title: "Cadastro de dependentes",
                form: new Form({
                    name: '',
                    people_id: this.$route.params.id,
                    type: '',
                    weddingdata:'',
                    dateofbirth:''
                })
            }
        },
        methods: {
            createDependent () {
                this.form.post('dependents')
                .then((res) => {
                    if(res.data.id){
                        this.form.name = '';
                        this.form.weddingdata = '';
                        this.form.dateofbirth = '';

                        toast({
                            type: 'success',
                            title: 'Cadastro realizado com successo'
                        });
                    } else {
                        toast({
                            type: 'error',
                            title: 'Operação não pode ser concluida'
                        });
                    }
                });
            }
        }
    }

</script>
