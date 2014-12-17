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
<link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">

<!-- JS -->
<script src="{{asset('assets/js/jquery-2.1.1.min.js')}}"></script>
<!--  <script src="{{asset('assets/js/jquery-ui.min.js')}}"></script> -->
<!--  <script src="{{asset('assets/js/jquery.mobile.min.js')}}"></script> -->
<script src="{{asset('bootstrap-3.3.1/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/angular-1_3_x.min.js')}}"></script>
<script src="{{asset('assets/js/admin/desire-app.js')}}"></script>
</head>
<body>
	<div class="wrapper">
		<div class="header clearfix">
			<div class="column logo">
				<a href="" class="company-logo"><img alt=""
					src="http://localhost:8000/assets/images/company-logo.png"></a>
			</div>
			<div class="column menu">
				<div class="navbar navbar-default  navbar-static-top navbar-unstyle"
					role="navigation">
					<ul class="nav navbar-nav">
						<li class="active"><a href="{{URL::route('admin.home')}}">Home</a></li>
						<li><a href="{{URL::route('admin.cv.index')}}">CV</a></li>
						<li><a href="#">Job Seeker</a></li>
						<li><a href="#">Employer</a></li>
						<li><a href="#">Agency</a></li>
					</ul>
				</div>
			</div>
			<div class="column user">
				<div class="dropdown">
					<button class="btn btn-default dropdown-toggle" type="button"
						id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
						User <span class="caret"></span>
					</button>
					<ul class="dropdown-menu dropdown-menu-right" role="menu">
						<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Profile</a></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Logout</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="inner-wrapper">@yield('home') @yield('cv')</div>
	</div>
</body>
	<script src="{{asset('assets/js/admin/admin.js')}}"></script>
</html>