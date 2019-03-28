<template>
    <div>
        <div class="row justify-content-center">
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
                            <label for="">Descrião</label>
                            <textarea name="descricao" class="form-control" id="descricao" cols="30" rows="10"></textarea>
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
    name: 'intentions'
}
</script>

<style>

</style>
