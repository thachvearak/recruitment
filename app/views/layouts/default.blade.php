<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	
	<!-- CSS -->
	<!--  <link rel="stylesheet" href="{{asset('assets/css/jquery.mobile.min.css')}}"> -->
	<!--  <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}"> -->
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap/bootstrap-theme.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/global.css')}}">
	
	<!-- JS -->
	<script src="{{asset('assets/js/jquery-2.1.1.min.js')}}"></script>
	<!--  <script src="{{asset('assets/js/jquery-ui.min.js')}}"></script> -->
	<!--  <script src="{{asset('assets/js/jquery.mobile.min.js')}}"></script> -->	
	<script src="{{asset('assets/js/bootstrap/bootstrap.min.js')}}"></script>
</head>
<body>
	<form method="post" action="">
		@include('layouts.header')
		@include('layouts.body')
		<div class="footer-container-back">
			<hr>
			@include('layouts.footer')
	</div>
	</form>
</body>
</html>
