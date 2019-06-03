<template>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header">{{ title }}</div>
            <div class="card-body">
                <form  @submit.prevent="createTithe">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-grou">
                                <label for="">Nome</label>
                                <v-select v-model="tithe.people_id" label="name" :options="persons"></v-select>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="data">Data Pagamento</label>
                                <input type="text" v-mask="'##/##/####'" v-model="tithe.paid_at" name="paid_at" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="">Valor</label>
                                <money v-model="tithe.money_value" prefix="R$ " class="form-control"></money>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-dark float-right">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</template>

<script>
import {mask} from 'vue-the-mask';
import {Money} from 'v-money';
export default {
    name: 'tithe',
     components: {Money},
        directives: {
        mask
    },
    data () {
        return {
            persons: [],
            tithe:{
                people_id: '',
                money_value: '',
                paid_at: ''
            },
            title: 'Dizimo'
        }
    },
    methods: {
        getPersons(){
            axios.get('persons',{
                headers: {
                    Authorization: 'Bearer '+window.sessionStorage.getItem('access_token')
                }
            }).then((res) => {
                this.persons = res.data.data;
            }).catch((res) => {
                 
            });
        },
        createTithe() {
            axios.post('tithes',this.tithe,{
                headers: {
                    Authorization: 'Bearer '+window.sessionStorage.getItem('access_token')
                }
            }).then((res) => {
                if (res.data.id) {
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
            }).catch((res) => {

            });
        }
    },
    created () {
        this.getPersons();
    }
}
</script>

<style>

</style>
