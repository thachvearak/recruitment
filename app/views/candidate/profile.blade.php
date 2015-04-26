@extends('layouts.default') 

@section('candidate')
<div class="col-md-2 left-side-bar">
	<div>
		@include('menu.menu')
	</div>
</div>
<div id="profile" class="col-md-7 middle-wrapper">
	<div class="outter-box">
		<div id="show-profile" class="{{isset($candidate->is_new_candidate) ? 'hide' : ''}}">
			@if(Session::get('profile'))
				<div id="alert" class="alert alert-success" style="text-align: center;">
					{{Session::get('profile')}}
				</div>		
				<script type="text/javascript">
					setTimeout(function(){
						$('#alert').css({
							'opacity': 0, 
							'transition': 'all 1s ease-in'
						});
					}, 3000);
					setTimeout(function(){
						$('#alert').remove();
					}, 4000);
				</script>
			@endif
			<div class="box">
				<div class="row">
					<div class="view-name title-bar">
						<strong>Account</strong>
					</div>
				</div>
				<div class="row box-body">
					<div class="form-horizontal">
						<div class="form-group">
						    <label for="" class="col-sm-4 control-label">User name</label>
						    <div class="col-sm-7">
						      <span class="data"><strong>{{Auth::user()->user_name}}</strong></span>						
							</div>
						</div>
						<div class="form-group">
						    <label for="" class="col-sm-4 control-label">Email</label>
						    <div class="col-sm-7">
						      <span class="data"><strong>{{Auth::user()->email}}</strong></span>						
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="box">
				<div class="row">
					<div class="view-name title-bar">
						<strong>My Profile</strong>
					</div>
				</div>
				<div class="row box-body">
				<form method="post" action="{{URL::route('candidate.cv.profile.post')}}" class="form-horizontal">
					<div class="form-group">
					    <label for="surname" class="col-sm-4 control-label">Surname</label>
					    <div class="col-sm-7">
					      <span class="data"><strong>{{$candidate->surname}}</strong></span>			      							
						</div>
					</div>
					<div class="form-group">
					    <label for="name" class="col-sm-4 control-label">Given name</label>
					    <div class="col-sm-7">
					      <span class="data"><strong>{{$candidate->name}}</strong></span>					
						</div>
					</div>
					<div class="form-group">
					    <label for="surname" class="col-sm-4 control-label">Sex</label>
					    <div class="col-sm-7">
					      <span class="data"><strong>{{Lang::get("local.gender.{$candidate->sex}")}}</strong></span>							
						</div>
					</div>
					<div class="form-group">
					    <label for="date_of_birth" class="col-sm-4 control-label">Date Of Birth</label>
					    <div class="col-sm-7">
					       <span class="data"><strong>{{!empty($candidate->date_of_birth) ? \Carbon\Carbon::createFromFormat('Y-m-d', $candidate->date_of_birth)->format('Y-F-d') : '' }}</strong></span>					
						</div>
					</div>
					<div class="form-group">
					    <label for="marital_status" class="col-sm-4 control-label">Marital Status</label>
					    <div class="col-sm-7">
						     <span class="data"><strong>{{Lang::get("local.marital.{$candidate->marital_id}")}}</strong></span>							
						</div>
					</div>
					<div class="form-group">
					    <label for="nationality" class="col-sm-4 control-label">Nationality</label>
					    <div class="col-sm-7">
					        <span class="data"><strong>{{$candidate->nationality}}</strong></span>						
						</div>
					</div>		
					<div class="form-group">
					    <label for="residence" class="col-sm-4 control-label">Province / City</label>
					    <div class="col-sm-7">
					        <span class="data"><strong>{{$candidate->residence}}</strong></span>							
						</div>
					</div>	
					<div class="form-group">
					    <label for="address" class="col-sm-4 control-label">Address</label>
					    <div class="col-sm-7">
					    	<span class="data"><strong>{{$candidate->address}}</strong></span>							
						</div>
					</div>
					<div class="form-group">
					    <label for="phone_number" class="col-sm-4 control-label">Phone</label>
					    <div class="col-sm-7">
					    	<span class="data"><strong>{{$candidate->phone_number}}</strong></span>
					    </div>
					</div>
					<!-- <div class="form-group profile-pic" style="position: absolute; width: 116px; top: 18px; left: 500px;">
						<img src="{{asset('assets/images/no-profile-pic.jpg')}}" alt="..." class="img-thumbnail">
						<div class="hide" style="position: absolute; top: 0; left: 100%;">
							<a href="" style="display: block; padding: 5px; text-align: center;"><i class="glyphicon glyphicon-pencil"></i></a>
							<hr style="margin: 0; opacity: .2;">
							<a href="" style="display: block; padding: 5px; text-align: center;"><i class="glyphicon glyphicon-trash"></i></a>
						</div>				
					</div>		 -->		
					<div class="box-footer">
						<button type="button" id="btn-profile-edit" class="btn btn-default" style="width: 100px;">Edit</button>
					</div>
					{{Form::token()}}
				</form>
				</div>
			</div>
		</div>
		<div id="edit-profile" class="{{!isset($candidate->is_new_candidate) ? 'hide' : ''}}">		
		<div class="box">
			<div class="row">
				<div class="view-name title-bar">
					<strong>Account</strong>
				</div>
			</div>
			<div class="row box-body">
				<div class="form-horizontal">
					<div class="form-group">
					    <label for="" class="col-sm-4 control-label">User name</label>
					    <div class="col-sm-5">
					      <span class="data"><strong>{{Auth::user()->user_name}}</strong></span>						
						</div>
					</div>
					<div class="form-group">
					    <label for="" class="col-sm-4 control-label">Email</label>
					    <div class="col-sm-5">
					      <span class="data"><strong>{{Auth::user()->email}}</strong></span>						
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="box">
			<div class="row">
				<div class="view-name title-bar">
					<strong>My Profile</strong>
				</div>
			</div>
			<div class="row box-body">
			<form method="post" action="{{URL::route('candidate.cv.profile.post')}}" class="form-horizontal">
				@if($errors->has())
					<div class="form-group">
					    <label for="surname" class="col-sm-4 control-label">Surname</label>
					    <div class="col-sm-5">
					      <input type="text" class="form-control" id="surname" name="surname" value="{{Input::old('surname')}}">			      							
						</div>
						<div class="col-sm-3" style="padding:0;">
							<div class="error">								
								{{$errors->first('surname', ':message')}}
							</div>
						</div>
					</div>
					<div class="form-group">
					    <label for="name" class="col-sm-4 control-label">Given name</label>
					    <div class="col-sm-5">
					      <input type="text" class="form-control" id="name" name="name" value="{{Input::old('name')}}">						
						</div>
						<div class="col-sm-3" style="padding:0;">
								<div class="error">								
									{{$errors->first('name', ':message')}}
								</div>
						</div>
					</div>
					<div class="form-group">
					    <label for="surname" class="col-sm-4 control-label">Sex</label>
					    <div class="col-sm-5">
					      <div class="radio">
					      		@foreach(\Constants::getGenders() as $gender)
						  			<label><input type="radio" id="sex" name="sex" value="{{$gender->id}}" {{Input::old('sex') == $gender->id ? 'checked' : ''}}>{{$gender->id}}</label>&nbsp&nbsp
								@endforeach
						  </div>							
						</div>
						<div class="col-sm-3" style="padding:0;">
								<div class="error">								
									{{$errors->first('sex', ':message')}}
								</div>
						</div>
					</div>
					<div class="form-group">
					    <label for="date_of_birth" class="col-sm-4 control-label">Date Of Birth</label>
					    <div class="col-sm-5">
					      <input type="date" class="form-control input-sm" id="date_of_birth" name="date_of_birth" value="{{Input::old('date_of_birth')}}">
					    						
						</div>
						<div class="col-sm-3" style="padding:0;">
								<div class="error">								
									{{$errors->first('date_of_birth', ':message')}}
								</div>
						</div>
					</div>
					<div class="form-group">
					    <label for="marital_status" class="col-sm-4 control-label">Marital Status</label>
					    <div class="col-sm-5">
					      <select class="form-control input-sm" id="marital_status" name="marital_status">
								<option value="">---Select---</option>
								@foreach(\Constants::getMaritalStatuses() as $status)
									<option value="{{$status->id}}" {{Input::old('marital_status') == $status->id ? 'selected' : ''}}>{{Lang::get("local.marital.{$status->id}")}}</option>
								@endforeach
							</select>							
						</div>
						<div class="col-sm-3" style="padding:0;">
								<div class="error">								
									{{$errors->first('marital_status', ':message')}}
								</div>
						</div>
					</div>
					<div class="form-group">
					    <label for="nationality" class="col-sm-4 control-label">Nationality</label>
					    <div class="col-sm-5">
					      <select class="form-control input-sm" id="nationality" name="nationality">
								<option value="">---Select---</option>
								@foreach(Country::getNationalities() as $nationality)
									<option value="{{$nationality->id}}" {{Input::old('nationality') == $nationality->id ? 'selected' : ''}}>{{$nationality->nationality}}</option>
								@endforeach
							</select>						
						</div>
						<div class="col-sm-3" style="padding:0;">
								<div class="error">								
									{{$errors->first('nationality', ':message')}}
								</div>
						</div>
					</div>		
					<div class="form-group">
					    <label for="residence" class="col-sm-4 control-label">Province / City</label>
					    <div class="col-sm-5">
					      <select class="form-control input-sm" id="residence" name="residence">
								<option value="">---Select---</option>
								@foreach(Location::getProvinces_Cities() as $location)
								<option value="{{$location->id}}" {{Input::old('residence') == $location->id ? 'selected' : ''}}>{{$location->name}}</option>
								@endforeach
							</select>							
						</div>
						<div class="col-sm-3" style="padding:0;">
								<div class="error">								
									{{$errors->first('residence', ':message')}}
								</div>
						</div>
					</div>	
					<div class="form-group">
					    <label for="address" class="col-sm-4 control-label">Address</label>
					    <div class="col-sm-5">
					     <textarea class="form-control input-sm" id="address" name="address">{{Input::old('address')}}</textarea>							
						</div>
						<div class="col-sm-3" style="padding:0;">
								<div class="error">								
									{{$errors->first('address', ':message')}}
								</div>
						</div>
					</div>
					<div class="form-group">
					    <label for="phone_number" class="col-sm-4 control-label">Phone</label>
					    <div class="col-sm-5">
					     <input type="text" class="form-control input-sm" id="phone_number" name="phone_number" value="{{Input::old('phone_number')}}">
					    </div>
						<div class="col-sm-3" style="padding:0;">
								<div class="error">								
									{{$errors->first('phone_number', ':message')}}
								</div>
						</div>
					</div>
				@else
					<div class="form-group">
					    <label for="surname" class="col-sm-4 control-label">Surname</label>
					    <div class="col-sm-5">
					      <input type="text" class="form-control" id="surname" name="surname" value="{{$candidate->surname}}">			      							
						</div>
					</div>
					<div class="form-group">
					    <label for="name" class="col-sm-4 control-label">Given name</label>
					    <div class="col-sm-5">
					      <input type="text" class="form-control" id="name" name="name" value="{{$candidate->name}}">						
						</div>
					</div>
					<div class="form-group">
					    <label for="surname" class="col-sm-4 control-label">Sex</label>
					    <div class="col-sm-5">
					      <div class="radio">
					      		@foreach(\Constants::getGenders() as $gender)
						  			<label><input type="radio" id="sex" name="sex" value="{{$gender->id}}" {{$candidate->sex == $gender->id ? 'checked' : ''}}>{{$gender->id}}</label>&nbsp&nbsp
								@endforeach
						  </div>							
						</div>
					</div>
					<div class="form-group">
					    <label for="date_of_birth" class="col-sm-4 control-label">Date Of Birth</label>
					    <div class="col-sm-5">
					      <input type="date" class="form-control input-sm" id="date_of_birth" name="date_of_birth" value="{{$candidate->date_of_birth}}">					    						
						</div>
					</div>
					<div class="form-group">
					    <label for="marital_status" class="col-sm-4 control-label">Marital Status</label>
					    <div class="col-sm-5">
					      <select class="form-control input-sm" id="marital_status" name="marital_status">
								<option value="">---Select---</option>
					      		@foreach(\Constants::getMaritalStatuses() as $status)
									<option value="{{$status->id}}" {{$candidate->marital_id == $status->id ? 'selected' : ''}}>{{Lang::get("local.marital.{$status->id}")}}</option>
								@endforeach
							</select>							
						</div>
					</div>
					<div class="form-group">
					    <label for="nationality" class="col-sm-4 control-label">Nationality</label>
					    <div class="col-sm-5">
					      <select class="form-control input-sm" id="nationality" name="nationality">
								<option value="">---Select---</option>
								@foreach(Country::getNationalities() as $nationality)
								<option value="{{$nationality->id}}" {{$candidate->nationality_id == $nationality->id ? 'selected' : ''}}>{{$nationality->nationality}}</option>
								@endforeach
							</select>						
						</div>
					</div>		
					<div class="form-group">
					    <label for="residence" class="col-sm-4 control-label">Province / City</label>
					    <div class="col-sm-5">
					      <select class="form-control input-sm" id="residence" name="residence">
								<option value="">---Select---</option>
								@foreach(Location::getProvinces_Cities() as $location)
								<option value="{{$location->id}}" {{$candidate->residence_id == $location->id ? 'selected' : ''}}>{{$location->name}}</option>
								@endforeach
							</select>							
						</div>
					</div>	
					<div class="form-group">
					    <label for="address" class="col-sm-4 control-label">Address</label>
					    <div class="col-sm-5">
					     <textarea class="form-control input-sm" id="address" name="address">{{$candidate->address}}</textarea>							
						</div>
					</div>
					<div class="form-group">
					    <label for="phone_number" class="col-sm-4 control-label">Phone</label>
					    <div class="col-sm-5">
					     <input type="text" class="form-control input-sm" id="phone_number" name="phone_number" value="{{$candidate->phone_number}}">
					    </div>
					</div>			
				@endif
				<!-- <div class="form-group profile-pic" style="position: absolute; width: 116px; top: 18px; left: 500px;">
					<img src="{{asset('assets/images/no-profile-pic.jpg')}}" alt="..." class="img-thumbnail">
					<div class="hide" style="position: absolute; top: 0; left: 100%;">
						<a href="" style="display: block; padding: 5px; text-align: center;"><i class="glyphicon glyphicon-pencil"></i></a>
						<hr style="margin: 0; opacity: .2;">
						<a href="" style="display: block; padding: 5px; text-align: center;"><i class="glyphicon glyphicon-trash"></i></a>
					</div>				
				</div>		 -->		
				<div class="box-footer">
					<button type="submit" class="btn btn-default" style="width: 100px;"><i class="fa fa-floppy-o"></i> Save</button>
				</div>
				{{Form::token()}}
			</form>
			</div>
		</div>
	</div>
	</div>
</div>
<div class="col-md-3 right-side-bar">
	
</div>
@endsection