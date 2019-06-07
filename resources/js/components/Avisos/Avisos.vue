<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-header">
                        <div class="card-title">Cadastro de Avisos Paroquiais</div>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="createNews" method="POST">
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="">Aviso catequese</label>
                                    <input type="text" v-model="noticia.titulo" class="form-control" name="titulo" id="titulo">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="">Imagem</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" @change="uploadPhoto" name="photo" id="validatedCustomFile">
                                        <label class="custom-file-label" for="validatedCustomFile">Escolha uma foto...</label>
                                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="">Descrição</label>
                                    <textarea name="body" v-model="noticia.body" id="body" cols="30" rows="10"
                                        class="form-control"></textarea>
                                </div>
                            </div>
                            <button class="btn btn-dark float-right" type="submit">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "FormCatequese",
    data () {
        return {
             noticia: {
                    tipo: 2,
                    titulo: "",
                    body: "",
                    photo:""
                },
        }
    },
    methods: {
         createNews() {
                axios.post('news',this.noticia,{
                    headers: {
                        'Authorization': 'Bearer '+ window.sessionStorage.getItem('access_token')
                    }
                })
                .then((res) => {
                        if (res.data.id) {
                            this.form.reset();
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

            uploadPhoto (e) {
                console.log(e);
                let file = e.target.files[0];
                let reader = new FileReader();
                reader.onloadend = (file) => {
                    // console.log(reader.result);
                    this.noticia.photo = reader.result;
                }
                reader.readAsDataURL(file);
            }
    }
}
</script>

<style>

</style>
