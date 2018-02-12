<template>
<div class="projects">
    <h1>{{ Aboutme }}</h1>
</div>
</template>

<script>
    import store from '../store/AboutMeStore'
    export default {
        name: 'About',
        data(){
            return {
                state: store.state
            }
        },
        computed: {
            Aboutme: function() { return this.state.me}
        },
        created() {
          store.fetchMe()
        }
      }
</script>
