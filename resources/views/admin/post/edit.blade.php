@extends('layouts.admin')

@section('content')

<div class="container">
	<div class="container-fluid">
		<h2>Edit Post</h2>
		{!! Form::model($post, ['action' => ['App\Http\Controllers\PostsController@update', $post['id']], 'role' => 'form', 'files' => true]) !!}
		<div class="form-group">	
				{!! Form::label('title', 'Title') !!}
				{!! Form::text('title', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">	
				{!! Form::label('message', 'Message') !!}
				{!! Form::textarea('message', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">	
			{{-- TODO: populate with file name --}}
				{!! Form::label('file', 'File') !!}
				{{-- {!! Form::file('file', null, ['class' => 'form-control', 'multiple' => true]) !!} --}}
				<input type="file" name="file" class="form-control">
		</div>
		<div class="form-group">	
				{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
		</div>	
		{!!Form::close()!!} 
	</div>
</div>
@endsection
