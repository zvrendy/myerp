<<<<<<< HEAD
// require('./bootstrap');

import Vue from 'vue'
import App from './App.vue'
import {
    BootstrapVue,
    IconsPlugin
} from 'bootstrap-vue'
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

new Vue({
    el: '#daengweb',
    components: {
        'dw-app': App
    }
})
=======
require('./bootstrap');
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
