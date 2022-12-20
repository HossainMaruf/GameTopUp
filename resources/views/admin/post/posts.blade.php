@extends('layouts.admin')
@section('content')
<div class="container">
	<div class="container-fluid">
		@if (count($posts) > 0)
		<table class="table table-light table-striped text-center">
		    <thead>
	      <tr>
	        <th>Title</th>
	        <th>Body</th>
	        <th>Image</th>
	        <th>Created At</th>
	        <th>Updated At</th>
	        <th>Actions</th>
	      </tr>
	    </thead>
	    <tbody>
	@foreach($posts as $post)
	      <tr>
	        <td> {{ get_words($post->title, 5) }} </td>
	        <td> {{ get_words($post->body) }} </td>
	        @if($post->file)
	        <td>
	        	<img width="50" height="50" class="img" src="/images/{{$post->file}}" alt="Not Found">
	        </td>
	        @else
	        <td>N/A</td>
	        @endif
	        <td>{{$post->created_at->format('d:m:y --- h:i:s')}}</td>
	        <td>{{$post->updated_at->format('d:m:y --- h:i:s')}}</td>
	        <td>
	        	<a class="mb-1 btn btn-sm btn-primary" href="/admin/post/edit/{{ $post->id }}">Edit</a>
						<a class="mb-1 btn btn-sm btn-secondary" href="/admin/post/hide/{{ $post->id }}">Hide</a>
						<a class="mb-1 btn btn-sm btn-danger" href="/admin/post/delete/{{ $post->id }}">Delete</a>
	        </td>
	      </tr>
	@endforeach
	    </tbody>
	</table>
	@else
			<div class="h1 text-center">No Posts</div>
	@endif	
	</div>
</div>
@endsection