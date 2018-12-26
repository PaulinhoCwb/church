<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">{{ title }} {{ id }}</div>

                <div class="card-body">
                    <form @submit.prevent="createPerson" method="POST">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Nome:</label>
                                    <input autocomplete="off" type="text" v-model="form.name" name="name" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                    <has-error :form="form" field="name"></has-error>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form group">
                                    <label for="">Data Nascimento</label>
                                    <input v-mask="'##/##/####'" autocomplete="off" type="text" v-model="form.dateofbirth" class="form-control" name="dateofbirth"
                                    :class="{ 'is-invalid': form.errors.has('dateofbirth') }">
                                    <has-error :form="form" field="dateofbirth"></has-error>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="">Local de Nascimento</label>
                                    <input autocomplete="off" type="text" name="birthplace" v-model="form.birthplace" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="">CEP</label>
                                    <input v-mask="'#####-###'" autocomplete="off" @blur="getZipCode" type="text" v-model="form.zipcode" class="form-control" name="zipCode"
                                    :class="{ 'is-invalid': form.errors.has('zipcode') }">
                                    <has-error :form="form" field="zipcode"></has-error>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="">Endereço</label>
                                    <input autocomplete="off" type="text" v-model="form.address" class="form-control" name="address"
                                    :class="{ 'is-invalid': form.errors.has('address') }" >
                                    <has-error :form="form" field="address"></has-error>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="">Numero</label>
                                    <input autocomplete="off" v-model="form.number" type="text" class="form-control" name="number"
                                    :class="{ 'is-invalid': form.errors.has('number') }">
                                    <has-error :form="form" field="number"></has-error>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="">Logradouro</label>
                                    <input autocomplete="off" type="text" v-model="form.publicplace" class="form-control" name="publicplace">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">E-mail</label>
                                    <input autocomplete="off" v-model="form.email" type="text" class="form-control" name="email"
                                    :class="{ 'is-invalid': form.errors.has('email') }">
                                    <has-error :form="form" field="email"></has-error>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="">Telefone residencial</label>
                                    <input autocomplete="off" type="text" v-model="form.tellphone" name="tellphone" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="">Celular</label>
                                    <input v-mask="['(##) ####-####', '(##) #####-####']" autocomplete="off" type="text" class="form-control" v-model="form.cellphone" name="cellPhone"
                                    :class="{ 'is-invalid': form.errors.has('cellphone') }">
                                    <has-error :form="form" field="cellphone"></has-error>
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
import {TheMask} from 'vue-the-mask'
    export default {
        components: {TheMask},
        data() {
            return {
                title: "Cadastro de paroquianos",
                form: new Form({
                    name: '',
                    dateofbirth: '',
                    birthplace: '',
                    zipcode:'',
                    address:'',
                    number:'',
                    email:'',
                    tellphone:'',
                    cellphone:'',
                    publicplace:''
                }),
                id: ''
            }
        },
        methods: {
            createPerson () {
                this.form.post('persons')
                .then((res) => {
                    console.log(res.data.name);
                    this.id = res.data.id;
                    if(this.id){
                        alert('Entrou aqui');
                        this.$router.push(`/dependents/${this.id}`);
                    }
                    this.form.reset();
                });
            },

            getZipCode () {
             
                axios.post('cep',{
                    zipcode: this.form.zipcode
                }).then(res => {
                    this.form.address = res.data.logradouro;
                });
            }
        }
    }

</script>

<style>

</style>
