<template>
    <div id="app">
        <home></home>
        <projects></projects>
    </div>
</template>

<script>
    import Projects from '../components/Projects'
    import Home from '../components/Home'

    export default {
        name: 'app',
        components: {
            Home,
            Projects
        }
    }
</script>
