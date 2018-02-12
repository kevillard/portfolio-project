<template>
<div class="video_background">
    <video playsinline autoplay muted loop poster="assets/img/poster_video.jpg" id="bgvid">
        <source src="assets/video/header.mp4" type="video/mp4">
    </video>
    <div class="grain"></div>
</div>
</template>

<script>
    export default {
        name: "video"
    }
</script>