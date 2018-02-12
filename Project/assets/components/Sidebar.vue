<template>
    <div id="sidebar">
    <nav class="navbar container">
        <a class="navbar-brand" href=""><img src="assets/img/logo_kalivins.svg" alt="Logo de Kalivins"><h1 class="title_page">{{ title }}</h1></a>
        <div id="nav-icon">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
        <div class="nav container-fluid">
            <ul class="navlist">
                <li class="nav-item">
                    <router-link class="nav-link" :to="{ name: 'home' }">Accueil</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" :to="{ name: 'projects' }">Projets</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" :to="{ name: 'about' }">A propos de moi</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" :to="{ name: 'blog' }">Blog</router-link>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        name: "sidebar",
        props: ['title'],
        data(){
            return {
                title: ""
            }
        }
    }
</script>
