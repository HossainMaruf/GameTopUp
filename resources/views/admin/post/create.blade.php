@extends('layouts.admin')

@section('content')

<div class="container">
	<div class="container-fluid">
		<h2>Create Post</h2>
		{!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\PostsController@store', 'files' => true]) !!}
		<div class="form-group">	
				{!! Form::label('title', 'Title') !!}
				{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' =>'Enter title']) !!}
				@if($errors->first('title'))
				<p class="alert alert-danger d-inline-block">{{$errors->first('title')}}</p>
				@endif
		</div>
		<div class="form-group">	
				{!! Form::label('message', 'Message') !!}
				{!! Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'Create a post...']) !!}
				@if($errors->first('message'))
				<p class="alert alert-danger d-inline-block">{{$errors->first('message')}}</p>
				@endif
		</div>
		<div class="form-group">	
				{!! Form::label('file', 'File') !!}
				{{-- {!! Form::file('file', null, ['class' => 'form-control', 'multiple' => true]) !!} --}}
				<input type="file" name="file" class="form-control">
				@if($errors->first('file'))
				<p class="alert alert-danger d-inline-block">{{$errors->first('file')}}</p>
				@endif
		</div>
		<div class="form-group">	
				{!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}
		</div>	
		{!!Form::close()!!} 
	</div>
</div>


{{-- @if ($errors)
	@foreach($errors->all() as $error)
	<h2>{{$error}}</h2>
	@endforeach
@endif --}}

@endsection