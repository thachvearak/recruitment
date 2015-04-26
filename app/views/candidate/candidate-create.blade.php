@extends('layouts.default') @section('candidate')
<div class="left-side-bar pull-left">
	<div>
		@include('menu.menu')
	</div>
</div>
<div id="cv-create" class="middle-wrapper pull-left">
	<div class="outter-box">
		<form method="post" action="{{URL::route('candidate.cv.create.post')}}">
			<div class="box">
				<div class="view-name title-bar">
					<strong>CV</strong>
					<a href="javascript:onclick" class="btn-min-max glyphicon glyphicon-chevron-up" style="color: #fff; float: right; text-decoration: none;"></a>
				</div>
				<div class="box-body">
					<div class="inner-wrapper">
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>CV title</label>
							</div>
							<div class="col-sm-8">
								<input type="text" class="form-control input-sm" id="cv-name"
									name="cv-name">
							</div>
						</div>
						<div class="row input-elements" style="display: flex; align-items: baseline;">
							<div class="col-sm-4 label-title">
								<label>Who can see your CV</label>
							</div>
							<div class="col-sm-8">
								<div class="radio input-element">
									<label><input type="radio" id="cv-privacy" name="cv-privacy" value="0">Everyone</label>&nbsp;&nbsp;&nbsp;
									<label><input type="radio" id="cv-privacy" name="cv-privacy" value="1">Only you</label>
								</div>
							</div>
						</div>					
					</div>
				</div>
			</div>
			<div class="box">
				<div class="view-name title-bar">
					<strong>Basic Information</strong>
					<a href="javascript:onclick" class="btn-min-max glyphicon glyphicon-chevron-up" style="color: #fff; float: right; text-decoration: none;"></a>
				</div>
				<div class="box-body">
					<div class="inner-wrapper">
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Surname</label>
							</div>
							<div class="col-sm-8">
								<span class="data"><strong>{{$candidate->surname}}</strong></span>
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Given name</label>
							</div>
							<div class="col-sm-8">
								<span class="data"><strong>{{$candidate->name}}</strong></span>
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Sex</label>
							</div>
							<div class="col-sm-8">
								<span class="data"><strong>{{Lang::get("local.gender.{$candidate->sex}")}}</strong></span>
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Date Of Birth</label>
							</div>
							<div class="col-sm-8">
								<span class="data"><strong>{{!empty($candidate->date_of_birth) ? \Carbon\Carbon::createFromFormat('Y-m-d', $candidate->date_of_birth)->format('Y-F-d') : '' }}</strong></span>
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Marital Status</label>
							</div>
							<div class="col-sm-8">
								<span class="data"><strong>{{Lang::get("local.marital.{$candidate->marital_id}")}}</strong></span>	
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Nationality</label>
							</div>
							<div class="col-sm-8">
								<span class="data"><strong>{{$candidate->nationality}}</strong></span>
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Residence</label>
							</div>
							<div class="col-sm-8">
								<span class="data"><strong>{{$candidate->residence}}</strong></span>
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Address</label>
							</div>
							<div class="col-sm-8">
								<span class="data"><strong>{{$candidate->address}}</strong></span>
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Phone</label>
							</div>
							<div class="col-sm-8">
								<span class="data"><strong>{{$candidate->phone_number}}</strong></span>
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Email</label>
							</div>
							<div class="col-sm-8">
								<span class="data"><strong>{{Auth::user()->email}}</strong></span>
							</div>
						</div>
					</div>			
				</div>
			</div>
			<div class="box">
				<div class="view-name title-bar">
					<strong>Education Background</strong>
					<a href="javascript:onclick" class="btn-min-max glyphicon glyphicon-chevron-up" style="color: #fff; float: right; text-decoration: none;"></a>
				</div>
				<div class="box-body">					
					<div class="inner-wrapper">
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Institute</label>
							</div>
							<div class="col-sm-8">
								<input type="text" class="form-control input-sm" id="institute"
									name="institute">
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Major</label>
							</div>
							<div class="col-sm-8">
								<input type="text" class="form-control input-sm" id="major" name="major">
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Degree</label>
							</div>
							<div class="col-sm-8">
								<select class="form-control input-sm" id="degree" name="degree">
									<option value="">--Select--</option>
									@foreach(\Constants::getDegrees() as $degree)
									<option value="{{$degree->id}}">{{$degree->description}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Situation</label>
							</div>
							<div class="col-sm-8">
								<select class="form-control input-sm" id="situation" name="situation">
									<option value="">--Select--</option>
									@foreach(\Constants::getSchoolingSituations() as $situation)
									<option value="{{$situation->id}}">{{$situation->description}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Graduation</label>
							</div>
							<div class="col-sm-8">
								<div class="form-inline">
									<select class="sl-year form-control input-sm"
										id="graduation-year" name="graduation-year">
										<option value=""></option>
										@foreach(Config::get('setup.years') as $year)
											<option>{{$year}}</option>
										@endforeach
									</select>&nbsp;<span>Year</span>
									&nbsp;&nbsp;&nbsp;
									<select
										class="sl-month form-control input-sm" id="graduation-month"
										name="graduation-month">
										<option value=""></option>
										@foreach(Config::get('setup.months') as $month)
											<option value="{{$month['num']}}">{{$month['name']}}</option>
										@endforeach
									</select>&nbsp;<span>Month</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="box">
				<div class="view-name title-bar">
					<strong>Work Experience</strong>
					<a href="javascript:onclick" class="btn-min-max glyphicon glyphicon-chevron-up" style="color: #fff; float: right; text-decoration: none;"></a>
				</div>
				<div class="box-body">
				<div class="inner-wrapper">
					<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Job title</label>
							</div>
							<div class="col-sm-8">
								<input type="text" class="form-control input-sm" id="job-title"
									name="job-title">
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Company</label>
							</div>
							<div class="col-sm-8">
								<input type="text" class="form-control input-sm" id="company"
									name="company">
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Industry</label>
							</div>
							<div class="col-sm-8">
								<select class="form-control input-sm" id="ex-industry" name="ex-industry">
									<option value="">---Select---</option> 
									@foreach(\Industry::getIndustries() as $industry)
										<option value="{{$industry->id}}">{{$industry->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Location</label>
							</div>
							<div class="col-sm-8">
								<select class="sl-location form-control input-sm" id="ex-location" name="ex-location">
									@foreach(\Location::getProvinces_Cities() as $location)
									<option value="{{$location->id}}">{{$location->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>From</label>
							</div>
							<div class="col-sm-8">
								<div class="form-inline">
									<select class="sl-year form-control input-sm"
										id="graduation-year" name="graduation-year">
										<option value=""></option>
										@foreach(Config::get('setup.years') as $year)
											<option>{{$year}}</option>
										@endforeach
									</select>&nbsp;<span>Year</span>
									&nbsp;&nbsp;&nbsp;
									<select
										class="sl-month form-control input-sm" id="graduation-month"
										name="graduation-month">
										<option value=""></option>
										@foreach(Config::get('setup.months') as $month)
											<option value="{{$month['num']}}">{{$month['name']}}</option>
										@endforeach
									</select>&nbsp;<span>Month</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="box">
				<div class="view-name title-bar">
					<strong>Skills</strong>
					<a href="javascript:onclick" class="btn-min-max glyphicon glyphicon-chevron-up" style="color: #fff; float: right; text-decoration: none;"></a>
				</div>
				<div class="box-body">
					<div class="inner-wrapper">
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Skill</label>
							</div>
							<div class="col-sm-8">
								<input type="text" class="form-control input-sm" id="skill" name="skill">
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Year of experience</label>
							</div>
							<div class="col-sm-8">
								<input type="text" class="form-control input-sm" id="year-experience" name="year-experience" style="width: 54px;">
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Level</label>
							</div>
							<div class="col-sm-8">
								<select class="form-control input-sm" id="skill-level" name="skill-level" style="width: 115px;">
									<option value="">---Select---</option>
									@foreach(\Constants::getLevels() as $level)
									<option value="{{$level->id}}">{{$level->description}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="box">
				<div class="view-name title-bar">
					<strong>Languages</strong>
					<a href="javascript:onclick" class="btn-min-max glyphicon glyphicon-chevron-up" style="color: #fff; float: right; text-decoration: none;"></a>
				</div>
				<div class="box-body">
					<div class="inner-wrapper">
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Language</label>
							</div>
							<div class="col-sm-8">
								<input type="text" class="form-control input-sm" id="language"
									name="language">
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Level</label>
							</div>
							<div class="col-sm-8">
								<select class="form-control input-sm" id="language-level"
									name="language-level" style="width: 115px;">
									<option value="">---Select---</option>
									<option value="0">Poor</option>
									<option value="1">Fair</option>
									<option value="2">Good</option>
									<option value="3">Very Good</option>
									<option value="4">Excellent</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="box">
				<div class="view-name title-bar" style="border-bottom: none;">
					<strong>Expectation</strong>
					<a href="javascript:onclick" class="btn-min-max glyphicon glyphicon-chevron-up" style="color: #fff; float: right; text-decoration: none;"></a>
				</div>
				<div class="box-body">
					<div class="inner-wrapper">
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Function</label>
							</div>
							<div class="col-sm-8">
								<select class="form-control input-sm" id="function" name="desired_function">
									<option value="">---Select---</option> 
									@foreach(\Func::getFunctions() as $function)
									<option value="{{$function->id}}">{{$function->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Industry</label>
							</div>
							<div class="col-sm-8">
								<select class="form-control input-sm" id="industry" name="desired_industry">
									<option value="">---Select---</option> 
									@foreach(\Industry::getIndustries() as $industry)
									<option value="{{$industry->id}}">{{$industry->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Location</label>
							</div>
							<div class="col-sm-8">
								<select class="sl-location form-control input-sm" id="location" name="desired_location">
									<option value="">---Select---</option> 
									@foreach(\Location::getProvinces_Cities() as $location)
									<option value="{{$location->id}}">{{$location->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Salary</label>
							</div>
							<div class="col-sm-8">
								<select class="sl-salary form-control input-sm" id="salary" name="desired_salary">
									<option value="">---Select---</option> 
									@foreach(\Salary::getSalaries() as $salary)
										<option value="{{$salary->id}}">{{$salary->min}} ~ {{$salary->max}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-default" style="width: 100px;"><i class="fa fa-floppy-o"></i> Save</button>
				<button type="button" class="btn btn-default" style="width: 100px;"><i class="fa fa-newspaper-o"></i> Preview</button>
			</div>			
		</form>
	</div>
	<div class="right-side-bar pull-left"></div>
	@endsection