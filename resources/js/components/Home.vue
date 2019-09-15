<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Vue.JS SPA</div>

                    <div class="card-body">
                        <h2>{{ welcome }}</h2>

                        <router-link to="/calendar" class="nav-link">Goto Calendar</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'home',
        computed: {
            welcome() {
                return 'Calendar Demo'
            }
        }
    }
</script>
