<template>
    <div class="single">
        <ul class="parallax-window symbols-container">
            <li class="parallax-layer near_symbols"></li>
            <li class="parallax-layer symbols"></li>
            <li class="parallax-layer far_symbols"></li>
            <li class="parallax-layer more_far_symbols"></li>
        </ul>
        <div class="container-fluid content">
            <img class="d-block psd" src="assets/img/thierry-meier-219007.jpg" alt="PSD">
            <div class="text">
                <div class="single-header d-inline-block">
                    <h2 class="single-title">Space Invaders - ACS</h2>
                    <hr />
                </div>
                <img src="assets/img/work2.jpg" class="project logo d-inline-block" alt="Logo">
                <p class="single-content">Duis aute irure dolor in reprehenderit in nulla volptate velit easse neon cillum dolore eu fugiat nulla pariatur. Exceptur aute sint occaecat dolor cupidatat non proident.
                    Sed ut perspiciatis unde omnis iste natus error irure  aute sit voluatem accusantium doloremque.</p>
                <div class="gallery">
                    <p class="technologies"><strong>Technologies - HTML5/CSS3/Javascript</strong></p>
                    <p class="contributeurs"><strong>Créateurs - Charlie Moreau - Yohann Thorez - Kevin Villard</strong></p>
                    <img class="project hover-shadow" src="assets/img/work2.jpg" alt="img">
                    <img class="project hover-shadow" src="assets/img/work2.jpg" alt="img">
                    <img class="project hover-shadow" src="assets/img/work2.jpg" alt="img">
                    <img class="project hover-shadow" src="assets/img/work2.jpg" alt="img">
                    <img class="project hover-shadow" src="assets/img/work2.jpg" alt="img">
                    <img class="project hover-shadow" src="assets/img/work2.jpg" alt="img">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import store from '../store/ProjectsStore'
    import sidebar from '../components/Sidebar'
    export default {
        name: "single-project",
        data(){
            return {
                state: store.state,
                id: 1
            }
        },
        computed: {
            project: function() { return this.state.projectsjson}
        },
        created() {
            store.fetchProjectById(id)
            let tiltScript = document.createElement('script')
            let parallaxScript = document.createElement('script')
            tiltScript.setAttribute('src', 'assets/js/tilt.js')
            parallaxScript.setAttribute('src', 'assets/js/jquery.parallax.js')
            document.head.appendChild(tiltScript)
            document.head.appendChild(parallaxScript)
        },
        components: {
            sidebar
        }
    }
</script>