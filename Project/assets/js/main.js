import Vue from 'vue'
import VueRouter from 'vue-router'
import Loader from '../components/Loader.vue'
import router from '../router/'
import App from './app'
import vueg from 'vueg'
import VueHotkey from 'v-hotkey'
import Transitions from 'vue2-transitions'
import 'vueg/css/transition-min.css'
import 'particles.js'

Vue.component('Loader', Loader)
Vue.use(VueRouter)
Vue.use(vueg, router)
Vue.use(VueHotkey)
Vue.use(Transitions)

let vm = new Vue({
    el: '#app',
    router,
    template: '<App/>',
    components: { App },
})
