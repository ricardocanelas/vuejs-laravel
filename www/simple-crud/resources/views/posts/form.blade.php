
<div class="form-group">
	{!! Form::label('slug', 'Slug') !!}
	{!! Form::text('slug', null, ['class' => 'form-control']) !!}	
</div>

<div class="form-group">
	{!! Form::label('title', 'Title') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}	
</div>

<div class="form-group">
	{!! Form::label('body', 'Body') !!}
	{!! Form::textarea('body', null, ['class' => 'form-control']) !!}	
</div>

@if(empty($post->id))
	{!! Form::submit('Create', ['class' => 'btn btn-primary']); !!}
@else
	{!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
@endif	

{!! link_to_route('posts.index', 'Go Back') !!}

