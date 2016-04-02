angular.module("mySecondFirstApp",[])

	.controller("controllerOne", function($scope){
		$scope.itemArray = [];
		
		$scope.saveItem = function(){
			$scope.itemArray.push($scope.nameInput); // push what's entered to the array
			$scope.nameInput = ""; // clear input field
		} // close $scope.saveItem

		$scope.removeItem = function(idx){
			$scope.itemArray.splice(idx,1); // splice arguments:  where to start & how many
		} // close $scope.removeItem

}); // close controller