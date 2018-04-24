<template>
    <div>
    <div id="sidebar">
    <nav class="navbar container-fluid">
        <span class="navbar-brand">
          <img src="assets/img/logo_kalivins.svg" alt="Logo de Kalivins"><h1 transition="fadeLeft" class="title_page">{{ title }}</h1>
        </span>
        <div id="nav-icon">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
    </div>
    <div class="nav container-fluid">
        <ul class="navlist">
            <li class="nav-item">
                <router-link class="nav-link close" :to="{ name: 'home' }">Accueil</router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link close" :to="{ name: 'projects' }">Projets</router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link close" :to="{ name: 'about' }">A propos de moi</router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link close" :to="{ name: 'blog' }">Blog</router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link close" :to="{ name: 'contact' }">Contact</router-link>
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