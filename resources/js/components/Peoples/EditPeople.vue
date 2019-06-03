<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default"> 
                <div class="card-header">{{ title }} {{ id }}</div>

                <div class="card-body">
                    <form @submit.prevent="editPerson" method="POST">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Nome:</label>
                                    <input autocomplete="off" type="text" v-model="people.name" name="name" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form group">
                                    <label for="">Data Nascimento</label>
                                    <input v-mask="'##/##/####'" autocomplete="off" type="text" v-model="people.dateofbirth" class="form-control" name="dateofbirth"
                                    >
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
                                    <input v-mask="'#####-###'" autocomplete="off" type="text" v-model="people.zipcode" class="form-control" name="zipCode"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="">Endereço</label>
                                    <input autocomplete="off" type="text" v-model="people.address" class="form-control" name="address"
                                    >
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="">Numero</label>
                                    <input autocomplete="off" v-model="people.number" type="text" class="form-control" name="number"
                                    >
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
                                    <input autocomplete="off" v-model="people.email" type="text" class="form-control" name="email"
                                    >
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
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="">Celular</label>
                                    <input v-mask="['(41) ####-####', '(##) #####-####']" autocomplete="off" type="text" class="form-control" v-model="people.cellphone" name="cellPhone"
                                    >
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
import moment from 'moment'
    export default {
        name: 'editPeople',
        directives: {mask},
        data() {
            return {
                title: "Edição de paroquianos",
                people:{
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
                },
                id: ''
            }
        },
        methods: {
            editPerson () {
                axios.put('persons/'+this.$route.params.id,this.people,{
                    headers:{
                        Authorization: 'Bearer ' + window.sessionStorage.getItem('access_token')
                    }
                })
                .then((res) => {
                    if (updated == true) {
                        this.limpaForm();
                        toast({
                            type: 'success',
                            title: 'Atualização realizado com successo!'
                        });
                    } else {
                        toast({
                            type: 'error',
                            title: 'Atualização não pode ser realizada!'
                        });
                    }

                })
                .catch( res => {
                     toast({
                            type: 'error',
                            title: 'Operação não pode ser concluida'
                        });
                });
            },
            dateToBR (date) {
               return moment(date).format('DD/MM/YYYY');
            },
            limpaForm () {
                for (const field in this.event) {
                    this.event[field] = "";
                }
            }

        },
        created () {
            if (this.$route.params.id) {
                axios.get('persons/'+this.$route.params.id,{
                    headers: {
                        Authorization: 'Bearer '+window.sessionStorage.getItem('access_token')
                    }
                })
                .then( (res) => {
                    this.people.name = res.data.data.name;
                    this.people.dateofbirth = this.dateToBR(res.data.data.dateofbirth);
                    this.people.birthplace = res.data.data.birthplace;
                    this.people.zipcode = res.data.data.zipcode;
                    this.people.address = res.data.data.address;
                    this.people.number = res.data.data.number;
                    this.people.email = res.data.data.email;
                    this.people.tellphone = res.data.data.tellphone;
                    this.people.cellphone = res.data.data.cellphone;
                    this.people.publicplace = res.data.data.publicplace;
                })
                .catch(res => {

                });
            }
        },
        filters: {
            dateToBR (date) {
               return moment(date).format('DD/MM/YYYY');
            }
        }
    }

</script>

<style>

</style>
