app_candidate.directive("alert", function(){
	return {
		restrict: "E",
		template: '<div class="alert">' +
						'<span class="alert-topic">{{topic}}</span>' +
						'<span class="alert-description" ng-transclude></span>' +
					'</div>',
		scope:{
			topic : '@'
		},
		replace: true,
		transclude: true
	};
});