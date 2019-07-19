<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header"> {{ title }} - {{ event.day }} </div>
                <div class="card-body">
                    <form @submit.prevent="EditEvent">
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
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text"  v-mask="'##/##/####'" v-model="event.day" class="form-control">
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
import moment from 'moment'
import {mask} from 'vue-the-mask'
    export default {
        name: "EventEdit", 
        directives: {mask},
        data () {
            return {
                event:{
                    event: "",
                    description: "",
                    day: "",
                    hour: "",
                    color: ""
                },
                title: "Edição de Eventos"
            }
        },
        methods: {
             EditEvent () {
               axios.put('events/'+this.$route.params.id,this.event,{
                    headers: {
                        Authorization: 'Bearer '+ window.sessionStorage.getItem('access_token')
                    }
                })
                .then((res) => {
                    
                    this.limpaForm();
                   
                })
                .catch((res) => {
                    toast({
                        type: 'error',
                        title: 'Erro ao carregar dados'
                    });
                });
            },
            getEvent () {
                let id = this.$route.params.id;
                axios.get(`events/${id}`,{
                    headers: {
                        Authorization: 'Bearer '+window.sessionStorage.getItem('access_token')
                    }
                })
                .then(response => {
                    this.event = response.data;
                    this.event.day = this.dateToBR(response.data.day); 
                })
                .catch(response => {
                    toast({
                        type: 'error',
                        title: 'Erro no servidor'
                    });
                });
            },
            dateToBR (value) {
                return moment(value).format('DD/MM/YYYY');
            }
        },
        mounted () {
            this.getEvent();
        }
    }

</script>

<style>

</style>
