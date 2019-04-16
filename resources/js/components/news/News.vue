<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Noticias
                        </h3>
                        <div class="card-tools">
                             <router-link class="btn btn-outline-primary btn-sm" to="form-news">Cadastrar Noticia</router-link>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
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
            let vm = this;
            pageUrl = pageUrl || 'news';
            axios.get(pageUrl).then((res) => {
                this.news = res.data.data;
            }).catch((res) => {

            });
        }
    },
    mounted () {
        this.getNews();
    }
}
</script>

<style>

</style>
