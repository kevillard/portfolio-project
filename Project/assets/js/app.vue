<template>
      <div id="app">
        <Sidebar title="alivins projects"></Sidebar>
          <fade-transition>
              <router-view>
              </router-view>
          </fade-transition>
      </div>
</template>

<script>
    import Projects from '../components/Projects'
    import Home from '../components/Home'
    import Sidebar from '../components/Sidebar'

    export default {
        name: 'app',
        data(){
          return {
              sidetitle: ''
          }
        },
        components: {
            Home,
            Projects,
            Sidebar
        },
        computed: {
          	project: function() {
            	return this.$route.path.indexOf('/projects') == 0;
            }
          }
        }
</script>
