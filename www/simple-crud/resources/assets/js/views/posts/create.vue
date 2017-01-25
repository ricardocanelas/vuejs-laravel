<template>
    <div id="form-create">

        <h2 class="title">Create a New Post</h2>

        <div class="notification is-warning" v-if="form.errors.any()">
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
                <button class="button is-primary" :disabled="form.errors.any()">Create</button>
            </div>

        </form>

    </div>
</template>

<script>

import Form from "./../../classes/Form.js";


    export default{
        data(){
            return{
                form: new Form({
                    excerpt: '',
                    title: '',
                    body: '',
                })
            }
        },

        methods: {
            onSubmit: function () {
                this.form.post('/api/v1/posts')
                    .then(response => {
                        this.$root.$emit("posts.created", {data: response});
                     })
                    .catch(errors => console.log(errors))
            }
        }
    }






</script>
