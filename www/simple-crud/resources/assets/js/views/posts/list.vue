<template>
    <div>

        <h3 class="title is-3">All Posts</h3>

        <table class="table">
            <thead>
            <th>ID</th>
            <th>Title</th>
            <th>Excerpt</th>
            <th>Action</th>
            </thead>
            <tbody>
            <tr v-for="post in posts">
                <td>{{ post.id }}</td>
                <td>{{ post.title }}</td>
                <td>{{ post.excerpt }}</td>
                <td>
                    <router-link :to="{ name: 'posts/edit', params: { id: post.id }}" class="button">edit</router-link>
                    <a class="button" @click.prevent="removePost(post)">remove</a>
                </td>

            </tr>
            </tbody>
        </table>

        <router-link to="/posts" activeClass=" " class="button is-primary">New Post</router-link>
        <button class="button is-primary" @click="getAllPosts">Refresh</button>

    </div>

</template>

<script>
    export default{
        data(){
            return{
                posts: []
            }
        },

        methods: {
            getAllPosts: function () {
                axios.get('/api/v1/posts')
                    .then(response => {
                        this.posts = response.data;
                    })
                    .catch(errors => console.log(errors));
            },

            removePost: function (post) {

                if( ! confirm('Are you sure you want to delete?') ) return;

                axios.delete('/api/v1/posts/'+ post.id)
                    .then(response => {
                        if(this.$route.params.id == post.id){
                            this.$router.push({ name: 'posts'});
                        }
                        let index = this.posts.indexOf(post)
                        this.posts.splice(index, 1);

                    })
                    .catch(errors => console.log(errors));
            }
        },

        created: function(){
            this.getAllPosts();
            this.$root.$on("posts.updated", this.getAllPosts);
            this.$root.$on("posts.created", this.getAllPosts);
        }
    }
</script>
