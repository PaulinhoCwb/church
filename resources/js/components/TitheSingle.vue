<template>
    <div class="row content-justify-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    {{ title }}
                </div>
                <div class="card-body">
                    <form @submit.prevent="createTithe" @keydown="form.onKeydown($event)">
                        <input type="hidden" name="people_id" v-model="tithe.people_id">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Nome</label>
                                    <input type="text" name="name" v-model="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Data</label>
                                    <input v-mask="'##/##/####'" type="text" name="paid_at" v-model="tithe.paid_at" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Valor</label>
                                    <money v-model="tithe.money_value" prefix="R$ " class="form-control"></money>
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
import {mask} from 'vue-the-mask';
import {Money} from 'v-money';
export default {
    name:'tithe-single',
    components: {Money},
    directives: {
        mask
    },
    data () {
        return {
            title: 'Dizimo',
            name: '',
            tithe: {
                people_id: this.$route.params.id,
                paid_at: '',
                money_value: 0,
            }
        }
    },
    methods: {
          getPerson(){
            axios.get('person/one/'+this.tithe.people_id,{
                    headers:{
                         Authorization: 'Bearer ' + sessionStorage.getItem('access_token')
                    }
                }).then((res) => {
                this.name = res.data.name;
            }).catch((res) => {

            });
        },

        createTithe(){
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
            }).catch((res)=>{

            });
        }
    },
    created () {
        this.getPerson();                                        
    }
}
</script>

<style>

</style>
