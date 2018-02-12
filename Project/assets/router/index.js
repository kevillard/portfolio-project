import Vue from 'vue'
import Router from 'vue-router'
import Home from '../components/Home'
import Projects from '../components/Projects'
import Aboutme from '../components/Aboutme'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home,
      props: true
    },
    {
      path: '*',
        redirect: '/'
    },
    {
      path: '/projects',
      name: 'projects',
      component: Projects,
      props: true
    },
    {
      path: '/aboutme',
      name: 'about',
      component: Aboutme,
      props: true
}
  ]
})
