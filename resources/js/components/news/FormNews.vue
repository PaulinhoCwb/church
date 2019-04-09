<template>
    <div>
        <div class="row justify-content-center">
            <p id="nada"></p>
            <div class="col-12">
                <form action="" method="post">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="">Titulo da Noticia</label>
                            <input type="text" class="form-control" name="news_title" id="news_title">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="">Categoria</label>
                            <input type="text" class="form-control" name="categoria" id="categoria">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="">Descrição</label>
                            <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
                        </div>
                    </div>
                    <button class="btn btn-dark float-right" type="submit">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import Editor from '@tinymce/tinymce-vue'
export default {
    name: 'intentions',
    components: {
        'editor': Editor
    },
    // data() {
    //     return {
    //         editor: ClassicEditor,
    //         editorData: '',
    //         editorConfig: {
               
    //         }
    //     };
    // },
    mounted () {
    
    }
    
}
</script>

<style>

</style>
