<template>
    <div class="row content-justify-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    {{ title }}
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nome">Nome:</label>
                                    <input type="text" v-model="form.nome" name="form.nome" id="nome" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="mes">Mês</label>
                                    <select name="form.mes" v-model="form.mes" id="mes" class="form-control">
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
</template>

<script>
export default {
    name:'search',
    data () {
        return {
            title: 'Pesquisas',
            form: new Form({
                month: '',
                name: '',
            })
        }
    },
    methods: {
        search(){

        }
    }
}
</script>

<style>

</style>
