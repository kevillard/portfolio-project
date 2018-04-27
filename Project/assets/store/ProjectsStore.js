import axios from 'axios'

class ProjectsStore {
    constructor() {
        this.state = {
            projectsjson: '',
            errors: []
        }
    }

    fetchAllProjects() {
        var self = this
        var init = { method: 'POST',
                     url: "/api/projects",
                     headers: {
                         "Authorization": "public"
                     },
                     mode: 'cors',
                     cache: 'default' }

        axios(init).then(response => {
                    self.state.projectsjson = response.data
            })
            .catch(e => {
              self.state.errors.push(e)
            })
    }
    fetchProjectById(id) {
        var self = this
        var init = { method: 'POST',
                     url: "/api/project/"+id,
                     headers: {
                         "Authorization": "public"
                     },
                     mode: 'cors',
                     cache: 'default' };
        axios(init).then(response =>{
                    self.state.projectsjson = response.data
        })
        .catch(e => {
            self.state.errors.push(e)
        })
    }
}

export default new ProjectsStore()
