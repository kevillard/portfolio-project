<template>
      <div id="app">
          <Loader></Loader>
          <fade-transition>
              <router-view>
              </router-view>
          </fade-transition>
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
