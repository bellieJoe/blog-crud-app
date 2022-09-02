
new Vue({
    el: "#sign_in_section",
    data: {
        is_password_hidden: true
    },
    methods: {
        toggle_password() {
            this.is_password_hidden = this.is_password_hidden ? false : true
        }
    }
})