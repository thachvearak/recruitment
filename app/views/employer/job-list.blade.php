@extends('layouts.default') @section('employer')
<div class="left-side-bar pull-left">
	<div>@include('menu.menu')</div>
</div>
<div id="employer" class="middle-wrapper pull-left">
	<div id="job-list">
		<div class="title-bar">Jobs List</div>
		<div class="content-wrapper">
			<table class="table table-condensed table-bordered">
				<thead>
					<tr>
						<th>Title</th>
						<th>Published Date</th>
						<th>Closing Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($jobs as $job)
					<tr>
						<td>{{$job->title}}</td>
						<td>{{$job->published_date}}</td>
						<td>{{$job->closing_date}}</td>
						<td>
							<a href="">Edit</a><br>
							<a href="">Delete</a><br> 
							<a href="">Preview</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="right-side-bar pull-left"></div>
@endsection
