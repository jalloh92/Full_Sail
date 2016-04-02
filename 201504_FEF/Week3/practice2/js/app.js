angular.module("myApp",["ngRoute"])
	.config(function($routeProvider){
		$routeProvider
		.when('/form', {
			templateUrl: "partials/form.html",
			controller: "formController"
		})

		.when('/list', {
			templateUrl: "partials/list.html",
			controller: "listController"
		})

		.when('/edit/:itemIdx', {
			templateUrl: "partials/form.html",
			controller: "editController"
		})

		.otherwise({
			redirectTo: "/list"
		})

	})
	.controller("formController", function($scope, myService){

		$scope.item = {};

		$scope.onSave = function(){
			myService.save($scope.item);
			$scope.item = {};
			document.location.hash = "/list";
		}

	})


	.controller("listController", function($scope, myService){
		
		$scope.itemArray = myService.getItems();
		

		$scope.delete = function(idx){
			myService.deleteItem(idx);
		}
	})


	.controller("editController", function($scope, myService, $routeParams){
		var theIndex = $routeParams.itemIdx;
		$scope.item = myService.getItemAt(theIndex);

		$scope.onSave = function(){
			myService.editItem($scope.item, theIndex);
			document.location.hash = "/list";
		}
	})


	.service("myService", function(){
		var itemArray = [];

		this.save = function(pItem){
			itemArray.push(pItem);
			var str = JSON.stringify(itemArray);
			localStorage.setItem("practice2",str);
		}

		this.getItems = function(){
			var str = localStorage.getItem("practice2", str);
			itemArray = JSON.parse(str) || itemArray;
			return itemArray;
		}

		this.deleteItem = function(pIdx){
			itemArray.splice(pIdx,1);
			var str = JSON.stringify(itemArray);
			localStorage.setItem("practice2",str);
		}

		this.getItemAt = function(pIdx){
			var str = localStorage.getItem("practice2", str);
			itemArray = JSON.parse(str) || itemArray;
			return itemArray[pIdx];
		}

		this.editItem = function(pItem, pIdx){
			itemArray.splice(pIdx,1,pItem);
			var str = JSON.stringify(itemArray);
			localStorage.setItem("practice2",str);
		}
	})