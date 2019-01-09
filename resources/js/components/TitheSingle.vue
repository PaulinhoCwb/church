<template>
    <div class="row content-justify-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    {{ title }}
                </div>
                <div class="card-body">
                    <form @submit.prevent="createTithe" @keydown="form.onKeydown($event)">
                        <input type="hidden" name="people_id" v-model="form.people_id">
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
                                    <input v-mask="'##/##/####'" type="text" name="paid_at" v-model="form.paid_at" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Valor</label>
                                    <money v-model="form.money_value" prefix="R$ " class="form-control"></money>
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
            form: new Form({
                people_id: this.$route.params.id,
                paid_at: '',
                money_value: 0,
            })
        }
    },
    methods: {
          getPerson(){
            axios.get('person/one/'+this.form.people_id).then((res) => {
                this.name = res.data.name;
            }).catch((res) => {

            });
        },

        createTithe(){
            this.form.post('tithes').then((res) => {
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
    mounted () {
        this.getPerson();                                        
    },   
    created () {
        
    }
}
</script>

<style>

</style>
