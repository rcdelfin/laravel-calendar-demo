<template>
    <div>
        <form v-on:submit.prevent="onSubmit">
            <div class="form-group">
                <label for="title">Event</label>
                <input type="text" class="form-control" id="title" v-model="form.title">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="fromDate">From</label>
                    <input type="text" class="form-control" id="fromDate" v-model="form.fromDate">
                </div>
                <div class="col-md-6">
                    <label for="toDate">To</label>
                    <input type="text" class="form-control" id="toDate" v-model="form.toDate">
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
    export default {
        name: 'event-form',
        data() {
            return {
                form:{
                    id: null,
                    title: '',
                    fromDate: '',
                    toDate: '',
                    days:[]
                },
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
        computed: {
        },
        method: {
            onSubmit() {
                alert("Submitted")
            }
        }
    }
</script>
