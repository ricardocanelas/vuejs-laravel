<template>
    <div>

        <h3 class="title is-3">Edit Post # {{ $route.params.id }}</h3>

        <!-- Loading -->
        <div class="loading" v-if="status.loading">Loading...</div>

        <!-- Notification -->
        <div class="notification is-warning" v-if="status.updated">
            {{ status.message }}<br/>
            <router-link to="/posts" class="button is-primary">Close</router-link>
        </div>


        <!-- Edit Form -->
        <div v-if="status.edit">

            <div class="notification is-warning" v-if="form.errors.any() ">
                <button class="delete" @click="form.errors.clear()"></button>
                <ul>
                    <li v-for="error in form.errors.getAll()">{{ error[0] }}</li>
                </ul>
            </div>

            <form method="POST" @submit.prevent='onSubmit' @keydown='form.errors.clear($event.target.name)'>

                <div class="control">
                    <label for="title" class="label">Title</label>
                    <input type="text" id="title" name="title" class="input" v-model="form.title">
                    <span class="help is-danger" v-text="form.errors.get('title')" v-if="form.errors.has('title')"></span>
                </div>

                <div class="control">
                    <label for="excerpt" class="label">Excerpt</label>
                    <input type="text" id="excerpt" name="excerpt" class="input" v-model="form.excerpt">
                    <span class="help is-danger" v-text="form.errors.get('excerpt')" v-if="form.errors.has('excerpt')"></span>
                </div>

                <div class="control">
                    <label for="body" class="label">Body</label>
                    <textarea type="text" id="body" name="body" class="textarea" v-model="form.body"></textarea>
                    <span class="help is-danger" v-text="form.errors.get('body')" v-if="form.errors.has('body')"></span>
                </div>

                <div class="control">
                    <button class="button is-primary" :disabled="form.errors.any()">Save</button>
                    <router-link to="/posts" activeClass=" " class="button is-primary">Cancel</router-link>
                </div>

            </form>

        </div>



    </div>
</template>

<script>
    import Form from "./../../classes/Form.js";

    export default{
        data(){
            return{
                status:{
                    loading: true,
                    edit: false,
                    updated: false,
                    message: ''
                },

                form: new Form({
                    id: '',
                    excerpt: '',
                    title: '',
                    body: '',
                })
            }
        },

        created () {
            this.fetchData()
            this.$root.$emit("posts.updated", {data: 'x'})
        },

        watch: {
            '$route': 'fetchData'
        },

        methods: {
            fetchData () {
                // reset data
                this.form = new Form()
                this.status.loading = true
                this.status.edit = false
                this.status.updated = false
                this.status.message = ''

                // get post
                this.form.get('/api/v1/posts/' + this.$route.params.id + '/edit')
                    .then(response => {
                            this.form.setData(response);
                            this.status.loading = false
                            this.status.edit = true

                        })
                    .catch(errors => console.log(errors))
            },

            onSubmit: function () {
                this.form.patch('/api/v1/posts/' + this.$route.params.id)
                    .then(response => {
                        this.$root.$emit("posts.updated", {data: response});
                        this.status.edit = false;
                        this.status.updated = true;
                        this.status.message = response.message;
                    })
                    .catch(errors => console.log(errors))
            }

        }
    }

</script>
