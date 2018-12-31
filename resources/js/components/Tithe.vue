<template>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header">{{ title }}</div>
            <div class="card-body">
                <form  @submit.prevent="createTithe" @keydown="form.onKeydown($event)">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-grou">
                                <label for="">Nome</label>
                                <v-select v-model="form.people_id" label="name" :options="persons"></v-select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="data">Data Pagamento</label>
                                <input type="text" v-model="form.paid_at" name="paid_at" class="form-control" :class="{ 'is-invalid': form.errors.has('paid_at') }">
                                <has-error :form="form" field="paid_at"></has-error>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Valor</label>
                                <input type="text" name="maney_value" v-model="form.maney_value" class="form-control" :class="{ 'is-invalid': form.errors.has('maney_value') }">
                                <has-error :form="form" field="maney_value"></has-error>
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
export default {
    name: 'tithe',
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
            axios.get('tithes').then((res) => {
                console.log(res);
                this.persons = res.data;
            }).catch((res) => {

            });
        },
        createTithe() {
            this.form.post('tithe').then((res) => {

            }).catch((res) => {

            });
        }
    },
    mounted () {
        this.getPersons();
    }
}
</script>

<style>

</style>
