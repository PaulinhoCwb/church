<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header"> {{ title }} - {{ this.$route.params.date | dateToBR}} </div>
                <div class="card-body">
                    <form @submit.prevent="createEvent">
                        <div class="form-row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" v-model="event.event"
                                        placeholder="Titulo do Evento" name="evento" id="evento">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea name="description" v-model="event.description" class="form-control"
                                        placeholder="Descrição do evento" id="description" cols="30"
                                        rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" v-mask="'##:##'" class="form-control" v-model="event.hour"
                                        name="hora" id="hora" placeholder="Horario de inicio do evento">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mask} from 'vue-the-mask'
    export default {
        name: "EventForm", 
        directives: {mask},
        data () {
            return {
                event:{
                    event: "",
                    description: "",
                    day: this.$route.params.date,
                    hour: "",
                    color: "#000000"
                },
                title: "Cadastro de Eventos"
            }
        },
        methods: {
             createEvent () {
               axios.post('events',this.event,{
                    headers: {
                        Authorization: 'Bearer '+ window.sessionStorage.getItem('access_token')
                    }
                })
                .then((res) => {
                    toast({
                        type: "success",
                        title: "Evento Cadastrado com sucesso!!!"
                    });
                   this.$router.push('/event');
                })
                .catch((res) => {
                    toast({
                        type: 'error',
                        title: 'Erro ao cadastrar evento!'
                    });
                });
            },
        }
    }

</script>

<style>

</style>
