console.log("js loaded");

angular.module("myApp",["ngRoute"])
	.config(function($routeProvider){
		$routeProvider.when("/form",{
			templateUrl: "partials/form.html",
			controller: "formController"
		})
		.when("/list",{
			templateUrl: "partials/list.html",
			controller: "listController"
		})
		.when("/edit/:itemIdx",{
			templateUrl: "partials/form.html",
			controller: "editController"
		})
	    .otherwise({
	        redirectTo: '/list'
	    });
	})
	.controller("formController", function($scope, myService){

		$scope.item = {};

		$scope.onSave = function(){
			myService.addThing($scope.item);
			$scope.item = {};
			document.location.hash = "/list";
		}

	})
	.controller("listController", function($scope, myService){

		$scope.itemArray = myService.getStuff();

		$scope.remove = function(idx){
			myService.removeThing(idx);
		}
		
	})
	.controller("editController", function($scope, myService, $routeParams){

		var theIndex = $routeParams.itemIdx;
		$scope.item = myService.getThing(theIndex);

		$scope.onSave = function(){
			myService.editThing(theIndex, $scope.item);
			document.location.hash = "/list";
		}
		
	})
	.service("myService", function(){

		itemArray = [];

		this.addThing = function(thing){
			itemArray.push(thing);
			var str = JSON.stringify(itemArray);
			localStorage.setItem("practice",str);
		}

		this.getStuff = function(){
			var str = localStorage.getItem("practice",str);
			itemArray = JSON.parse(str) || itemArray;
			return itemArray;
		}

		this.removeThing = function(pIdx){
			itemArray.splice(pIdx,1);
			var str = JSON.stringify(itemArray);
			localStorage.setItem("practice",str);
		}

		this.getThing = function(pIdx){
			var str = localStorage.getItem("practice",str);
			itemArray = JSON.parse(str) || itemArray;
			return itemArray[pIdx];
		}

		this.editThing = function(pIdx,pItem){
			itemArray.splice(pIdx,1,pItem);
			var str = JSON.stringify(itemArray);
			localStorage.setItem("practice",str);

		}
		
	})