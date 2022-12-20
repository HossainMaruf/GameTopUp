@extends('layouts.app')
@section('content')
<div class="site-wrap">
	<div class="site-mobile-menu">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close mt-3">
				<span class="icon-close2 js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>
	<div class="site-section bg-light">
		<div class="container">
			<div class="row align-items-stretch retro-layout-2">
				<div class="col-md-4">
					<a href="single.html" class="h-entry mb-30 v-height gradient" style="background-image: url('{{ asset('frontend') }}/images/img_1.jpg')">
						<div class="text">
							<h2>the ai magically removes moving objects from videos.</h2>
							<span class="date">july 19, 2019</span>
						</div>
					</a>
					<a href="single.html" class="h-entry v-height gradient" style="background-image: url('{{ asset('frontend') }}/images/img_2.jpg')">
						<div class="text">
							<h2>the ai magically removes moving objects from videos.</h2>
							<span class="date">july 19, 2019</span>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="single.html" class="h-entry img-5 h-100 gradient" style="background-image: url('{{ asset('frontend') }}/images/img_v_1.jpg');">
						<div class="text">
							<div class="post-categories mb-3">
								<span class="post-category bg-danger">travel</span>
								<span class="post-category bg-primary">food</span>
							</div>
							<h2>the ai magically removes moving objects from videos.</h2>
							<span class="date">july 19, 2019</span>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="single.html" class="h-entry mb-30 v-height gradient" style="background-image: url('{{ asset('frontend') }}/images/img_3.jpg');">
						<div class="text">
							<h2>the 20 biggest fintech companies in america 2019</h2>
							<span class="date">july 19, 2019</span>
						</div>
					</a>
					<a href="single.html" class="h-entry v-height gradient" style="background-image: url('{{ asset('frontend') }}/images/img_4.jpg');">
						<div class="text">
							<h2>the 20 biggest fintech companies in america 2019</h2>
							<span class="date">july 19, 2019</span>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="site-section">
		<div class="container">
			<div class="row" id="recent">
				@if($posts ?? '')
				<div class="col-lg-12 mb-4 text-center">
					<h2>Recent Posts</h2>
				</div>
				@foreach($posts as $post)
				<div class="col-md-3 retro-layout-2">
					
					<a href="/post/{{ $post->id }}" class="h-entry mb-30 v-height gradient" style="background-image: @if($post->file) url('/images/{{ $post->file }}') @else url(') @endif">
						<div class="text">
							<h2>{{ get_words($post->title) }}</h2>
							<span class="date">{{ date("d-m-y", strtotime($post->created_at)) }}</span>
						</div>
					</a>

				</div>
				@endforeach
				@endif
			</div>
			<div class="row text-center">
				<div class="container">
					@if($posts->currentPage() == 1)
					<a href="{{ $posts->currentPage() }}#recent" class="btn btn-primary disabled">Back</a>
					@else
					<a href="{{ $posts->url($posts->currentPage() - 1 ) }}#recent" class="btn btn-primary">Back</a>
					@endif

					@for($i=$posts->currentPage()-2; $i<=$posts->currentPage()+2; ++$i) 
					@if($i<1 || $i>$posts->lastPage())
					@continue
					@else
					<a href="{{ $posts->url($i) }}#recent" class="btn btn-primary {{ $i==$posts->currentPage() ? "bg-danger" : "" }}">{{ $i }}</a>
					@endif

					@endfor

					@if($posts->currentPage() == $posts->lastPage())
					<a href="{{ $posts->currentPage() }}#recent" class="btn btn-primary disabled">Next</a>
					@else
					<a href="{{ $posts->url($posts->currentPage() + 1) }}#recent" class="btn btn-primary">Next</a>
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="site-section bg-light">
		<div class="container">
			<div class="row align-items-stretch retro-layout">
				<div class="col-md-5 order-md-2">
					<a href="single.html" class="hentry img-1 h-100 gradient" style="background-image: url('{{ asset('frontend') }}/images/img_4.jpg');">
						<span class="post-category text-white bg-danger">Travel</span>
						<div class="text">
							<h2>The 20 Biggest Fintech Companies In America 2019</h2>
							<span>February 12, 2019</span>
						</div>
					</a>
				</div>
				<div class="col-md-7">
					<a href="single.html" class="hentry img-2 v-height mb30 gradient" style="background-image: url('{{ asset('frontend') }}/images/img_1.jpg');">
						<span class="post-category text-white bg-success">Nature</span>
						<div class="text text-sm">
							<h2>The 20 Biggest Fintech Companies In America 2019</h2>
							<span>February 12, 2019</span>
						</div>
					</a>
					<div class="two-col d-block d-md-flex">
						<a href="single.html" class="hentry v-height img-2 gradient" style="background-image: url('{{ asset('frontend') }}/images/img_2.jpg');">
							<span class="post-category text-white bg-primary">Sports</span>
							<div class="text text-sm">
								<h2>The 20 Biggest Fintech Companies In America 2019</h2>
								<span>February 12, 2019</span>
							</div>
						</a>
						<a href="single.html" class="hentry v-height img-2 ml-auto gradient" style="background-image: url('{{ asset('frontend') }}/{{ asset('frontend') }}/images/img_3.jpg');">
							<span class="post-category text-white bg-warning">Lifestyle</span>
							<div class="text text-sm">
								<h2>The 20 Biggest Fintech Companies In America 2019</h2>
								<span>February 12, 2019</span>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="site-section bg-lightx">
		<div class="container">
			<div class="row justify-content-center text-center">
				<div class="col-md-5">
					<div class="subscribe-1 ">
						<h2>Subscribe to our newsletter</h2>
						<p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a explicabo, ipsam nostrum.</p>
						<form action="#" class="d-flex">
							<input type="text" class="form-control" placeholder="Enter your email address">
							<input type="submit" class="btn btn-primary" value="Subscribe">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection