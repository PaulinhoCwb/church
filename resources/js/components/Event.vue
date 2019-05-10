<template>
    <div>
        <!-- <full-calendar :config="config" :events="events" @day-click="dayClick" @event-selected="eventSelected" /> -->
        <full-calendar ref="calendar" :config="config" :events="events" @event-created="eventCreated" @day-click="dayClick"
        @event-selected="eventSelected"  />
        <form @submit.prevent="createEvent" action="POST">
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
                                        <input type="text" class="form-control" v-model="form.event"
                                            placeholder="Titulo do Evento" name="evento" id="evento">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="description" v-model="form.description" class="form-control"
                                            placeholder="Descrição do evento" id="description" cols="30"
                                            rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" v-model="form.hour" name="hora"
                                            id="hora">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <compact :value="colors" @input="setColor" :palette="paleta"></compact>
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
        <button @click="renderEvent">
            Evento
        </button>
    </div>
</template>
<script>
    import moment from 'moment';
    import 'fullcalendar/dist/locale/pt-br'
    import { Compact } from 'vue-color'
    export default {
        name: 'event',
        components: {
            Compact
        },
        data() {
            return {
                events: [],
                config: {
                    // eventClick: (event) => {
                    //     console.log(event);
                    //     this.selected = event;
                    // },
                    locale: 'pt-br',
                    defaultView: 'month'
                },
                selected: {},
                paleta: [
                    '#3B9C00',
                    '#A80000',
                    '#B79891',
                    '#292E49',
                    '#BBD2C5',
                    '#86fde8',
                    '#FFE000',
                    '#00416A',
                    '#E4E5E6',
                    '#5433FF',
                    '#20BDFF',
                    '#334d50',
                ],
                form: new Form({
                    event: "",
                    description: "",
                    day: "",
                    hour: "",
                    color: ""
                }),
                colors: {
                    hex: '#000000'
                }
            }
        },
        methods: {
            getEvents () {
                axios.get('events')
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
                this.form.post('events').then((res) => {
                    this.events.push(res.data);
                    console.log(res.data);
                    
                    $('#event').modal('hide');
                })
                .catch((res) => {
                    toast({

                    });
                });
            },
            dayClick(date,jsEvent, view){
                this.form.day = date.format();
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
                this.selected = event;
            },
            eventCreated(...test) {
                console.log(test);
            },
            setColor(color) {
                this.form.color = color.hex;
            },
            renderEvent(){
                const evento = {
                    title  : 'event3',
                    start  : '2018-01-09T12:30:00',
                    allDay : false,
                };
                this.$refs.calendar.$emit('render-event',evento)
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

                console.log(eventos);
                
            },
        },
        mounted () {
            this.getEvents();
        }
    };

</script>
<style>
    @import '~fullcalendar/dist/fullcalendar.css';
</style>
