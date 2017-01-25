<!--
	If Update 
	<input type="hidden" name="_method" value="patch">

-->
<div class="form-group">
	<label for="title">Slug</label>
	<input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}">	
</div>

<div class="form-group">
	<label for="title">Title</label>
	<input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">	
</div>

<div class="form-group">
	<label for="body">Body</label>
	<textarea name="body" id="body" cols="30" rows="10" class="form-control">{{ old('body') }}</textarea>
</div>

<button type="submit" class="btn btn-primary">Save</button>

