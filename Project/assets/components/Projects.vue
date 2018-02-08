<template>
<div class="projects">
    <button @click="fetchAllProjects">Les projets !</button>
    <h1>{{ allProjects }}</h1>
</div>
</template>

<script>
    import store from '../store/ProjectsStore'
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
        methods: {
            fetchAllProjects () {
                store.fetchAllProjects()
            }
        }
        }
</script>
