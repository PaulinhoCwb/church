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
                                    <td>Ações</td>
                                </tr>
                            </thead>
                            <tbody>
                              <tr v-for="(noticia, index) in news" :key="index">
                                  <td>{{ noticia.titulo }}</td>
                                  <td>{{ noticia.body | sliceName }}</td>
                                  <td>{{ noticia.user.name }}</td>
                                  <td>{{ noticia.created_at.date | dateTimeBR }}</td>
                                  <td>
                                        <button class="btn btn-outline-info btn-sm" @click="viewBody(noticia)">
                                          <i class="fas fa-eye-slash"></i>
                                        </button>
                                        <router-link class="btn btn-outline-secondary btn-sm" :to="{name: 'edit.news', params: {id: noticia.id}}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </router-link>
                                        <button class="btn btn-outline-danger btn-sm" @click="deleteNew(noticia.id,index)">
                                          <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                              </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="noticia" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ noticia.titulo }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{ noticia.body }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
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
            news: [],
            noticia: {}
        }
    },
    methods: {
        getNews (pageUrl) {
            let vm = this;
            pageUrl = pageUrl || 'news';
            axios.get(pageUrl,{
                    headers: {
                         Authorization: 'Bearer ' + window.localStorage.getItem('access_token')
                    }
                }).then((res) => {
                this.news = res.data.data;
            }).catch((res) => {

            });
        },
        viewBody (noticia) {
            this.noticia = noticia;
            $('#noticia').modal('show'); 
        },
        deleteNew (id, index){
            axios.delete('news/'+id,{
                headers:{
                    Authorization: 'Bearer '+window.localStorage.getItem('access_token')
                }
            })
            .then( res => {
                if (res.data.deleted) {
                    toast({
                        type: "success",
                        title: "Operação realizada com successo!!"
                    });
                    this.news.splice(index,1);
                } else {
                    toast({
                        type: "error",
                        title: "Erro ao excluir noticia"
                    });
                }
            })
            .catch( res => {
                toast({
                    type: "error",
                    title: "Erro ao excluir noticia"
                });
            });
        }
    },
    created () {
        this.getNews();
    }
}
</script>

<style>

</style>
