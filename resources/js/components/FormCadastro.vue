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
                                    <input autocomplete="off" type="text" v-model="people.name" name="name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form group">
                                    <label for="">Data Nascimento</label>
                                    <input v-mask="'##/##/####'" autocomplete="off" type="text" v-model="people.dateofbirth" class="form-control" name="dateofbirth">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="">Local de Nascimento</label>
                                    <input autocomplete="off" type="text" name="birthplace" v-model="people.birthplace" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="">CEP</label>
                                    <input v-mask="'#####-###'" autocomplete="off" @blur="getZipCode" type="text" v-model="people.zipcode" class="form-control" name="zipCode">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="">Endereço</label>
                                    <input autocomplete="off" type="text" v-model="people.address" class="form-control" name="address">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="">Numero</label>
                                    <input autocomplete="off" v-model="people.number" type="text" class="form-control" name="number">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="">Logradouro</label>
                                    <input autocomplete="off" type="text" v-model="people.publicplace" class="form-control" name="publicplace">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">E-mail</label>
                                    <input autocomplete="off" v-model="people.email" type="text" class="form-control" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="">Telefone residencial</label>
                                    <input autocomplete="off" v-mask="'(41) ####-####'" type="text" v-model="people.tellphone" name="tellphone" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label for="">Celular</label>
                                    <input v-mask="['(41) ####-####', '(41) #####-####']" autocomplete="off" type="text" class="form-control" v-model="people.cellphone" name="cellPhone">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label for="">Celular 2</label>
                                    <input v-mask="['(41) ####-####', '(41) #####-####']" autocomplete="off" type="text" class="form-control" v-model="people.cellphone2" name="cellPhone">
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
</template>

<script>
import {mask} from 'vue-the-mask'
    export default {
        name: 'formCadastro',
        directives: {mask},
        data() {
            return {
                title: "Cadastro de paroquianos",
                people: {
                    name: '',
                    dateofbirth: '',
                    birthplace: '',
                    zipcode:'',
                    address:'',
                    number:'',
                    email:'',
                    tellphone:'',
                    cellphone:'',
                    cellphone2:'',
                    publicplace:''
                },
            }
        },
        methods: {
            createPerson () {
                axios.post('persons', this.people,{
                    headers: {
                        'Authorization': 'Bearer '+ window.sessionStorage.getItem('access_token')
                    }
                })
                .then((res) => {
                    // this.id = res.data.id;
                    // if(this.id){
                        toast({
                            type: 'success',
                            title: 'Cadastro realizado com successo'
                        });
                        this.limpaForm();
                        this.$router.push(`/dependents/${res.data.id}`);
                    // } else {
                    //     toast({
                    //         type: 'error',
                    //         title: 'Operação não pode ser concluida'
                    //     });
                    // }
                });
            },
            getZipCode () {
             
                axios.post('cep',{
                    zipcode: this.form.zipcode
                }).then(res => {
                    this.form.address = res.data.logradouro;
                });
            },
            limpaForm () {
                for (const field in this.people) {
                    this.people[field] = "";
                }
            }
        }
    }

</script>

<style>

</style>
