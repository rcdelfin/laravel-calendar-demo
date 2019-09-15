<template>
    <div id="main">
        <Header/>
        <main id="container-fluid">
            <router-view></router-view>
        </main>
    </div>
</template>

<script>
    import Header from './Header.vue';

    export default {
        name: 'main-app',
        components: {Header}
    }
</script>
