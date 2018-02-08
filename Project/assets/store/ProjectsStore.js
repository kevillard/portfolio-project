class ProjectsStore {
    constructor() {
        this.state = {
            projectsjson: ''
        }
    }

    fetchAllProjects() {
        var self = this
        var init = { method: 'POST',
                     headers: new Headers({
                         "Authorization": "publickey"
                     }),
                     mode: 'cors',
                     cache: 'default' }

        fetch('/api/projects', init).then(function (response) {
            const contentType = response.headers.get("content-type");
            if (contentType && contentType.indexOf("application/json") !== -1) {
                return response.json().then(data => {
                    console.log('coucou'+data)
                    self.state.projectsjson = data
            })
            }
        })
    }
}

export default new ProjectsStore()