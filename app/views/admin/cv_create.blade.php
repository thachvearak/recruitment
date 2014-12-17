@extends('layouts.admin') @section('cv')
<div id="create-cv">
	<form method="post" action="{{URL::route('admin.cv.create.store')}}">
		<div class="row">
			<div class="col-sm-6">
				<div class="panel panel-default" id="basic-info">
					<div class="panel-heading">
						<h3 class="panel-title">Basic Information</h3>
					</div>
					<div class="panel-body">
						<div class="row input-elements">
							<div class="col-sm-3 label-title">
								<label>Surname</label>
							</div>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="surname"
									name="surname">
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-3 label-title">
								<label>Given name</label>
							</div>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="name" name="name">
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-3 label-title">
								<label>Sex</label>
							</div>
							<div class="col-sm-9">
								<div class="radio input-element">
									<label><input type="radio" id="sex" name="sex" value="M">Male </label>&nbsp&nbsp
									<label><input type="radio" id="sex" name="sex" value="F">Female</label>
								</div>
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-3 label-title">
								<label>Date Of Birth</label>
							</div>
							<div class="col-sm-9">
								<input type="date" class="form-control" id="date_of_birth"
									name="date_of_birth">
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-3 label-title">
								<label>Marital Status</label>
							</div>
							<div class="col-sm-9">
								<select class="form-control" id="marital-status"
									name="marital-status">
									<option value="">Select ...</option>
									<option value="0">Single</option>
									<option value="1">Marriage</option>
								</select>
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-3 label-title">
								<label>Nationality</label>
							</div>
							<div class="col-sm-9">
								<select class="form-control" id="nationality" name="nationality">
									<option value="">Select ...</option>
									<option value="0">Cambodian</option>
									<option value="1">Thai</option>
									<option value="2">Vietnamese</option>
									<option value="3">Japanese</option>
									<option value="4">Korea</option>
									<option value="5">American</option>
								</select>
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-3 label-title">
								<label>Location Of Residence</label>
							</div>
							<div class="col-sm-9">
								<select class="form-control" id="residence" name="residence">
									<option value="">Select ...</option>
									<option value="0">Phnom Penh</option>
									<option value="1">Kandal</option>
									<option value="2">Prey Veng</option>
									<option value="3">Kampong Chhnang</option>
									<option value="4">Kampong Cham</option>
									<option value="5">Kampot</option>
								</select>
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-3 label-title">
								<label>Address</label>
							</div>
							<div class="col-sm-9">
								<textarea class="form-control" id="address" name="address"></textarea>
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-3 label-title">
								<label>Phone</label>
							</div>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="phone_number"
									name="phone_number">
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-3 label-title">
								<label>Email</label>
							</div>
							<div class="col-sm-9">
								<input type="email" class="form-control" id="email"
									name="email">
							</div>
						</div>						
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Expectation</h3>
					</div>
					<div class="panel-body">
						<div class="row input-elements">
							<div class="col-sm-3 label-title">
								<label>Industry</label>
							</div>
							<div class="col-sm-9">
								<select class="form-control" id="desired_industry"
									name="desired_industry">
									<option value="">Select ...</option>
									<option value="101">Accounting/Audit/Tax Services</option>
									<option value="12">Advertising/Media/Publishing/Printing</option>
									<option value="103">Agriculture/Foresty/Fishing</option>
									<option value="104">Airline</option>
									<option value="7">Architecture/Building/Construction</option>
									<option value="23">Automotive - Vehicle</option>
									<option value="5">Banking &amp; Finance</option>
									<option value="22">Catering</option>
									<option value="110">Chemical/Plastic/Paper/Petrochemical</option>
									<option value="111">Civil Services</option>
								</select>
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-3 label-title">
								<label>Function</label>
							</div>
							<div class="col-sm-9">
								<select class="form-control" id="desired_function"
									name="desired_function">
									<option value="">Select ...</option>
									<option value="1">Accounting</option>
									<option value="2">Administration</option>
									<option value="8">Architecture/Engineering</option>
									<option value="112">Assistant/Secretary</option>
									<option value="100">Audit/Taxation</option>
									<option value="26">Banking/Insurance</option>
									<option value="23">Catering/Restaurant</option>
									<option value="11">Consultancy</option>
									<option value="16">Customer Service</option>
									<option value="104">Design</option>
									<option value="13">Education/Training</option>
									<option value="101">Finance</option>
									<option value="18">Freight/Shipping/Delivery/Warehouse</option>
									<option value="102">Hotel/Hospitality</option>
									<option value="103">Human Resource</option>
									<option value="4">Information Technology</option>
									<option value="15">Lawyer/Legal Service</option>
									<option value="106">Management</option>
									<option value="28">Manufacturing</option>
									<option value="3">Marketing</option>
									<option value="10">Media/Advertising</option>
									<option value="25">Medical/Health/Nursing</option>
									<option value="20">Merchandising/Purchasing</option>
								</select>
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-3 label-title">
								<label>Location</label>
							</div>
							<div class="col-sm-9">
								<select class="form-control" id="desired_location"
									name="desired_location">
									<option value="">Select ...</option>
									<option value="0">Phnom Penh</option>
									<option value="1">Kandal</option>
									<option value="2">Prey Veng</option>
									<option value="3">Kampong Chhnang</option>
									<option value="4">Kampong Cham</option>
									<option value="8">Kampot</option>
								</select>
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-3 label-title">
								<label>Salary</label>
							</div>
							<div class="col-sm-9">
								<select class="form-control" id="desired_salary"
									name="desired_salary">
									<option value="">Select ...</option>
									<option value="1">Negotiable</option>
									<option value="2">&lt;$200</option>
									<option value="3">$200-$500</option>
									<option value="4">$500-$999</option>
									<option value="5">$1000-$2000</option>
									<option value="6">&gt;$2000</option>
								</select>
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-3 label-title">
								<label>Position</label>
							</div>
							<div class="col-sm-9">
								<select class="form-control" id="desired_position"
									name="desired_position">
									<option value="">Select ...</option>
									<option value="0">Manager</option>
									<option value="1">Staff</option>
								</select>
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Available Date</label>
							</div>
							<div class="col-sm-8">
								<input type="date" class="form-control" id="available_date"
									name="available_date">
							</div>
						</div>
						<div class="row input-elements">
							<div class="col-sm-4 label-title">
								<label>Current Job Title</label>
							</div>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="current_job_title"
									name="current_job_title">
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<div class="row" id="cv-bottom-bar">
			<hr class="seperation">
			<div>
				<a href="{{URL::route('admin.cv.index')}}"><span class="glyphicon glyphicon-chevron-left" style="margin-right: 5px; font-size: 12px;"></span>View CV</a>
				<button type="submit" class="btn btn-success"
					style="width: 74px; float: right;">Create</button>
				<button type="button" class="btn btn-warning"
					style="width: 74px; float: right; margin-right: 10px">New</button>
			</div>
		</div>
		{{Form::token()}}
	</form>
</div>
@endsection
