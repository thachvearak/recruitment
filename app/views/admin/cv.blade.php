@extends('layouts.admin') 

@section('cv')
<div id="cv">
	<div class="row">
			<div>
				<a href="{{URL::route('admin.cv.create')}}" class="btn btn-default">Create CV</a>
			</div>			
			<hr class="seperation">
		</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">List of CV</h3>
			  </div>
			  <div class="panel-body" style="overflow-x: scroll;">
			   	<table class="table table-hover table-condensed" style="width: 1831px;">
			   	<thead>
    				<tr>
    					<th>Surname</th>
    					<th>Name</th>
    					<th>Sex</th>
    					<th>Date Of Birth</th>
    					<th>Marital Status</th>
    					<th>Nationality</th>
    					<th>Phone Number</th>
    					<th>Email</th>
    					<th>Residence</th>
    					<th>Address</th>
    					<th>Industry</th>
    					<th>Function</th>
    					<th>Location</th>
    					<th>Salary</th>
    					<th>Position</th>
    					<th>Current Job Title</th>
    					<th>Available Date</th>
    				</tr> 
    			</thead>   				
    			<tbody>
    				@foreach($cvs as $cv)
    				<tr>
    					<td>{{$cv->surname}}</td>
    					<td>{{$cv->name}}</td>
    					<td>{{$cv->sex}}</td>
    					<td>{{$cv->date_of_birth}}</td>
    					<td>{{$cv->marital_status}}</td>
    					<td>{{$cv->nationality}}</td>
    					<td>{{$cv->phone_number}}</td>
    					<td>{{$cv->email}}</td>
    					<td>{{$cv->residence}}</td>
    					<td>{{$cv->address}}</td>
    					<td>{{$cv->desired_industry}}</td>
    					<td>{{$cv->desired_function}}</td>
    					<td>{{$cv->desired_location}}</td>
    					<td>{{$cv->desired_salary}}</td>
    					<td>{{$cv->desired_position}}</td>
    					<td>{{$cv->current_job_title}}</td>
    					<td>{{$cv->available_date}}</td>
    				</tr>
    				@endforeach
    			</tbody>
  				</table>
  			</div
			</div>
		</div>
	</div>
</div>
@endsection