<!DOCTYPE html>
<html lang="tr">
<head>	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="A Bootstrap Blog Template">
	<meta name="author" content="Vijaya Anand">

	<title>Home</title>

	<!-- Bootstrap CSS file -->
	<link href="{{URL::to('Frontend/lib/bootstrap-3.0.3/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{URL::to('Frontend/lib/bootstrap-3.0.3/css/bootstrap-theme.min.css')}}" rel="stylesheet" />
	<link href="{{URL::to('Frontend/blog.css')}}" rel="stylesheet" />

</head>

<body>

	@include('frontend.layout.header')

	<!-- Body -->
	<div class="container">
		<div class="row">
			@yield('content')
		@include('frontend.layout.sidebar')	
		</div>
	</div>

	@include('frontend.layout.footer')
	<!-- Jquery and Bootstrap Script files -->
	<script src="{{URL::to('Frontend/lib/jquery-2.0.3.min.js')}}"></script>
	<script src="{{URL::to('Frontend/lib/bootstrap-3.0.3/js/bootstrap.min.js')}}"></script>
</body>
</html>