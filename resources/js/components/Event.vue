<template>
    <full-calendar :config="config" :events="events"/>
</template>
<script>
	import moment from 'moment';
	export default {
  name: 'event',
  data() {
    return {
      events: [
        {
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
      },
      selected: {},
    };
  },
  methods: {
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
  },
  computed: {
    eventSources() {
      const self = this;
      return [
        {
          events(start, end, timezone, callback) {
            setTimeout(() => {
              callback(self.events.filter(() => Math.random() > 0.5));
            }, 1000);
          },
        },
      ];
    },
  },
};
</script>
<style>
@import '~fullcalendar/dist/fullcalendar.css';

</style>