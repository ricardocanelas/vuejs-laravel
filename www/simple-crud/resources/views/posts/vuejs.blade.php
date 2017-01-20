<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="/css/app-posts.css">

    <style>
        span.help:empty {
            /* display:none; */ /* another way */
        }
    </style>
    <script>
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>;
    </script>
</head>
<body>

<div id="app" class="container">

    <h1 class="title">Posts (via VUEJS)</h1>

    <notification></notification>

    <div class="columns">

        <div class="column is-6">

            <button class="button is-primary" @click="getAllPosts">Refresh</button>

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


        </div>

        <div class="column is-6">

            <div class="notification is-warning">
                <button class="delete"></button>
                <ul>
                    <li v-for="error in form.errors.getAll()">@{{ error[0] }}</li>
                </ul>
            </div>

            <form method="POST" action="/posts" @submit.prevent='onSubmit' @keydown='
            form.errors.clear($event.target.name)'>

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

</div>


<script src="/js/app-posts.js"></script>
</body>
</html>