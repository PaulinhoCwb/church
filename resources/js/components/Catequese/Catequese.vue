<template>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">
                        Avisos Catequese
                    </h3>
                    <div class="card-tools">
                        <router-link class="btn btn-outline-primary btn-sm" to="/catequese/create">Cadastrar Aviso Catequese</router-link>
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
</template>

<script>
export default {
    name: 'Catequese',
    data () {
        return {
            news: []
        }
    },
    methods: {
        getCatequese () {
            axios.get('/catequese',{
                headers: {
                    Authorization: 'Bearer '+ window.sessionStorage.getItem('access_token')
                }
            })
            .then( response => {
                this.news = response.data.data;
            })
            .catch(response => {
                toast({
                    type: "error",
                    title: "Erro no servidor!!"
                });
            });
        },
         deleteNew (id, index){
            axios.delete('news/'+id,{
                headers:{
                    Authorization: 'Bearer '+window.sessionStorage.getItem('access_token')
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
    mounted () {
        this.getCatequese();
    }
}
</script>

<style>

</style>
