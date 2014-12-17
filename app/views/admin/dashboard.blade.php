@extends('layouts.admin') @section('home')
<div class="row" id="dashboard" ng-app="DesireApp">
	<div class="col-sm-6">
		<div class="panel panel-default" id="industry" 	ng-controller="IndustryController">
			<div class="panel-heading">
				<h3 class="panel-title">Industry</h3>
			</div>
			<div class="panel-body">
				<ul class="list-unstyled">
					<li ng-repeat="industry in industries.getElements()"><br>
						<div style="flex: 1 50%;">
							<span class="title"><% industry.name %></span>
							<input type="text"
								class="form-control input-mini title hide" id="txt-industry" style="width: 80%;"
								ng-model="industry.draft.name" ng-keydown="$event.keyCode == 13 ? industry.update() : null" onkeyup="input_edit_keyup(this,event)">
						</div>
						<div>
							<a class="btn btn-success" id="btn-edit" onclick="btn_edit_click(this)"><span class="glyphicon glyphicon-edit"></span></a>
							<a class="btn btn-danger" ng-click="industry.delete()"><span
								class="glyphicon glyphicon-remove"></span></a>
						</div></li>
				</ul>
					<div class="form-group" style="margin-bottom: 0; margin-top: 18px;">
						<input type="text" class="form-control"
							style="display: inline-block; width: 77%; margin-right: 5px;"  ng-model="industries.new_industry.name"> <a
							class="btn btn-info" ng-click="industries.addNew()">Add New</a>
					</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
	</div>
</div>
@endsection
