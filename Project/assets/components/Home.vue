<template>
    <div class="home">
        <header>
            <sidebar v-bind:title="Test"></sidebar>
            <div class="container contenu">
                <div class="col-lg-9 text-center">
                    <span class="title">Kevin Villard, Développeur Web</span><br />
                    <span class="sous_title">Les pieds sur terre, la tête dans les étoiles</span>
                </div>
            </div>
            <div class="text-center">
                <a href="/#/projects" class="btn btn-lg">Mes Projets</a>
            </div>
        </header>
        <videobackground></videobackground>
    </div>
</template>

<script>
import sidebar from '../components/Sidebar'
import videobackground from '../components/VideoBackground'

    export default {
        name: "home",
        components: {
            sidebar,
            videobackground
        }
    }
</script>
