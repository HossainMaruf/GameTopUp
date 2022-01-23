<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V4</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('frontend') }}/form/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/form/vendor/bootstrap/css/bootstrap.min.css">
<!--==========================================={{ asset('frontend') }}/form/====================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/form/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--==========================================={{ asset('frontend') }}/form/====================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/form/fonts/iconic/css/material-design-iconic-font.min.css">
<!--==========================================={{ asset('frontend') }}/form/====================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/form/vendor/animate/animate.css"> -->
<!--==========================================={{ asset('frontend') }}/form/====================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/form/vendor/css-hamburgers/hamburgers.min.css">
<!--==========================================={{ asset('frontend') }}/form/====================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/form/vendor/animsition/css/animsition.min.css"> -->
<!--==========================================={{ asset('frontend') }}/form/====================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/form/vendor/select2/select2.min.css">
<!--==========================================={{ asset('frontend') }}/form/====================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/form/vendor/daterangepicker/daterangepicker.css">
<!--==========================================={{ asset('frontend') }}/form/====================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/form/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/form/css/main.css">
<!-- =============================================================================================== -->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{ asset('frontend') }}/form/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form method="POST" action="/login" class="login100-form validate-form">
					{{ csrf_field() }}
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" value="{{old('email')}}" placeholder="Enter email">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
						@if($errors->has('email'))
							<div class="alert alert-danger">{{ $errors->first('email') }}</div>
						@endif

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
						@if($errors->has('password'))
							<div class="alert alert-danger">{{ $errors->first('password') }}</div>
						@endif
					
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Forgot password?
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit">
								Login
							</button>
						</div>
          </div>

          <div class="flex-col-c p-t-15">
            <a href="/register" class="text2">SIGN UP</a>
					</div>

					<div class="txt1 text-center p-t-20 p-b-15">
						<span>
							Or Sign Up Using
						</span>
					</div>

					<div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="login100-social-item bg2">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1">

	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<!-- <script src="vendor/animsition/js/animsition.min.js"></script> -->
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
