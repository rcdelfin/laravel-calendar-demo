require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import {routes} from './routes';
import StoreData from './store';
import MainApp from './components/MainApp.vue';
import { initialize } from './helpers/general';

import 'v2-datepicker/lib/index.css';   // v2 need to improt css
import V2Datepicker from 'v2-datepicker';
import Notifications from 'vue-notification';

Vue.use(VueRouter);
Vue.use(Vuex);

Vue.use(V2Datepicker);
Vue.use(Notifications);

const store = new Vuex.Store(StoreData);

const router = new VueRouter({
    routes,
    mode: 'history'
});

initialize(store, router);

const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
        MainApp
    }
});
