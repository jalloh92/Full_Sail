console.log("javascript loaded");

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
			redirectTo:"/list"
		})

	})

	.controller("formController", function($scope, myService){

		$scope.item = {};

		$scope.onSave = function(){
			myService.saveItem($scope.item);
			$scope.item = {};
			document.location.hash = "/list";
		}

	})
	.controller("listController", function($scope, myService){

		$scope.itemArray = myService.getItem();

		$scope.deleteItemAt = function(idx){
			myService.deleteItemAt(idx);
		}

	})
	.controller("editController", function($scope, myService, $routeParams){

		var theIndex = $routeParams.itemIdx;

		$scope.item = myService.getItemAt(theIndex);

		$scope.onSave = function(){
			myService.editItemAt(theIndex, $scope.item);
			document.location.hash = "/list";
		}



	})
	.service("myService", function(){

		itemArray = [];

		this.saveItem = function(pItem){
			itemArray.push(pItem);
			var str = JSON.stringify(itemArray);
			localStorage.setItem("practice3", str);
		}

		this.getItem = function(){
			var str = localStorage.getItem("practice3", str);
			itemArray = JSON.parse(str) || itemArray;
			return itemArray;
		}

		this.deleteItemAt = function(pIdx){
			itemArray.splice(pIdx,1);
			var str = JSON.stringify(itemArray);
			localStorage.setItem("practice3", str);
		}

		this.getItemAt = function(pIdx){
			var str = localStorage.getItem("practice3", str);
			itemArray = JSON.parse(str) || itemArray;
			return itemArray[pIdx];
		}

		this.editItemAt = function(pIdx, pItem){
			itemArray.splice(pIdx,1,pItem);
			var str = JSON.stringify(itemArray);
			localStorage.setItem("practice3", str);
		}


	})