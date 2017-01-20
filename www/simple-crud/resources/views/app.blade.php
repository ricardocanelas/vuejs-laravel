@extends('layouts.backend_vuejs')

@section('content')

    <h1 class="title">Posts (via VUEJS)</h1>



    <div class="columns">

        <div class="column is-6">

            <h2 class="title">All Posts</h2>

            <table class="table">
                <thead>
                <th>ID</th>
                <th>Slug</th>
                <th>Title</th>
                <th>Action</th>
                </thead>
                <tbody>
                <tr v-for="post in posts">
                    <td>@{{ post.id }}</td>
                    <td>@{{ post.slug }}</td>
                    <td>@{{ post.title }}</td>
                    <td></td>
                </tr>
                </tbody>
            </table>

            <button class="button is-primary" @click="getAllPosts">Refresh</button>


        </div>

        <div class="column is-6">

            <h2 class="title">Create a new post</h2>

            <div class="notification is-warning" v-if="form.errors.any()">
                <button class="delete" @click="form.errors.clear()"></button>
                <ul>
                    <li v-for="error in form.errors.getAll()">@{{ error[0] }}</li>
                </ul>
            </div>

            <form method="POST" action="/posts" @submit.prevent='onSubmit' @keydown='form.errors.clear($event.target.name)'>

            <div class="control">
                <label for="slug" class="label">Slug</label>
                <input type="text" id="slug" name="slug" class="input" v-model="form.slug">
                <span class="help is-danger" v-text="form.errors.get('slug')" v-if="form.errors.has('slug')"></span>
            </div>

            <div class="control">
                <label for="title" class="label">Title</label>
                <input type="text" id="title" name="title" class="input" v-model="form.title">
                <span class="help is-danger" v-text="form.errors.get('title')" v-if="form.errors.has('title')"></span>
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

    </div>

@endsection

