<template>
    <div>
        <div class="row content-justify-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        {{ title }}
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="search" method="POST">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nome">Nome:</label>
                                        <input type="text" v-model="form.name" name="form.nome" id="nome" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="mes">Mês</label>
                                        <select name="form.month" v-model="form.month" id="mes" class="form-control">
                                            <option value="">----------</option>
                                            <option value="1">Janeiro</option>
                                            <option value="2">Fevereiro</option>
                                            <option value="3">Março</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Maio</option>
                                            <option value="6">Junho</option>
                                            <option value="7">Julho</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Setembro</option>
                                            <option value="10">Outubro</option>
                                            <option value="11">Novembro</option>
                                            <option value="12">Dezembro</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-dark float-right">Pesquisar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row content-justify-center">
            <person  v-for="person in persons" :key="person.id" 
            :data-nascimento="person.dateofbirth | dateToBR"
            v-show="show"
            :nome="person.name | sliceName"></person>
        </div>
    </div>
</template>

<script>
import Person from './Search/Person';
export default {
    name:'search',
    components:{
        Person
    },
    data () {
        return {
            title: 'Pesquisas',
            form: new Form({
                month: '',
                name: '',
            }),
            persons: [],
            show: false,
        }
    },
    methods: {
        search(){
            axios.get('search',{
                params: {
                    month: this.form.month,
                    name: this.form.name
                },
                headers:{
                    Authorization: 'Bearer ' + sessionStorage.getItem('access_token')
                }
            }).then((res) => {
                this.persons = res.data;
                if (this.persons) {
                    this.show = true;
                }
            }).catch((res) => {

            });
        }
    }
}
</script>

<style>

</style>
