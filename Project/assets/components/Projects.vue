<template>
    <section class="all_projects">
        <keep-alive>
            <sidebar></sidebar>
        </keep-alive>
        <div class="hidden-sm hidden-xs" id="particles-js"></div>
        <div class="container">
            <div class="row">

                <!-- ligne 1 -->

                <div class="large-project 1 col-lg-4">
                    <h2 class="text-center title">Space Invaders</h2>
                    <p class="text-right categories">Jeux</p>
                    <div class="hover-large 1"></div>
                </div>

                <div class="small-project 2 col-lg-2">
                    <h3 class="text-center title">Intégration Wordpress</h3>
                    <p class="text-right categories">Intégration</p>
                    <div class="hover-small 2"></div>
                </div>


                <div class="large-project 3 col-lg-4">
                    <h2 class="text-center title">Calory Days</h2>
                    <p class="text-right categories">Développement web</p>
                    <div class="hover-large 3"></div>
                </div>

                <div class="small-project 4 col-lg-2">
                    <h3 class="text-center title">Intégration Wordpress</h3>
                    <p class="text-right categories">Intégration</p>
                    <div class="hover-small 4"></div>
                </div>

                <!-- ligne 2 -->

                <div class="small-project 5 col-lg-2">
                    <h3 class="text-center title">Intégration Wordpress</h3>
                    <p class="text-right categories">Intégration</p>
                    <div class="hover-small 5"></div>
                </div>

                <div class="small-project 6 col-lg-2">
                    <h3 class="title text-center">Intégration Wordpress</h3>
                    <p class="text-right categories">Intégration</p>
                    <div class="hover-small 6"></div>
                </div>

                <div class="large-project 7 col-lg-4">
                    <h2 class="text-center title">Calory Days</h2>
                    <p class="text-right categories">Développement web</p>
                    <div class="hover-large 7"></div>
                </div>

                <div class="large-project 8 col-lg-4">
                    <h3 class="text-center title">Wordpress</h3>
                    <p class="text-right categories">Intégration</p>
                    <div class="large-small 8"></div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import store from '../store/ProjectsStore'
    import sidebar from '../components/Sidebar'
    export default {
        name: 'projects',
        data(){
            return {
                state: store.state
            }
        },
        computed: {
            allProjects: function() { return this.state.projectsjson}
        },
        created() {
          store.fetchAllProjects()
        },
        components: {
            sidebar
        }
      }
</script>
