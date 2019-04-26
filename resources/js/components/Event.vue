<template>
    <div>
      <full-calendar :config="config" :events="events" @day-click="dayClick" @event-selected="eventSelected" />
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
                    <form @click="createEvent" action="POST">
                        <div class="form-row">

                        </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      <button type="button" class="btn btn-primary">Salvar</button>
                  </div>
              </div>
          </div>
      </div>
    </div>
</template>
<script>
    import moment from 'moment';
    import 'fullcalendar/dist/locale/pt-br'
    export default {
        name: 'event',
        data() {
            return {
                events: [{
                        id: 1,
                        title: 'event1',
                        start: moment().hours(12).minutes(0),
                    },
                    {
                        id: 2,
                        title: 'event2',
                        start: moment().add(-1, 'days'),
                        end: moment().add(1, 'days'),
                        allDay: true,
                    },
                    {
                        id: 3,
                        title: 'event3',
                        start: moment().add(2, 'days'),
                        end: moment().add(2, 'days').add(6, 'hours'),
                        allDay: false,
                    },
                ],
                config: {
                    eventClick: (event) => {
                        this.selected = event;
                    },
                    locale: 'pt-br',
                },
                selected: {},
            };
        },
        methods: {
            createEvent () {

            },
            dayClick(date,jsEvent, view){
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
                console.log(event);
            },
            eventCreated(...test) {
                console.log(test);
            },
        },
        computed: {
            eventSources() {
                const self = this;
                return [{
                    events(start, end, timezone, callback) {
                        setTimeout(() => {
                            callback(self.events.filter(() => Math.random() > 0.5));
                        }, 1000);
                    },
                }, ];
            },
        },
    };

</script>
<style>
    @import '~fullcalendar/dist/fullcalendar.css';

</style>
