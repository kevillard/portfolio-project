import axios from 'axios'

class AboutMeStore {
    constructor() {
        this.state = {
            me: ''
        }
    }

    fetchMe() {
        var self = this
        var init = { method: 'POST',
                     url: "/api/aboutme",
                     headers: {
                         "Authorization": "public"
                     },
                     mode: 'cors',
                     cache: 'default' }

        axios(init).then(response => {
                    self.state.me = response.data
            })
    }
}

export default new AboutMeStore()
