// Misha Devine & Kelly Rhodes

angular.module("myLittlePony",["ngRoute"])
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
	.controller("formController", function($scope, myService){

		$scope.pony = {};

		$scope.onSave = function(){
			myService.addPony($scope.pony);
			$scope.pony = {};
			document.location.hash = "/list";
		}


	})

	.controller("listController", function($scope, myService){

		$scope.ponyCorral = myService.getPonies();

		$scope.removePony = function(idx){
			myService.removePony(idx);
		}

	})

	.controller("editController", function($scope, myService, $routeParams){
		var theIndex = $routeParams.itemIdx;
		console.log(theIndex);

		$scope.pony = myService.getPony(theIndex);

		$scope.onSave = function(){
			myService.editPony(theIndex,$scope.pony);
			document.location.hash = "/list";
		}

	})

	.service("myService", function(){

		ponyCorral = [{
		    "name": "Apple Jack",
		    "image": "http://sbernath.github.io/FWF/static/mlp/ponies/Applejack.png",
		    "color": "#ffc36c",
		    "kind": "earth"
		  },
		  {
		    "name": "Flutter Shy",
		    "image": "http://sbernath.github.io/FWF/static/mlp/ponies/FlutterShy.png",
		    "color": "#f9f4ae",
		    "kind": "pegasus"
		  },
		  {
		    "name": "Derpy Hooves",
		    "image": "http://sbernath.github.io/FWF/static/mlp/ponies/Derpy.png",
		    "color": "#aeb7d0",
		    "kind": "pegasus"
		  },
		  {
		    "name": "Pinkie Pie",
		    "image": "http://sbernath.github.io/FWF/static/mlp/ponies/PinkiePie.png",
		    "color": "#fcc0e2",
		    "kind": "earth"
		  },
		  {
		    "name": "Rainbow Dash",
		    "image": "http://sbernath.github.io/FWF/static/mlp/ponies/RainbowDash.png",
		    "color": "#9fe6ff",
		    "kind": "pegasus"
		  },
		  {
		    "name": "Twilight Sparkle",
		    "image": "http://sbernath.github.io/FWF/static/mlp/ponies/TwilightSparkle.png",
		    "color": "#dcaeed",
		    "kind": "alicorn"
		  },
		  {
		    "name": "Rarity",
		    "image": "http://sbernath.github.io/FWF/static/mlp/ponies/Rarity.png",
		    "color": "#edf2f9",
		    "kind": "unicorn"
		  },
		  {
		    "name": "Sweetie Belle",
		    "image": "http://sbernath.github.io/FWF/static/mlp/ponies/SweetieBelle.png",
		    "color": "#f2f1fd",
		    "kind": "unicorn"
		  },
		  {
		    "name": "Big Macintosh",
		    "image": "http://sbernath.github.io/FWF/static/mlp/ponies/BigMcintosh.png",
		    "color": "#f05869",
		    "kind": "earth"
		  }];

		this.addPony = function(pItem){
			ponyCorral.push(pItem);
			var str = JSON.stringify(ponyCorral);
			localStorage.setItem("ponyCorral2", str);
		}

		this.getPonies = function(){
			var str = localStorage.getItem("ponyCorral2", str);
			ponyCorral = JSON.parse(str) || ponyCorral;
			return ponyCorral;
		}

		this.removePony = function(pIdx){
			ponyCorral.splice(pIdx,1);
			var str = JSON.stringify(ponyCorral);
			localStorage.setItem("ponyCorral2", str);
		}

		this.getPony = function(pIdx){
			var str = localStorage.getItem("ponyCorral2", str);
			ponyCorral = JSON.parse(str);
			return ponyCorral[pIdx];
		}

		this.editPony = function(pIdx, pItem){
			ponyCorral.splice(pIdx,1,pItem);
			var str = JSON.stringify(ponyCorral);
			localStorage.setItem("ponyCorral2", str);
		}

	})
