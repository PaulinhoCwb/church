<template>
    <div>
        <div class="row justify-content-center">
            <p id="nada"></p>
            <div class="col-12">
                <form @submit.prevent="createNews"  method="POST">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="">Titulo da Noticia</label>
                            <input type="text" v-model="form.titulo" class="form-control" name="titulo" id="titulo">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="">Categoria</label>
                            <input type="text" v-model="form.tipo" class="form-control" name="tipo" id="tipo">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="">Descrição</label>
                            <textarea name="body" v-model="form.body" id="body" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <button class="btn btn-dark float-right" type="submit">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'intentions',
    data () {
        return {
            form: new Form({
                tipo: "",
                titulo: "",
                body:"",
                user_id: 2
            }),
            news: [],
            pagination: {}
        }
    },
    methods: {
        createNews () {
            this.form.post('news')
            .then((res) => {
                if (res.data.id) {
                    this.form.clear();
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
                toast({
                    type: 'error',
                    title: 'Operação não pode ser concluida'
                });
            });
        },

        getNews (pageUrl) {
            let vm = this;

            pageUrl = pageUrl || 'news';

            axios.get(pageUrl)
            .then((res)=> {
                this.news = res.data.data;
                vm.makePagination(res.data.meta,res.data.links)
            }).catch((res) => {
                toast({
                    type: 'error',
                    title: 'Operação não pode ser concluida'
                });
            });
        },

        makePagination(meta, links) {
            let pagination = {
                current_page: meta.current_page,
                last_page: meta.last_page,
                next_page_url: links.next,
                prev_page_url: links.prev
            };
            this.pagination = pagination;
        }
    }
}
</script>

<style>

</style>
