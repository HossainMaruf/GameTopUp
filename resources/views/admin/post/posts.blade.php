@extends('layouts.admin')
@section('content')
<div class="container">
	<div class="">
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
	        <td>{{ date("l jS \of F Y h:i:s A", strtotime($post->created_at)) }}</td>
	        <td>{{ date("l jS \of F Y h:i:s A", strtotime($post->updated_at)) }}</td>
	        <td>
	        	<a class="mb-1 btn btn-sm btn-primary" href="/admin/post/edit/{{ $post->id }}">Edit</a>
						<a class="mb-1 btn btn-sm btn-secondary" href="/admin/trash/{{ $post->id }}">Trash</a>
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