console.log("js loaded");

angular.module("myApp",['ngRoute'])
	.config(function($routeProvider){
		$routeProvider.when('/form',{
			templateUrl: "partials/form.html",
			controller: "formController"
		})
		.when('/list',{
			templateUrl: "partials/list.html",
			controller: "listController"
		})
		.when('/edit/:itemIdx',{
			templateUrl: "partials/form.html",
			controller: "editController"
		})
		.otherwise({
			redirectTo: "/list"
		})
	}) // closes config
	.controller("formController", function($scope, myService){
		console.log("formController loaded");

		$scope.item = {};

		$scope.onSave=function(){
			myService.saveItem($scope.item);
			$scope.item = {};
			document.location.hash = "/list";
		}

	}) // closes formController
	.controller("listController", function($scope, myService){
		console.log("listController loaded");

		$scope.itemArray = myService.getItems();

		$scope.delete = function(idx){
			console.log(idx);

			myService.deleteItemAt(idx);
		}

	}) // closes listController
	.controller("editController", function($scope, myService, $routeParams){
		console.log("editController loaded");

		var theIndex = $routeParams.itemIdx;
		console.log(theIndex);

		$scope.item = myService.getItemAt(theIndex);

		$scope.onSave=function(){
			myService.editItemAt($scope.item, theIndex);
			document.location.hash = "/list";
		}

	}) // closes editController
	.service("myService", function(){
		console.log("myService loaded");

		itemArray=[];

		this.saveItem = function(pItem){
			itemArray.push(pItem);
			var str = JSON.stringify(itemArray);
			localStorage.setItem("LS_6", str);
		}

		this.getItems = function(){
			var str = localStorage.getItem("LS_6", str);
			itemArray = JSON.parse(str) || itemArray;
			return itemArray;
		}

		this.deleteItemAt = function(pIdx){
			itemArray.splice(pIdx,1);
			var str = JSON.stringify(itemArray);
			localStorage.setItem("LS_6", str);
		}

		this.getItemAt = function(pIdx){
			var str = localStorage.getItem("LS_6", str);
			itemArray = JSON.parse(str);
			return itemArray[pIdx];
		}

		this.editItemAt = function(pItem, pIdx){
			itemArray.splice(pIdx,1,pItem);
			var str = JSON.stringify(itemArray);
			localStorage.setItem("LS_6", str);
		}

	}) // closes myService