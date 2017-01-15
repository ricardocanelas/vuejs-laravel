@extends('layouts.backend')

@section('content')

	<h2>Posts / Create</h2>

	{!! Form::model($post = new \App\Post, ['route' => 'posts.store', 'files' => false]) !!}

		@include('posts.form')

	{!! Form::close() !!}

@endsection