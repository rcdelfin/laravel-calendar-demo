import Home from '~/components/Home.vue';
import Login from './components/auth/Login.vue';
import Register from './components/auth/Register.vue';

import Calendar from './components/calendar/Index.vue';

export const routes = [
    {
        path: '/',
        component: Calendar, // Home,
        // meta: { requiresAuth: true }
    },
    {
        path: '/login',
        component: Login
    },
    {
        path: '/register',
        component: Register
    },
    {
        path: '/calendar',
        component: Calendar
    }
];
