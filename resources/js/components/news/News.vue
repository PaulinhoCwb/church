<template>
    <div>
        <router-link class="btn btn-link" to="form-news">Cadastrar Noticia</router-link>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Titulo</td>
                                <td>Resumo</td>
                                <td>Autor</td>
                                <td>Data publicação</td>
                            </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'news',
    data () {
        return {
            news: []
        }
    },
    methods: {
        
    }
}
</script>

<style>

</style>
