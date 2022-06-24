<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("assets/vendor/bootstrap/css/bootstrap.min.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("assets/vendor/animate/animate.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("assets/vendor/css-hamburgers/hamburgers.min.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("assets/vendor/animsition/css/animsition.min.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("assets/vendor/select2/select2.min.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("assets/vendor/daterangepicker/daterangepicker.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("assets/css/util.css")}}">
	<link rel="stylesheet" type="text/css" href="{{asset("assets/css/main.css")}}">
<!--===============================================================================================-->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

	@if (session('error'))
		<script>
			Swal.fire(
				'Failed!',
				'{{ session("error") }}',
				'error'
			)
		</script>
	@endif

	<div class="container-contact100">
		<div class="contact100-map" id="google_map" data-map-x="40.722047" data-map-y="-73.986422" data-pin="images/icons/map-marker.png" data-scrollwhell="0" data-draggable="1"></div>

		<div class="wrap-contact100">
			<div class="contact100-form-title">
				<span class="contact100-form-title-1">
					Login
				</span>

				<span class="contact100-form-title-2">
					if you don't have an account please <a href="{{url("/register")}}" style="color: cyan">register</a>
				</span>
			</div>

			<form class="contact100-form validate-form" action="{{url("/login")}}" method="POST">
				@csrf
				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<span class="label-input100">Email:</span>
					<input class="input100" type="email" name="email" placeholder="Enter email addess" required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Phone is required">
					<span class="label-input100">Password:</span>
					<input class="input100" type="password" name="password" placeholder="Enter phone number" required>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							Login
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="{{asset("assets/vendor/jquery/jquery-3.2.1.min.js")}}"></script>
<!--===============================================================================================-->
	<script src="{{asset("assets/vendor/animsition/js/animsition.min.js")}}"></script>
<!--===============================================================================================-->
	<script src="{{asset("assets/vendor/bootstrap/js/popper.js")}}"></script>
	<script src="{{asset("assets/vendor/bootstrap/js/bootstrap.min.js")}}"></script>
<!--===============================================================================================-->
	<script src="{{asset("assets/vendor/select2/select2.min.js")}}"></script>
<!--===============================================================================================-->
	<script src="{{asset("assets/vendor/daterangepicker/moment.min.js")}}"></script>
	<script src="{{asset("assets/vendor/daterangepicker/daterangepicker.js")}}"></script>
<!--===============================================================================================-->
	<script src="{{asset("assets/vendor/countdowntime/countdowntime.js")}}"></script>
<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="{{asset("assets/js/map-custom.js")}}"></script>
<!--===============================================================================================-->
	<script src="{{asset("assets/js/login.js")}}"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>

</body>
</html>
