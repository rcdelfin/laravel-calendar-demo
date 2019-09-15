<template>
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">Calendar</div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <event-form/>
                    </div>
                    <div class="col-md-8">
                        <event-list/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import EventForm from './Form.vue';
    import EventList from './List.vue';

    export default {
        name: 'calendar-page',
        components: {EventForm, EventList}
    }
</script>
