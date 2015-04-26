angular.module('IndustryApp', [], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
})

.controller('IndustryController', function($scope, Industries, Industry) {
	$scope.industries = new Industries();
	$scope.industries.load();
})

.factory('Industries', function($http, Industry) {

	var Industries = function() {
		this.elements = [];
	};

	Industries.prototype.getElements = function(elements) {
		var industries = [];

		this.elements.forEach(function(data){
			if(!data.deleted){
				industries.push(data);
			}
		});
		return industries;
	};

	Industries.prototype.populate = function(element) {
		var industry = new Industry(element);
		this.elements.push(industry);
	};

	Industries.prototype.load = function() {
		var self = this;
		return $http.get('/api/industry/').then(function(response) {
			var data = response.data;

			// Populate all comments to the collection.
			data.forEach(function(element) {
				self.populate(element);
			});
		});
	};

	return Industries;
})

.factory('Industry', function($http) {

	var Industry = function(industry) {
		this.id = industry.id;
		this.name = industry.name;
		this.deleted = false;

		this.draft = {
			id : this.id,
			name : this.name
		};
	};
	
	Industry.prototype.delete = function(){			
		var self = this;		
		return $http({
			method:'DELETE',
			url : '/api/industry/' + this.id,
		}).then(function() {
			self.deleted = true;
		});
	};

	Industry.prototype.update = function() {
		return $http({
			method : 'PUT',
			url : '/api/industry/' + this.id,
			headers : {
				'Content-Type' : 'application/x-www-form-urlencoded'
			},
			data : $.param(this.draft)
		});
	};

	return Industry;
})
