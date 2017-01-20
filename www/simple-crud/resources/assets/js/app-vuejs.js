/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Form from "./classes/Form.js";

Vue.component('notification', require('./components/Notification.vue'));

const app = new Vue({
    el: '#app',
    data: {
        posts: [],
        form: new Form({
            slug: '',
            title: '',
            body: '',
        })
    },
    methods: {
        onSubmit: function () {
            this.form.post('/posts/vuejs')
                .then(response => {console.log(response); this.getAllPosts();})
                .catch(errors => console.log(errors))
        },

        getAllPosts: function () {
            axios.get('/posts/vuejs/get/all')
                .then(response => {
                    this.posts = response.data;
                    console.log(response.data);
                })
                .catch(response => {
                    console.log(response);
                });
        }
    },

    created: function(){
        this.getAllPosts();
    }
});



