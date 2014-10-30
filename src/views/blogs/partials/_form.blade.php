{{ Form::open(['route' => 'blogs.store', 'method' => 'post']) }}
	<? //dd($errors); ?>
	<div class="form-group">
		{{ Form::label('name', 'Name', ['class' => 'control-label']) }}
		{{ Form::text('name', NULL, ['class' => 'form-control']) }}
		{{ $errors->first('name', '<span class="error">:message</span>') }}
	</div>

	<div class="form-group">
		{{ Form::label('description', 'Description', ['class' => 'control-label']) }}
		{{ Form::textarea('description', NULL, ['class' => 'form-control']) }}
		{{ $errors->first('description', '<span class="error">:message</span>') }}
	</div>

	<div class="form-group">
		{{ Form::label('Author', 'Author', ['class' => 'control-label']) }}
		{{ Form::text('author', NULL, ['class' => 'form-control']) }}
		{{ $errors->first('description', '<span class="error">:message</span>') }}
	</div>



{{ Form::submit('Submit', ['class' => 'btn btn-default']) }}

{{ Form::close() }}