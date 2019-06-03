<template>
    <div>
        <full-calendar ref="calendar" :config="config" :events="events" @day-click="dayClick"
        @event-selected="eventSelected"/>
        <form @submit.prevent="createEvent">
            <div class="modal" id="event" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Cadastro de Eventos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
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
                                        <input type="text"  v-mask="'##:##'" class="form-control" v-model="event.hour" name="hora"
                                            id="hora" placeholder="Horario de inicio do evento">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    import moment from 'moment';
    import 'fullcalendar/dist/locale/pt-br'
    import {mask} from 'vue-the-mask'
    export default {
        name: 'event',
        directives: {mask},
        data() {
            return {
                events: [],
                config: {
                    // eventClick: (event) => {
                    //     console.log(event);
                    //     this.selected = event;
                    // },
                    // eventMouseover(event,el) {
                    //     console.log(el);
                        
                    //    $('a.fc-day-grid-event').on('show.bs.popover', function(){
                    //         alert('The popover is about to be shown.');
                    //     });
                    // },
                    // eventRender (info,el) {
                    //     console.log(el);
                    //     // $(el).on('show.bs.popover', function(){
                    //     //     alert('The popover is about to be shown.');
                    //     // });
                    // },
                    locale: 'pt-br',
                    defaultView: 'month'
                },
                selected: {},
                event:{
                    event: "",
                    description: "",
                    day: "",
                    hour: "",
                    color: "#000000"
                },
            }
        },
        methods: {
            getEvents () {
                axios.get('events',{
                    headers: {
                        Authorization: 'Bearer '+ window.sessionStorage.getItem('access_token')
                    }
                })
                .then((res) => {
                    this.events = res.data.data;
                })
                .catch((res) => {
                    toast({
                        type: 'error',
                        title: 'Erro ao carregar dados'
                    });
                });
            },
            createEvent () {
               axios.post('events',this.event,{
                    headers: {
                        Authorization: 'Bearer '+ window.sessionStorage.getItem('access_token')
                    }
                })
                .then((res) => {
                    this.events.push(res.data);
                    this.limpaForm();
                    $('#event').modal('hide');
                })
                .catch((res) => {
                    toast({
                        type: 'error',
                        title: 'Erro ao carregar dados'
                    });
                });
            },
            dayClick(date,jsEvent, view){
                this.event.day = date.format();
                $('#event').modal('show');
            },
            refreshEvents() {
                this.$refs.calendar.$emit('refetch-events');
            },
            removeEvent() {
                this.$refs.calendar.$emit('remove-event', this.selected);
                this.selected = {};
            },
            eventSelected(event) {
                if (event.id) {
                    this.$router.push({ name: 'event.view', params: { id: event.id } });
                }
            },
            eventCreated(...test) {
                console.log(test);
            },
            limpaForm () {
                for (const field in this.event) {
                    this.event[field] = "";
                }
            }
            
        },
        computed: {
            eventSources() {
                const self = this;
                const eventos = [{
                    events(start, end, timezone, callback) {
                        setTimeout(() => {
                            callback(self.events.filter(() => Math.random() > 0.5));
                        }, 1000);
                    },
                }, ];
            },
        },
        created () {
            this.getEvents();
        }
    };

</script>
<style>
    @import '~fullcalendar/dist/fullcalendar.css';
</style>
