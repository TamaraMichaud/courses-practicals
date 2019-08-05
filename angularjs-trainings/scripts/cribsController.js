angular
	.module('ngCribs')
	.controller('cribsController', function($scope, cribsFactory) {

	//$scope is an angular built-in for "this" (?)
	
	$scope.hello = 'Hello World!';
	$scope.cribs;
	
	$scope.priceInfo = {
		min: 0,
		max: 1000000
	}

	$scope.newListing = {};
	
	$scope.addCrib = function(newListing) {
		newListing.image = "image3";
		
//		newListing.id = maxId + 1; 
		$scope.cribs.data.push(newListing);
		$scope.newListing = {};
	}
	
	
	cribsFactory.getCribs().then(function(data) {

		$scope.cribs = data;
	}, function(error) {

		console.log(error); 
	});


	
	

});