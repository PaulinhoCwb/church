<template>
    <div>
        <div class="row justify-content-center">
            <p id="nada"></p>
            <div class="col-12">
                <form @submit.prevent="createNews" method="POST">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="">Titulo da Noticia</label>
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
</template>

<script>
export default {

}
</script>

<style>

</style>
