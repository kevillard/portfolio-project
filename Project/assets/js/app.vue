<template>
      <div id="app">
          <router-view v-transition="false">
          </router-view>
      </div>
</template>

<script>
    import Projects from '../components/Projects'
    import Home from '../components/Home'
    import Loader from '../components/Loader'
    import Sidebar from '../components/Sidebar'

    export default {
        name: 'app',
        components: {
            Home,
            Projects,
            Loader,
            Sidebar
        }
    }
</script>
