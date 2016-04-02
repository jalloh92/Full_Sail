// console.log("js loaded");

angular.module("myApp", ['ngRoute'])
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
			redirectTo: ("/list")
		})
	})
	.controller("formController", function($scope, myService){
		console.log("formController loaded");

		$scope.item = {};

		$scope.onSave = function(){
			myService.addItem($scope.item);
			$scope.item = {};
			document.location.hash = "/list";
		}

	})
	.controller("listController", function($scope, myService){
		console.log("listController loaded");

		$scope.itemArray = myService.getItems();

		$scope.delete = function(idx){
			myService.deleteItemAt(idx);
		}

	})
	.controller("editController", function($scope, myService, $routeParams){
		console.log("editController loaded");

		var theIndex = $routeParams.itemIdx;

		$scope.item = myService.getItemAt(theIndex);

		$scope.onSave = function(){
			myService.editItemAt($scope.item,theIndex);
			document.location.hash = "/list";
		}

	})
	.service("myService", function(){
		console.log("myService loaded");

		itemArray = [];

		this.addItem = function(pItem){
			itemArray.push(pItem);
			var str = JSON.stringify(itemArray);
			localStorage.setItem("practice7", str);
		}

		this.getItems = function(){
			var str = localStorage.getItem("practice7", str);
			itemArray = JSON.parse(str) || itemArray;
			return itemArray;
		}

		this.deleteItemAt = function(pIdx){
			itemArray.splice(pIdx,1);
			var str = JSON.stringify(itemArray);
			localStorage.setItem("practice7", str);
		}

		this.getItemAt = function(pIdx){
			var str = localStorage.getItem("practice7", str);
			itemArray = JSON.parse(str);
			return itemArray[pIdx];
		}

		this.editItemAt = function(pItem,pIdx){
			itemArray.splice(pIdx,1,pItem);
			var str = JSON.stringify(itemArray);
			localStorage.setItem("practice7", str);
		}
	})