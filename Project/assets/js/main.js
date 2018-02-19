import Vue from 'vue'
import VueRouter from 'vue-router'
import router from '../router/'
import App from './app'
import vueg from 'vueg'
import VueHotkey from 'v-hotkey'
import Transitions from 'vue2-transitions'
import 'vue-animate/dist/vue-animate.min.css'
import 'vueg/css/transition-min.css'


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

$('#nav-icon').click(function(){
    $(this).toggleClass('open')
    $('.nav').toggleClass('open')
    $('.nav-link').toggleClass('open')
})
