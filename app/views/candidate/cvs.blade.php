@extends('layouts.default') 

@section('candidate')
<div class="col-md-2 left-side-bar">
	<div>
		@include('menu.menu')
	</div>
</div>
<div id="cvs" class="col-md-7 middle-wrapper">
	<div>
		<div class="view-name title-bar">
			<strong>CV</strong>
		</div>
		<div class="box-body">
			<table class="table table-condensed table-bordered">
			  <thead>
			  	<tr>
			  		<th>Title</th>
			  		<th>Searchable</th>
			  		<th>Viewed</th>
			  		<th>Completeness</th>
			  		<th>Update</th>
			  		<th>Action</th>
			  	</tr>
			  </thead>
			  <tbody>
			  @foreach($cvs as $cv)
			  	<tr>
			  		<td>{{$cv->title}}</td>
			  		<td><i class="glyphicon {{$cv->searchable == 1 ? 'glyphicon-ok' : 'glyphicon-remove'}}"></i></td>
			  		<td></td>
			  		<td></td>
			  		<td>{{$cv->updated_at}}</td>
			  		<td>
			  			<a href="{{URL::route('candidate.cv.create.edit', array($cv->id))}}">Edit</a><br>
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
<div class="col-md-3 right-side-bar"></div>
@endsection