<template>
    <div>
        <h3>September 2019</h3>
        <ul class="list-group">
            <li class="list-group-item"> <!-- list-group-item-success -->
                <div class="row">
                    <div class="col-md-3">
                        1 Sept
                    </div>
                    <div class="col-md-9">
                        this my new event
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: 'event-list',
        mounted() {
            if (this.events.length) {
                return;
            }

            this.$store.dispatch('getEvents');
        },
        computed: {
            events() {
                return this.$store.getters.events;
            }
        }
    }
</script>
