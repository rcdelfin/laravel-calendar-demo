<template>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="card card-default">
                    <div class="card-header">Events</div>

                    <div class="card-body">
                        <p>Form</p>

                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">Calendar</div>

                    <div class="card-body">
                        <h2>{{ welcome }}</h2>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'calendar-page',
        computed: {
            welcome() {
                return 'Calendar Demo Page'
            }
        }
    }
</script>
