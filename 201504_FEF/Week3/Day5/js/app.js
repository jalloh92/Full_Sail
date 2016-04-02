// Defines Angluar Module with the Routing dependency
angular.module("MyApp",["ngRoute"])

	// Configure out application
	// $routeProvider is the object we use to configure out routes.
	.config(function($routeProvider){
		// $routeProvider.when("route url", {configuration obj})
		$routeProvider.when("/items",{
			templateUrl : "partials/list.html",
			controller : "ListController"
		}).when("/new",{
			templateUrl : "partials/form.html",
			controller : "NewItemController"
		}).when("/edit/:itemIdx",{ // need the ":"" to indicate that it's a variable
			templateUrl : "partials/form.html",
			controller : "EditItemController"
		}) 
		.otherwise({
		redirectTo: "/items"
		})
	})

	// Defines the cotroller holding the logic for our list.
	.controller("ListController",function($scope, MyService){
		
		$scope.dataArray = MyService.getItems();
		
		$scope.removeItemAt = function(idx){
			MyService.removeItemAt(idx);
		}

	})

	// Defines the cotroller holding the logic for adding a new item.
	.controller("NewItemController",function($scope, MyService){ 
		
		$scope.person = {};

		$scope.onSave = function(){
			MyService.addItem($scope.person);
			$scope.person = {};
			console.log($scope.dataArray);
			document.location.hash = "/items";
		}
	})

	.controller("EditItemController",function($scope,MyService,$routeParams){ // $routeParams is an angular thing
		console.log($routeParams);

		var theIndex = $routeParams.itemIdx;
		$scope.person = MyService.getItemAt(theIndex);

		$scope.onSave = function(){
			MyService.updateItemAt($scope.person,theIndex);
			document.location.hash = "/items";
		}


	})

	// Defines our service
	.service("MyService",function(){ 
		
		var itemArray = [];
		this.getItems = function(){ 	
			var str = localStorage.getItem("ourFirstLS");
			itemArray = JSON.parse(str) || itemArray; 
			return itemArray;
		}

		// Retruns the item at a specified index in our Array
		this.getItemAt = function(pIndex){
			this.getItems(); // need to run so that we are pulling from local storage
			return itemArray[pIndex];
		}

		// Pushes pItem into the master array.
		// All other copies of the itemArray update thanks to binding
		this.addItem = function(pItem){
			itemArray.push(pItem);
			var str = JSON.stringify(itemArray);
			localStorage.setItem("ourFirstLS",str); 
		}

		// Update the object at the specified index
		this.updateItemAt = function(pItem,pIndex){
			itemArray.splice(pIndex,1,pItem);
			var str = JSON.stringify(itemArray);
			localStorage.setItem("ourFirstLS",str); 
		}

		// Splices out the item at the given index
		this.removeItemAt = function(pIndex){
			itemArray.splice(pIndex,1);
			var str = JSON.stringify(itemArray);
			localStorage.setItem("ourFirstLS",str); 
		}
	})	 