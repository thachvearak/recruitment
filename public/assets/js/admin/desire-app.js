angular.module('DesireApp', [], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
})

.controller('IndustryController', function($scope, Industries, Industry) {
	$scope.industries = new Industries();
	$scope.industries.load();
})

.controller('FunctionController', function($scope, Functions, Func) {
	$scope.functions = new Functions();
	$scope.functions.load();
})

.factory('Industries', function($http, Industry) {

	var Industries = function() {
		this.elements = [];	
		
		this.new_industry = {
			name : ''
		};
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
	
	Industries.prototype.addNew =  function(){
		var self = this;
			return $http({
						method: 'POST',
						url: '/api/industry/',
						headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
						data: $.param(this.new_industry)
					}).then(function(response){
						var element = response.data;
						
						// Add new comment to the collection.
						if(element !== null){
							self.populate(element);
						}						
						
						// Clear new comment object.
						self.new_industry.name = '';
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
		var self = this;
		return $http({
			method : 'PUT',
			url : '/api/industry/' + this.draft.id,
			data: $.param(this.draft),
			headers: { 'Content-Type' : 'application/x-www-form-urlencoded' }
		}).then(function(response) {
			self.name = self.draft.name;
		});
	};

	return Industry;
})
