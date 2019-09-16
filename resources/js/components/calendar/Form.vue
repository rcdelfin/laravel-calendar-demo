<template>
    <div>
        <notifications group="calendar" position="top right" />
        <form v-on:submit.prevent="onSubmit">
            <div class="form-group">
                <label for="title">Event</label>
                <input type="text" class="form-control" id="title" v-model="form.title">

                <span class="help is-danger" v-if="form.errors.has('title')" v-text="form.errors.get('title')"></span>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="fromDate">From</label>
                    <v2-datepicker id="fromDate" lang="en" format="yyyy-DD-MM" v-model="form.fromDate"></v2-datepicker>

                    <span class="help is-danger" v-if="form.errors.has('fromDate')" v-text="form.errors.get('fromDate')"></span>
                </div>
                <div class="col-md-6">
                    <label for="toDate">To</label>
                    <v2-datepicker id="toDate" lang="en" format="yyyy-DD-MM" v-model="form.toDate"></v2-datepicker>

                    <span class="help is-danger" v-if="form.errors.has('toDate')" v-text="form.errors.get('toDate')"></span>
                </div>
            </div>

            <div class="clearfix">&nbsp;</div>

            <div class="form-check form-check-inline" v-for="day in days">
                <input class="form-check-input" type="checkbox" :id="day.label" name="days" :value="day.key" v-model="form.days">
                <label class="form-check-label" :for="day.label">{{day.label}}</label>
            </div>

            <div class="clearfix">&nbsp;</div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
    import { Form } from '~/helpers/form.js';

    export default {
        name: 'event-form',
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
                        this.$store.dispatch('getEvents');
                    });
                } else {
                    this.form.post('/api/events', false)
                    .then(response => {
                        this.$notify({
                          group: 'calendar',
                          title: 'Info',
                          text: 'New Event create: ' + this.$data.form.title
                        });
                        this.$store.dispatch('getEvents');
                    });
                }
            },
        }
    }
</script>
