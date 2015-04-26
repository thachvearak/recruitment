@extends('layouts.default')

@section('login')

<div id="register-box">
	<div class="row">
		<div class="view-name title-bar">
			<strong>Registration</strong>
		</div>
	</div>
	<div class="row box-body">
		<div class="row">
			<form action="{{URL::route('user.register.post')}}" method="post" class="form-horizontal">
				<div class="col-sm-6">
					@if(Session::get('global'))
						<div class="alert alert-danger" style="text-align: center;">
							{{Session::get('global')}}
						</div>
					@endif
					<div class="form-group">
					    <label for="user_type" class="col-sm-4 control-label">I am an</label>
					    <div class="col-sm-8">
					      <select class="form-control" id="user_type" name="user_type">
					      	<option value="">---Select---</option>
					      	<option value="1" {{Input::old('user_type') == 1 ? 'selected' : ''}}>Employer</option>
					      	<option value="2" {{Input::old('user_type') == 2 ? 'selected' : ''}}>Employee</option>
					      	<option value="3" {{Input::old('user_type') == 3 ? 'selected' : ''}}>Agency</option>
					      </select>
					      	@if($errors->has())
								<div class="error">								
									{{$errors->first('user_type', ':message')}}
								</div>
							@endif
					    </div>
					</div>
					<div class="form-group">
					    <label for="username" class="col-sm-4 control-label">User name</label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="username" name="user_name" value="{{Input::old('user_name')}}">
					      	@if($errors->has())
								<div class="error">								
									{{$errors->first('user_name', ':message')}}
								</div>
							@elseif(Session::get('username_exist'))
								<div class="error">
									{{Session::get('username_exist')}}
								</div>
							@endif
					    </div>
					</div>
					<div class="form-group">
					    <label for="email" class="col-sm-4 control-label">Email</label>
					    <div class="col-sm-8">
					      <input type="email" class="form-control" id="email" name="email" value="{{Input::old('email')}}">
					      	@if($errors->has())
								<div class="error">								
									{{$errors->first('email', ':message')}}
								</div>
							@elseif(Session::get('email_exist'))
								<div class="error">
									{{Session::get('email_exist')}}
								</div>
							@endif
					    </div>
					</div>
					<div class="form-group">
					    <label for="password" class="col-sm-4 control-label">Password</label>
					    <div class="col-sm-8">
					      <input type="password" class="form-control" id="password" name="password">
					      	@if($errors->has())
								<div class="error">								
									{{$errors->first('password', ':message')}}
								</div>
							@endif
					    </div>
					</div>
					<div class="form-group">
					    <label for="password-confirm" class="col-sm-4 control-label">Confirm password</label>
					    <div class="col-sm-8">
					      <input type="password" class="form-control" id="password-confirm" name="password-confirm">
					      	@if($errors->has())
								<div class="error">								
									{{$errors->first('password-confirm', ':message')}}
								</div>
							@endif
					    </div>
					</div>		
					 <div class="form-group">
					    <div class="col-sm-offset-4 col-sm-12">
					      <div>
					      	<textarea rows="" cols="" class="form-control" style="width: 300px; height: 100px; margin-top: 30px;" disabled>
					      	dfvkjkljklkjkl
					      	dfgdv
					      	fvfd
					      	fdvdf
					      	dfvdf
					      	dfd
					      	</textarea>
					      </div>
					      <div class="checkbox">
      					  		<label><input type="checkbox" id="term_condition"  name="term_condition">I have read and agreement of term and condition.</label>
						  </div>
						  @if($errors->has())
								<div class="error">								
									{{$errors->first('term_condition', ':message')}}
								</div>
							@endif
					    </div>
					 </div>
					 <div class="form-group">
					    <div class="col-sm-offset-4 col-sm-12">
					      <button type="submit" class="btn btn-default">Register</button>
					    </div>
					 </div>
					{{Form::token()}}				
				</div>
			</form>
		<div class="col-sm-6">
			<div class="logo">
				<img alt="" src="{{asset('assets/images/company-logo.png')}}">
			</div>
			<div class="description">
				<h3>Welcome to Aities HR</h3>
				<p>
					Right time, right people, right job.
				</p>
			</div>
		</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<span>Already have an account? <a href="{{URL::route('user.login')}}">Login</a></span>
			</div>
		</div>
	</div>	
</div>
@endsection