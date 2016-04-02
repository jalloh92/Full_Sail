// Key:
// fa23f83b515ec49c27e156fbaca5e5a3

// Secret:
// 7c4193d32a61632c






angular.module("flickerApp",['ngRoute'])
	.config(function($routeProvider){
		$routeProvider.when("/",{
			controller: "ASDFController",
			templateUrl: "appPartial.html"
		})
		.otherwise({
			redirectTo: '/'
		})
	})
	.controller("ASDFController",function($scope){
		$scope.test = "Hello There";
	})