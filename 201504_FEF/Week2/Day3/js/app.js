// Defines Angluar Module with no Dependencies
angular.module("MyApp",[]) /* arguments are name of app and array of dependencies */

	// Defines the controller named "ControllyThing"
	// Requires $scope adn myService to be injected by Angular
	.controller("ControllyThing", function($scope, MyService){ /* controller to hold all of the code, 
		need to include scope since it's the only way to communicate with DOM, MUST BE $scope */
		/*$scope.test = "Hi There";*/

		// Makes stored items availabe to the View / HTML
		$scope.dataArray = MyService.getItems();
		
		// Empty placeholder object that will be filled upon save; Holds new items to be added to the Array
		$scope.person = {};

		// $scope.nameInput = ''; b/c we switched over to using the object "person" don't need to deal with individual items

		// Called by form submission
		// Sends $scope.item to the service, and then clears it for a new entry
		$scope.onSave = function(){
			// Invokes the "addItem" function in our service
			MyService.addItem($scope.person);
			// Resets the item to be empty again.
			$scope.person = '';

			console.log($scope.dataArray);
		}

		// Called by clicking the "delete" button
		// Requires item index, passes this directly to the service
		$scope.removeItemAt = function(idx){
			// Calls removeItemAt within the service
			MyService.removeItemAt(idx);
		}


	})
	// Defines our service
	.service("MyService",function(){ /* takes the role of the model, chaining off, container to hold data, encapsulation, outside of controller, cannot pass it the scope */
		// local copy of the data, starts as empty.  Acts as the master copy
		// Not directly accessbile outside the service
		var itemArray = []; /* not attached to 'this', not externally accesible, use the functions to communicate*/

		// functions added to "this" in a service are externally available.
		// returns a reference to the "Master copy" of the array
		this.getItems = function(){ /* function to return item, 'this' scopes to items */
			
			// ------- NEW! -----------------
			// Read item called ourFirstLS from local storage
			// Catch the string that is returned
			var str = localStorage.getItem("ourFirstLS");
			// Turn JSON string into objects
			itemArray = JSON.parse(str) || itemArray; // "or" operator; evals first item, if false (null), evals second item


			return itemArray;
		}

		// Pushes pItem into the master array.
		// All other copies of the itemArray update thanks to binding
		this.addItem = function(pItem){
			itemArray.push(pItem);

			// ------- NEW! -----------------
			// Turning itemArray into string to store into local storage
			var str = JSON.stringify(itemArray);
			// Save the string to local storage with the name ourFirstLS
			localStorage.setItem("ourFirstLS",str); 

		}

		// Splices out the item at the given index
		this.removeItemAt = function(pIndex){
			itemArray.splice(pIndex,1);

			// ------- NEW! -----------------
			// Turning itemArray into string to store into local storage
			var str = JSON.stringify(itemArray);
			// Save the string to local storage with the name ourFirstLS
			localStorage.setItem("ourFirstLS",str); 

		}

	})	 