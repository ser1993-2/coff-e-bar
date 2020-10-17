

import Vue from 'vue'
import VueRouter from 'vue-router'
import axios from 'axios'
import VueAxios from 'vue-axios'

import HeaderMain from './components/Header.vue'
import Bars from './components/bar/Bars.vue'
import Bar from './components/bar/Bar.vue'

import Drinks from './components/drink/Drinks.vue'
import Drink from './components/drink/Drink.vue'

import Storages from './components/storage/Storages.vue'
import Storage from './components/storage/Storage.vue'

import Consumables from './components/consumables/Consumables.vue'
import Consumable from './components/consumables/Consumable.vue'

import Audit from './components/audit/Audit.vue'


Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        { path: '/', redirect: '/bars/'},

        { path: '/bars/', component: Bars},
        { path: '/bars/:id', component: Bar},

        { path: '/drinks/', component: Drinks},
        { path: '/drinks/:id', component: Drink},

        { path: '/storages/', component: Storages},
        { path: '/storages/:id', component: Storage},

        { path: '/consumables/', component: Consumables},
        { path: '/consumables/:id', component: Consumable},

        { path: '/audit/', component: Audit},

    ]
});

Object.defineProperty(Vue.prototype,"$bus",{
    get: function() {
        return this.$root.bus;
    }
});


window.Vue = new Vue(Vue.util.extend({
    router,
    data: {
        bus: new Vue({})
    },
    components: {
        HeaderMain
    },
    template: `<div>
        <header-main></header-main>
        <router-view></router-view>
    </div>`,

})).$mount('#app');



