@extends('layouts.backend')

@section('content')

	<h2>Posts / Edit</h2>

	{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PATCH', 'files' => false]) !!}

		@include('posts.form')

	{!! Form::close() !!}

@endsection