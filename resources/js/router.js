import Vue from 'vue';

import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomeComponent from './pages/HomeComponent';
import SearchComponent from './pages/SearchComponent';
import RestaurantComponent from './pages/RestaurantComponent';
import CheckoutComponent from './pages/CheckoutComponent';

const router = new VueRouter({
    mode: 'history',
    routes: [
       {
            path: '/',
            name: 'home',
            component: HomeComponent
       },
       {
            path: '/search/:slug',
            name: 'search',
            component: SearchComponent
        },
        {
            path: '/menu',
            name: 'menu',
            component: RestaurantComponent
        },
        {
            path: '/checkout',
            name: 'checkout',
            component: CheckoutComponent
        },
    ]
});

export default router;