<template>
    <div>
        <h3>September 2019</h3>
        <ul class="list-group">
            <li class="list-group-item" v-for="item in calendarEvents" v-bind:class="{ 'list-group-item-success': item.isEvent }">
                <div class="row">
                    <div class="col-md-3">
                        {{item.label}}
                    </div>
                    <div class="col-md-9">
                        <span>{{item.title}}</span>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    import moment from 'moment';

    export default {
        name: 'event-list',
        computed: {
            events() {
                return this.$store.getters.events;
            },
            currentEvent() {
                return this.$store.getters.currentEvent;
            },
            calendarEvents() {
                // Get current month
                const monthNum = moment().format('MM');

                // Get days count of the month
                var count =  moment().daysInMonth();
                var events = [];
                for (var i = 1; i < (count + 1); i++) {
                    let today = (new Date().getFullYear()) + '-' + monthNum + '-' + ((i <= 9) ? ('0' + i) : i);
                    today = moment(today).format();
                    const dayStr = moment(today).format('ddd');

                    events.push({label: i + ' ' + dayStr, isEvent: false});
                }

                if (this.$store.getters.currentEvent.events === undefined) {
                    return events;
                }

                return this.$store.getters.currentEvent.events;
            }
        }
    }
</script>
