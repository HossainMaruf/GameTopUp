<header class="site-navbar" role="banner">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="search-form-wrap js-search-form">
				<input type="text" id="s" class="form-control" placeholder="Search...">
			</div>
			<div class="col-4">Some Tex Here</div>
			<div class="col-8 text-right">
				<nav class="site-navigation" role="navigation">
					<ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
						<li><a href="{{ url('/') }}">Home</a></li>
						<li><a href="category.html">Politics</a></li>
						<li><a href="category.html">Tech</a></li>
						<li><a href="category.html">Entertainment</a></li>
						<li><a href="category.html">Travel</a></li>
						@if (!Auth::user())
							<li><a href="{{ url('/login') }}">Login</a></li>
						@elseif(Auth::user())
							<li><a href="{{ url('/admin') }}">Dashboard</a></li>
						@endif
						<li><a href="{{ url('/register') }}">Register</a></li>
						<li class="d-none d-lg-inline-block"><a href="#" class="js-search-toggle"><span class="icon-search"></span></a></li>
					</ul>
				</nav>
				<a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a>
			</div>
		</div>
	</div>
</header>