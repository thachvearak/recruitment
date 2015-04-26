<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title></title>

<!-- CSS -->
<!--  <link rel="stylesheet" href="{{asset('assets/css/jquery.mobile.min.css')}}"> -->
<!--  <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}"> -->
<link rel="stylesheet"
	href="{{asset('bootstrap-3.3.1/css/bootstrap.min.css')}}">
<link rel="stylesheet"
	href="{{asset('bootstrap-3.3.1/css/bootstrap-theme.min.css')}}">
	<link rel="stylesheet"
	href="{{asset('font-awesome-4.2.0/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/global.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/base.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/layout.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/module.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/state.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/theme.css')}}">

<!-- JS -->
<script src="{{asset('assets/js/lib/jquery-2.1.1.min.js')}}"></script>
 <script src="{{asset('assets/js/lib/jquery-ui.min.js')}}"></script>
<!--  <script src="{{asset('assets/js/lib/jquery.mobile.min.js')}}"></script> -->
 <script src="{{asset('assets/js/lib/angular-1_3_x.min.js')}}"></script>
 <script src="{{asset('assets/js/lib/angular-sanitize.js')}}"></script>
<script src="{{asset('bootstrap-3.3.1/js/bootstrap.min.js')}}"></script>

<body>
	<div class="top-fixed-bar">		
		@include('layouts.header') 
	</div>
	<div class="top-fixed-bar-back"></div>
	@include('layouts.body')
	<div class="footer-container-back">
		@include('layouts.footer')
	</div>
		
	@yield('script')
</head>
</body>
</html>
