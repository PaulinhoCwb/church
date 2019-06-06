<template>
    <div>
        <full-calendar ref="calendar" :config="config" :events="events" @day-click="dayClick"
        @event-selected="eventSelected"/>
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
           
            dayClick(date,jsEvent, view){
                this.event.day = date.format();
                this.$router.push(`/event/create/${this.event.day}`);
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
