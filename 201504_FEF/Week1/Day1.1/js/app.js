//creating module, arguments are name and array of modules it's dependent on
// chaining controller, arguments are name & logic for controller
angular.module("MyFirstApp",[])
	.controller("ControllerOne",function($scope){ // $scope is a reserved word, have to pass as an argument, have to use that name
		//console.log($scope.testVar); // scope is there for encapsulation
		$scope.testVar = "ASDF"; // assigning value to $scope.testVar

		$scope.counter = 0;

		$scope.myFunction = function(){ // on the scope so it's available to the HTML
			$scope.counter ++;
			console.log($scope.counter);

		}
	}) 