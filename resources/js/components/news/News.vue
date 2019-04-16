<template>
    <div>
        <router-link class="btn btn-default" to="form-news">Cadastrar Noticia</router-link>
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
                          <tr v-for="noticia in news" :key="noticia.id">
                              <td>{{ noticia.titulo }}</td>
                              <td>{{ noticia.body }}</td>
                              <td>{{ noticia.user.name }}</td>
                              <td>{{ noticia.created_at.date}}</td>
                          </tr>
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
        getNews (pageUrl) {
            vm = this;
            pageUrl = pageUrl || 'news';
            axios.get(pageUrl).then((res) => {
                this.news = res.data.data;
            }).catch((res) => {

            });
        }
    }
}
</script>

<style>

</style>
