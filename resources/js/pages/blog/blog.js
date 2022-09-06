console.log("this is the blog js")


new Vue({
    el: "#blog_section",
    data: {
        opened_setting: null
    },
    methods: {
        openSetting(id){
            if(!this.opened_setting){
                this.opened_setting = id
            }
            else{
                this.opened_setting = this.opened_setting == id ? null : id;
            }
        },
    }
})