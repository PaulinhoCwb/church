<template>
    <div>
        <div class="col-md-12">
            <!-- Box Comment -->
            <div class="card card-widget">
              <div class="card-header">
                <div class="user-block">
                  <span class="username">{{ event.title }}</span>
                  <span class="description">Criado por - {{ event.id }}</span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Mark as read">
                    <i class="fa fa-circle-o"></i></button>
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- post text -->
                <p>{{ event.description }}</p>

                <!-- Social sharing buttons -->
                <button type="button" @click="deleteEvent(event.id)" class="btn btn-default btn-sm"><i class="fa fa-share"></i> Editar</button>
                <button type="button" @click="UpdateEvent(event.id)" class="btn btn-default btn-sm"><i class="fa fa-thumbs-o-up"></i> Excluir</button>
                <span class="float-right text-muted">Inicio {{ event.start | dateToBR }} - Fim {{ event.end | dateToBR }}</span>
              </div>
              <!-- /.card-body -->
              <div class="card-footer card-comments">
                <div class="card-comment">

                  <div class="comment-text">
                    <span class="username">
                      Maria Gonzales
                      <span class="text-muted float-right">8:03 PM Today</span>
                    </span><!-- /.username -->
                    It is a long established fact that a reader will be distracted
                    by the readable content of a page when looking at its layout.
                  </div>
                  <!-- /.comment-text -->
                </div>
               
              </div>
              <!-- /.card-footer -->
              <div class="card-footer">
                
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
    </div>
</template>

<script>
export default {
    name: "ViewEvent",
    data () {
        return {
            event: {}
        }
    },
    methods: {
        getEvent () {
            axios.get('events/'+this.$route.params.id,{
                headers: {
                    Authorization: "Bearer "+ window.sessionStorage.getItem('access_token')
                }
            })
            .then( res => {
              console.log(res);
                this.event = res.data.data;
            })
            .catch( res => {
                toast({
                    type: 'error',
                    title: "Evento não existe"
                });
            });
        },
        deleteEvent (id) {
          axios.delete('events/'+id,{
            headers: {
              Authorization: "Bearer "+ window.sessionStorage.getItem('access_token')
            }
          })
          .then( res => {
            if (res.data.deleted) {
              toast({
                type: "success",
                title: "Operação realizada com successo."
              });
            } else {
              toast({
                type: "error",
                title: "Operação não pode ser concluida!!!"
              });
            }
          })
        }
    },
    created () {
      this.getEvent();
    }
}
</script>

<style>

</style>
