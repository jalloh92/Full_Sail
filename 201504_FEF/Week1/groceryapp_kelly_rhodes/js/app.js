angular.module("groceryApp",[])

	.controller("controllerOne", function($scope, MyService){
		$scope.itemArray = MyService.getItems(); // itemArray will be populated from MyService via getItems function
		$scope.item = {}; // declaring object 'item'

		$scope.saveItem = function(){
			MyService.addItem($scope.item); // push what's entered to the array via MyService
			$scope.item = ""; // clear input field
		} // close $scope.saveItem

		$scope.removeItem = function(idx){
			MyService.removeItemAt(idx); // remove items from the array via MyService
		} // close $scope.removeItem

}) // close controller
	.service("MyService", function(){
		var itemArray = []; 

		this.getItems = function(){ 
			return itemArray;
		}

		this.addItem = function(pItem){
			itemArray.push(pItem);
		}

		this.removeItemAt = function(pIndex){
			itemArray.splice(pIndex,1);
		}
	}) // close service