@extends('layouts.backend')

@section('content')

	<h2>Posts / Show</h2>

	<div class="row">
		<div class="col-md-12">
			<table class="table table-responsive table-bordered">
				<thead>
					<th>Field</th>
					<th>Value</th>
				</thead>
				<tbody>

				<tr>
					<td>Slug</td>
					<td>{{ $post->slug }}</td>
				</tr/>

				<tr>
					<td>Title</td>
					<td>{{ $post->title }}</td>
				</tr/>

				<tr>
					<td>Body</td>
					<td>{{ $post->body }}</td>
				</tr/>

				<tr>
					<td>Updated at</td>
					<td>{{ $post->updated_at->format('Y/m/d H:s') }}</td>
				</tr/>

				<tr>
					<td>Created at</td>
					<td>{{ $post->created_at->format('Y/m/d H:s') }}</td>
				</tr/>
				
				</tbody>
			</table>

			{!! link_to_route('posts.index', 'Back', [], ['class' => 'btn btn-primary']) !!}

		</div>
	</row>


@endsection



