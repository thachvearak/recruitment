@extends('layouts.default')

@section('candidate')
	<div class="left-side-bar pull-left">
		<ul class="list-unstyled">
			<li><h3 class="title"><a href="{{URL::route('home')}}">Dashboard</a></h3></li>
		</ul>
		<ul class="list-unstyled">
			<li><h3 class="title">CV and Cover Letters</h3>
				<ul class="list-unstyled">
					<li role="presentation"><a href="{{URL::route('candidate.cv.create')}}">Create a CV</a><hr class="menu-seperator"></li>
					<li role="presentation"><a href="#industry">My CV</a><hr class="menu-seperator"></li>
					<li role="presentation"><a href="#location">Create a cover letter</a><hr class="menu-seperator"></li>
					<li role="presentation"><a href="#salary">My cover letter</a><hr class="menu-seperator"></li>
				</ul>
			</li>
		</ul>
		<ul class="list-unstyled">
			<li><h3 class="title">Jobs</h3>
				<ul class="list-unstyled">
					<li role="presentation"><a href="#category">Recommended jobs</a><hr class="menu-seperator"></li>
					<li role="presentation"><a href="#industry">Job alerts</a><hr class="menu-seperator"></li>
					<li role="presentation"><a href="#location">Saved jobs</a><hr class="menu-seperator"></li>
					<li role="presentation"><a href="#salary">Apply list</a><hr class="menu-seperator"></li>
				</ul>
			</li>
		</ul>
		<ul class="list-unstyled">
			<li><h3 class="title">Account Settings</h3>
				<ul class="list-unstyled">
					<li role="presentation"><a href="#category">My profile</a><hr class="menu-seperator"></li>
					<li role="presentation"><a href="#industry">Change email</a><hr class="menu-seperator"></li>
					<li role="presentation"><a href="#location">Change password</a><hr class="menu-seperator"></li>
					<li role="presentation"><a href="{{URL::route('user.logout')}}">logout</a><hr class="menu-seperator"></li>
				</ul>
			</li>
		</ul>
	</div>
	<div class="middle-wrapper pull-left">
	
	
	</div>
	<div class="right-side-bar pull-left"></div>
@endsection