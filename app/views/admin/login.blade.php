<!DOCTYPE html>
<html>
<head>
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
</head>
<body>
<div id="user-login" style="
    position: fixed;
    left: 50%;
    top: 40%;
    transform: translate(-50%, -50%);
">
	<form method="post" action="{{URL::route('admin.login.post')}}">
		<div>
			<div>
				<div>
					@if(Session::get('global'))
					<div class="error alert alert-danger">
						* {{Session::get('global')}}
					</div>
					@endif

					@if($errors->has())
						<div class="error alert alert-danger">
							<ul style="padding-left: 15px;">
								@foreach($errors->toArray() as $key => $value)
									<li>{{$errors->first($key, ':message')}}</li>
								@endforeach
							</ul>
						</div>
					@endif
				</div>
				<div class="panel panel-default" id="basic-info">
					<div class="panel-heading">
						<h3 class="panel-title">Admin</h3>
					</div>
					<div class="panel-body" style="padding: 21px;">
						<div class="row input-elements">
							<div class="col-sm-3 label-title">
								<label>Username</label>
							</div>
							<div class="col-sm-9">
								<input type="text" class="form-control input-sm" id="user_name"
									name="user_name">
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-3 label-title">
								<label>Password</label>
							</div>
							<div class="col-sm-9">
								<input type="password" class="form-control input-sm" id="password"
									name="password">
							</div>
						</div>	
						<div class="row">
							<div class="col-sm-12">
								<button type="submit" class="btn btn-success form-control"
								style="width: 74px; float: right;">Login</button>
							</div>
						</div>				
					</div>
				</div>
			</div>
		</div>
		{{Form::token()}}
	</form>
</div>
</body>
</html>
