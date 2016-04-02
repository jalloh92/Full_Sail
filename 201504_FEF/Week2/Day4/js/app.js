angular.module("myApp",['ngRoute']) // ---- add 'ngRoute' to module as a dependency

    // ----- NEW DAY 4:  Routes (need an additional script tag in html)

    .config(function($routeProvider){
        $routeProvider
            // .when sets up the different routes
            // .when takes two arguments (the route that goes in the url & a configuration object)
            .when("/list",{
                templateUrl: "listView.html",
                controller:  "ListController"
            })

            .when("/new",{
                templateUrl: "formView.html",
                controller:  "FormController"
            })
            .otherwise({
                redirectTo:"/new"
            })

    })

    .controller("ListController", function($scope, bite){
    // copy & paste from the previous controller, split into two
    // the ListController needs to get and remove the items
        $scope.itemArray = bite.getDog();

        $scope.removeDog = function(idx){
            bite.removeDog(idx);
        }

    })

    .controller("FormController", function($scope, bite){
        // the FormController needs to instansiate the empty object and save new objects
        $scope.pippyDog = {}    
    
        $scope.saveDog = function(){

            bite.addDog($scope.pippyDog);
            $scope.pippyDog = {};

            // --- ADDED to function!!
            // after a dog is saved, goes to the list page, only changing the #
            document.location.hash = "/list";
        }
        
    })



    // ---------------------------------------------------

.service("bite", function(){
    var itemArray = [];
    
    this.getDog = function(){
        var str = localStorage.getItem("kennel");
        itemArray = JSON.parse(str)|| itemArray;
        return itemArray;
    }
    
    this.addDog = function(dog){
        // NEW for Day 4 to update for latest data
        this.getDog();

        itemArray.push(dog);
        var str = JSON.stringify(itemArray);
        localStorage.setItem("kennel",str);
    }
    
     this.removeDog = function(idx){
        itemArray.splice(idx,1);
         
        var str = JSON.stringify(itemArray);
        localStorage.setItem("kennel",str);
    }

});