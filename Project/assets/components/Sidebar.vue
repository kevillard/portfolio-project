<template>
    <div id="sidebar">
    <nav class="navbar container">
        <span class="navbar-brand">
          <img src="assets/img/logo_kalivins.svg" alt="Logo de Kalivins"><h1 transition="fadeLeft" class="title_page">{{ title }}</h1>
        </span>
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
    }
</script>
