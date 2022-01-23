<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('dashboard') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="{{ asset('dashboard') }}/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('dashboard') }}/css/admin.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome</h1>
                  </div>
                  <form class="user" method='POST' action="{{ url('/register') }}" enctype="multipart/form-data">
                  	{{ @csrf_field() }}
                    <div class="form-group">
                      <input type="text" name="name" class="form-control form-control-user" id="" placeholder="Username">
                      @if($errors->first('name'))
                      	<div class="alert alert-danger">{{$errors->first('name')}}</div>
                      @endif
                    </div>

                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email">
                      @if($errors->first('email'))
                      	<div class="alert alert-danger">{{$errors->first('email')}}</div>
                      @endif
					 @if($errors->first('message'))
		              	<div class="alert alert-danger">{{$errors->first('message')}}</div>
	                 @endif
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
					@if($errors->first('password'))
                      	<div class="alert alert-danger">{{$errors->first('password')}}</div>
                      @endif
                    </div>
                    <div class="form-group">
                      <input type="password" name="password_confirmed" class="form-control form-control-user" id="exampleInputPassword" placeholder="Confirm Password">
					@if($errors->first('password_confirmed'))
                      	<div class="alert alert-danger">{{$errors->first('password_confirmed')}}</div>
                      @endif
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                       		<button type="submit" class="btn btn-primary">Submit</button> 
                      </div>
                    </div>
                    <hr>
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="/login">Have an account!</a>
                  </div>

                 {{-- @if($errors)
                  	<div>{{$errors}}</div>
                @endif --}}

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('dashboard') }}/vendor/jquery/jquery.min.js"></script>
  <script src="{{ asset('dashboard') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('dashboard') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('dashboard') }}/js/sb-admin-2.min.js"></script>

</body>

</html>
