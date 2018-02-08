import Vue from 'vue'
import App from './app'

new Vue({
    el: '#app',
    template: '<App/>',
    data () {
        return {
            projectsjson: "",
        }
    },
    methods: {
        projects: function () {
            fetch('/api/projects').then(function (response) {
                const contentType = response.headers.get("content-type");
                response.headers.set("Authorization", "publickey");
                if (contentType && contentType.indexOf("application/json") !== -1) {
                    return response.json().then(data => {
                        this.projectsjson = data;
                        this.$nextTick();
                });
                }
            });
        }
    },
    components: { App }
})
