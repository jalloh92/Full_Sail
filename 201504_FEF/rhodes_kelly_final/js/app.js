console.log("js loaded");

angular.module("myApp",["ngRoute"])
	.config(function($routeProvider){
		$routeProvider.when("/form",{
			templateUrl: "partials/form.html",
			controller: "formController"
		})
		.when("/menu",{
			templateUrl: "partials/menu.html",
			controller: "menuController"
		})
		.when("/details/:itemIdx",{
			templateUrl: "partials/details.html",
			controller: "detailsController"
		})
		.when("/edit/:itemIdx",{
			templateUrl: "partials/form.html",
			controller: "editController"
		})
		.otherwise({
			redirectTo: "/menu"
		})
	})
	.controller("formController",function($scope, myService){
		console.log("formController loaded");

		$scope.cupcake = {};

		$scope.onSave = function(){
			myService.addCupcake($scope.cupcake);
			$scope.cupcake = {};
			document.location.hash = "/menu";
		}
	}) // closes formController

	.controller("menuController",function($scope, myService){
		console.log("menuController loaded");

		$scope.cupcakeArray = myService.getCupcakes();

	}) // closes menuController

	.controller("detailsController",function($scope, myService, $routeParams){
		console.log("detailsController loaded");

		var theIndex = $routeParams.itemIdx;
		console.log(theIndex);		

		$scope.cupcake = myService.getCupcakeAt(theIndex);

		$scope.edit=function(){
			console.log("the index inside the detailsController is " + theIndex);
			document.location.hash="/edit/" + theIndex;
		}

		$scope.delete = function(){
			myService.deleteCupcakeAt(theIndex);
			document.location.hash = "/menu";
		}
	}) // closes menuController

	.controller("editController",function($scope, myService, $routeParams){
		console.log("editController loaded");

		var theIndex = $routeParams.itemIdx;
		console.log("the index inside the editController is " + theIndex);

		$scope.cupcake = myService.getCupcakeAt(theIndex);

		$scope.onSave = function(){
			myService.editCupcake($scope.cupcake, theIndex);
			document.location.hash = "/menu";
			}
	}) // closes editController

	.service("myService",function(){
		cupcakeArray = [];

		this.addCupcake = function(pItem){
			cupcakeArray.push(pItem);
			var str = JSON.stringify(cupcakeArray);
			localStorage.setItem("cupcakeStorage", str);
		}

		this.getCupcakes = function(){
			var str = localStorage.getItem("cupcakeStorage", str);
			cupcakeArray = JSON.parse(str) || cupcakeArray;
			return cupcakeArray;
		}

		this.deleteCupcakeAt = function(pIdx){
			cupcakeArray.splice(pIdx,1);
			var str = JSON.stringify(cupcakeArray);
			localStorage.setItem("cupcakeStorage", str);
		}

		this.getCupcakeAt = function(pIdx){
			var str = localStorage.getItem("cupcakeStorage", str);
			cupcakeArray = JSON.parse(str) || cupcakeArray;
			return cupcakeArray[pIdx];
		}

		this.editCupcake = function(pItem, pIdx){
			cupcakeArray.splice(pIdx,1, pItem);
			var str = JSON.stringify(cupcakeArray);
			localStorage.setItem("cupcakeStorage", str);
		}

	}) // closes myService