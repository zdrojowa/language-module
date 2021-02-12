import Vue from 'vue';
import {BootstrapVue, BootstrapVueIcons, IconsPlugin} from 'bootstrap-vue';
import VueRouter from 'vue-router'
import Index from './components/Index'
import Language from './components/Language'

window.axios = require('axios');

Vue.use(BootstrapVue)
Vue.use(BootstrapVueIcons)
Vue.use(VueRouter)

const app = document.getElementById('app');

new Vue({
    components: {Index, Language}
}).$mount(app);
