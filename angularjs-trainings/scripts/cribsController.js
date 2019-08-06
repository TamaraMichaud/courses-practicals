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
		
		//couldn't work out how to access the last item from the array in order to get the max id to increment; so "pop()" will get that item so we can check it, but also removes it fromt he array, so we "push()" it back on after we've grabbed the id, then we can set newListing.id = id + 1 and also push that into the array!
		
		$scope.lastListing = $scope.cribs.data.pop();
		var maxId;
		if($scope.lastListing == undefined){
			newListing.id = 0;
			$scope.cribs.data.push(newListing);
		} else {
			maxId = $scope.lastListing.id;
//console.log("Max ID: " + maxId);
			newListing.id = maxId + 1;
			$scope.cribs.data.push($scope.lastListing);	
			$scope.cribs.data.push(newListing);
		}
		
		$scope.newListing = {};
	}

	
	$scope.editCrib = function(crib) {
		$scope.editListing = true;
		$scope.existingListing = crib;	
	}
	
	// nowhere do we actually need to "save" the edit; Angular provides 2-way data-binding; "scope.existingListing = crib" => as we update the inputs which have existingListing properties mapped; the corresponding elements with crib properties (i.e. the listing price/address/details) update in real-time
	
	$scope.saveCribEdit = function() {
		$scope.existingListing = {};
		$scope.editListing = false; // hide the edit form again
	}
	
	$scope.deleteCrib = function(listing) {
		
		var index = $scope.cribs.data.indexOf(listing);
		
//		console.log("Deleted Index: " + index);
//		console.log("Crib Address: " + $scope.cribs.data[index].address);
//		console.log("Index1 Address: " + $scope.cribs.data[1].address);
		
		
		$scope.cribs.data.splice(index, 1); // remove this element fromt the cribs array
		$scope.existingListing = {};
		$scope.editListing = false;
	}
	
	cribsFactory.getCribs().then(function(data) {

		$scope.cribs = data;
	}, function(error) {

		console.log(error); 
	});


	
	

});