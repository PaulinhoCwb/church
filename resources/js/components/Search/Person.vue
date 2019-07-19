<template>
    <div class="col-md-4 mt-2">
      <div class="small-box bg-info">
              <div class="inner">
                <h5 class="text-wrap">{{ nome }}</h5>

                <p>{{ dataNascimento }}</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">Enviar email <i class="fa fa-arrow-circle-right"></i></a>
            </div>
    </div>
</template>

<script>
export default {
    name:'person',
    props:['nome','dataNascimento'],
}
</script>
