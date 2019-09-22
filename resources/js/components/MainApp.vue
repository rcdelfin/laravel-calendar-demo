<template>
    <div id="main">
        <SlideMenu/>
        <main id="page-wrap">
            <router-view></router-view>
        </main>
    </div>
</template>

<script>
    import Header from './Header.vue';
    import SlideMenu from './SlideMenu.vue';

    export default {
        name: 'main-app',
        components: {Header, SlideMenu}
    }
</script>
