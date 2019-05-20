<template>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header">{{ title }}</div>
            <div class="card-body">
                <form  @submit.prevent="createTithe" @keydown="form.onKeydown($event)">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-grou">
                                <label for="">Nome</label>
                                <v-select v-model="form.people_id" label="name" :options="persons"></v-select>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="data">Data Pagamento</label>
                                <input type="text" v-mask="'##/##/####'" v-model="form.paid_at" name="paid_at" class="form-control" :class="{ 'is-invalid': form.errors.has('paid_at') }">
                                <has-error :form="form" field="paid_at"></has-error>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="">Valor</label>
                                <money v-model="form.money_value" prefix="R$ " class="form-control" :class="{ 'is-invalid': form.errors.has('money_value') }"></money>
                                <has-error :form="form" field="money_value"></has-error>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" :disabled="form.busy" class="btn btn-dark float-right">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</template>

<script>
// import Autocomplete from 'vuejs-auto-complete'
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
            form: new Form({
                people_id: '',
                money_value: '',
                paid_at: ''
            }),
            title: 'Dizimo'
        }
    },
    methods: {
        getPersons(){
            axios.get('persons').then((res) => {
                console.log(res);
                this.persons = res.data.data;
            }).catch((res) => {
                 
            });
        },
        createTithe() {
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
