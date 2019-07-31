angular
	.module('ngCribs')
	.controller('cribsController', function($scope, cribsFactory) {

	$scope.hello = 'Hello World!';
	$scope.cribs;

	cribsFactory.getCribs().then(function(data) {

		$scope.cribs = data;
	}, function(error) {

		console.log(error); 
	});

	$scope.sayHello = function() {

		console.log("Hello There");
	}


});