<template>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <router-link class="navbar-brand" to="/">&nbsp;</router-link>
        </div>

        <Slide>
            <router-link class="navbar-brand" to="/calendar">Calendar</router-link>
        </Slide>
    </nav>
</template>

<script>
  import { Slide } from 'vue-burger-menu'  // import the CSS transitions you wish to use, in this case we are using `Slide`

  export default {
    name: 'slider-menu',
    components: {
        Slide // Register your component
    }
  }
</script>
