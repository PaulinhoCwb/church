<template>
    <div>
        <div class="col-md-12">
            <!-- Box Comment -->
            <div class="card card-widget">
              <div class="card-header">
                <template v-if="event.user.name">
                  <div class="user-block">
                    <span class="username">{{ event.title }}</span>
                    <span class="description">Criado por - {{ event.user.name }}</span>
                  </div>
                </template>
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
                <button type="button" @click="updateEvent(event.id)" class="btn btn-default btn-sm"><i class="fa fa-share"></i> Editar</button>
                <button type="button" @click="deleteEvent(event.id)" class="btn btn-default btn-sm"><i class="fa fa-trash"></i> Excluir</button>
                <span class="float-right text-muted">Inicio {{ event.hour | hourToBR }}</span>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
    </div>
</template>

<script>
import moment from 'moment'
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
                this.event = res.data;
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
              this.$router.push('/event');
            } else {
              toast({
                type: "error",
                title: "Operação não pode ser concluida!!!"
              });
            }
          })
        },
        updateEvent (id) {
          this.$router.push(`/event/edit/${id}`);
        }
    },
    mounted () {
      this.getEvent();
    },
    filters:{
        hourToBR (data) {
            return moment(data,'HH:mm:ss').format('HH:mm');
        }
    }
}
</script>

<style>

</style>
