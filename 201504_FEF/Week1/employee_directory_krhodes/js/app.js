angular.module("myApp",[])
	.controller("myController", function($scope){
		//$scope.test = "hi there";

		$scope.emp = {};

		$scope.itemArray = [];

		$scope.onSave = function(){
			$scope.itemArray.push($scope.emp);
			$scope.emp = {};
		}

		$scope.removeItemAt = function(idx){
			$scope.itemArray.splice(idx,1);
		}

	});