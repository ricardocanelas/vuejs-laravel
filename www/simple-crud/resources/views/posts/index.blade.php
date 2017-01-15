@extends('layouts.backend')

@section('content')

<h2>Posts</h2>

{!! link_to_route('posts.create', 'Create New Post', [],  ['class' => 'btn btn-primary']) !!} <br/><br/>

@if ($posts->count())
<div class="row">
    <div class="col-md-12">
        <table class="table table-responsive table-bordered">
            <thead>
                <th>ID</th>
                <th>Slug</th>
                <th>Title</th>
                <th>Action</th>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                        {!! link_to_route('posts.show', 'Show', [$post->id],  ['class' => 'btn btn-xs btn-primary']) !!}
                        
                        {!! link_to_route('posts.edit', 'Edit', [$post->id],  ['class' => 'btn btn-xs btn-primary']) !!}

                        {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post], 'onsubmit' => 'return confirmDelete()', 'style' =>'display:inline;']) !!}
                            <button type="submit" class="btn btn-danger btn-xs">
                                Delete
                            </button>
                        {!! Form::close() !!}

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</row>
@else
    <span>There're no posts</span>
@endif

@endsection