<template>
    <div>
        <notifications group="calendar" position="top right" />
        <form v-on:submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
            <div class="form-group">
                <label for="title">Event</label>
                <input type="text" class="form-control" id="title" name="title" v-model="form.title">

                <p class="text-danger" v-if="form.errors.has('title')" v-text="form.errors.get('title')"></p>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fromDate">From</label>
                        <flat-pickr id="fromDate" name="fromDate" class="form-control" placeholder="Start date" @change="form.errors.clear('fromDate')" v-model="form.fromDate"></flat-pickr>

                        <p class="text-danger" v-if="form.errors.has('fromDate')" v-text="form.errors.get('fromDate')"></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="toDate">To</label>
                        <flat-pickr id="toDate" name="toDate" class="form-control" placeholder="End date" @change="form.errors.clear('toDate')" v-model="form.toDate"></flat-pickr>

                        <p class="text-danger" v-if="form.errors.has('toDate')" v-text="form.errors.get('toDate')"></p>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="form-check form-check-inline" v-for="day in days">
                    <input class="form-check-input" type="checkbox" :id="day.label" name="days" :value="day.key" @click="form.errors.clear('days')" v-model="form.days">
                    <label class="form-check-label" :for="day.label">{{day.label}}</label>
                </div>
                <p class="text-danger clearfix" v-if="form.errors.has('days')" v-text="form.errors.get('days')"></p>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
    import flatPickr from 'vue-flatpickr-component';
    import 'flatpickr/dist/flatpickr.css';

    import { Form } from '~/helpers/form.js';

    export default {
        name: 'event-form',
        components: {
          flatPickr
        },
        data() {
            return {
                form: new Form({
                    id: null,
                    title: '',
                    fromDate: '',
                    toDate: '',
                    days: []
                }),
                days: [
                    {key: 0, label: 'Sun'},
                    {key: 1, label: 'Mon'},
                    {key: 2, label: 'Tue'},
                    {key: 3, label: 'Wed'},
                    {key: 4, label: 'Thu'},
                    {key: 5, label: 'Fri'},
                    {key: 6, label: 'Sat'},
                ]
            }
        },
        created() {
        },
        computed: {
        },
        methods: {
            onSubmit() {
                if (this.form.id) {
                    this.form.put('/api/events/' + this.form.id, false)
                    .then(response => {
                        this.$notify({
                          group: 'calendar',
                          title: 'Info',
                          text: 'Event update: ' + this.$data.form.title
                        });

                        // Get current event from API
                        this.$store.dispatch('getCurrentEvent', this.form.id);
                    });
                } else {
                    this.form.post('/api/events', false)
                    .then(response => {
                        this.$notify({
                          group: 'calendar',
                          title: 'Info',
                          text: 'New Event create: ' + this.$data.form.title
                        });

                        // Get current event from API
                        this.$store.dispatch('getCurrentEvent', this.form.id);
                    });
                }
            },
        }
    }
</script>
