<template>
    <div>
        <div class="row content-justify-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        {{ title }}
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col-3">
                                    <div class="custom-control custom-checkbox mb-3 pt-3">
                                        <input type="checkbox" v-model="form.name" id="name" name="name" value="name" class="custom-control-input">
                                        <label for="name" class="custom-control-label">Busca por nome</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="custom-control custom-checkbox mb-3 pt-3">
                                        <input type="checkbox" v-model="form.month" id="month" name="month" value="month" class="custom-control-input">
                                        <label for="month" class="custom-control-label">Busca por mês</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" name="form.nome" id="nome" :disabled="form.month" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <select :disabled="form.name" name="form.mes" id="mes" class="form-control">
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
            <person></person>
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
                month: false,
                name: false,
            }),
            data:'23/02/1989'
        }
    }
}
</script>

<style>

</style>
