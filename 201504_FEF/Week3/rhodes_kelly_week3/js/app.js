// console.log("js loaded");

angular.module("myApp",["ngRoute"])
	.config(function($routeProvider){
		$routeProvider.when("/form", {
			templateUrl: "partials/form.html",
			controller: "formController"
		})
		.when("/list", {
			templateUrl: "partials/list.html",
			controller: "listController"
		})
		.when("/edit/:itemIdx", {
			templateUrl: "partials/form.html",
			controller: "editController"
		})
		.otherwise({
			redirectTo: "/list"
		})
	}) // closes config

	.controller("formController",function($scope, myService){

		$scope.item = {};

		$scope.onSave = function(){
			myService.addItem($scope.item);
			$scope.item={};
			document.location.hash="/list";
		}

	})	// closes formController

	.controller("listController", function($scope, myService){
		$scope.itemArray = myService.getItems();

		$scope.removeItemAt = function(idx){
			myService.removeItemAt(idx);
		}

	}) // closes listController

	.controller("editController", function($scope, myService, $routeParams){
		document.getElementById("form_title").innerHTML = "Edit a song";

		var editIdx = $routeParams.itemIdx;

		$scope.item = myService.getItemAt(editIdx);

		$scope.onSave = function(){
			myService.editItem($scope.item, editIdx);
			document.location.hash="/list";
		}

	}) // closes editController

	.service("myService", function(){

		var itemArray = [];

		this.addItem = function(pItem){
			itemArray.push(pItem);
			var str = JSON.stringify(itemArray);
			localStorage.setItem("Week3_LS", str);
		}

		this.getItems = function(){
			var str = localStorage.getItem("Week3_LS",str);
			itemArray = JSON.parse(str) || itemArray;
			return itemArray;
		}

		this.removeItemAt = function(pIdx){
			itemArray.splice(pIdx,1);
			var str = JSON.stringify(itemArray);
			localStorage.setItem("Week3_LS", str);
		}

		this.getItemAt = function(pIdx){
			this.getItems();
			return itemArray[pIdx];
		}

		this.editItem = function(pItem, pIdx){
			itemArray.splice(pIdx,1,pItem);
			var str = JSON.stringify(itemArray);
			localStorage.setItem("Week3_LS", str);
		}

	}) // closes myService

