import Vue from 'vue'
import VueRouter from 'vue-router'
import Loader from '../components/Loader.vue'
import router from '../router/'
import App from './app'
import vueg from 'vueg'
import 'vueg/css/transition-min.css'

Vue.use(VueRouter)
Vue.component('Loader', Loader)
Vue.use(vueg, router)

let vm = new Vue({
    el: '#app',
    router,
    template: '<App/>',
    components: { App },
})
