console.log("js loaded");

angular.module("myApp",['ngRoute'])
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
			redirectTo: "/list"
		})
	})

	.controller("formController",function($scope, myService){

		$scope.item = {};

		$scope.onSave = function(){
			myService.saveItem($scope.item);
			$scope.item = {};
			document.location.hash = "/list";
		}
	}) // closes formController
	.controller("listController",function($scope, myService){

		$scope.itemArray = myService.getItems();

		$scope.delete = function(idx){
			myService.deleteItemAt(idx);
			document.location.hash = "/list";
		}
		
	})
	.controller("editController",function($scope, myService, $routeParams){

		var theIndex = $routeParams.itemIdx;
		console.log(theIndex);

		$scope.item = myService.getItemAt(theIndex);

		$scope.onSave = function(){
			myService.editItemAt($scope.item, theIndex);
			document.location.hash = "/list";
		}

		
	})
	.service("myService",function(){

		itemArray = [];

		this.saveItem = function(pItem){
			itemArray.push(pItem);
			var str = JSON.stringify(itemArray);
			localStorage.setItem("practice5", str);
		}

		this.getItems = function(){
			var str = localStorage.getItem("practice5", str);
			itemArray = JSON.parse(str) || itemArray;
			return itemArray;
		}

		this.deleteItemAt = function(pIdx){
			itemArray.splice(pIdx,1);
			var str = JSON.stringify(itemArray);
			localStorage.setItem("practice5", str);
		}

		this.getItemAt = function(pIdx){
			var str = localStorage.getItem("practice5", str);
			itemArray = JSON.parse(str) || itemArray;
			return itemArray[pIdx];
		}

		this.editItemAt = function(pItem,pIdx){
			itemArray.splice(pIdx,1,pItem);
			var str = JSON.stringify(itemArray);
			localStorage.setItem("practice5", str);
		}
	})