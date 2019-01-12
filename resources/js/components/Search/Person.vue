<template>
    <div class="col-md-4">
      <div class="small-box bg-info mt-2">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
    </div>
</template>

<script>
export default {
    name:'person',
    props:['nome','dataNascimento'],
    data() {
        return {
            
        }
    },
}
</script>
