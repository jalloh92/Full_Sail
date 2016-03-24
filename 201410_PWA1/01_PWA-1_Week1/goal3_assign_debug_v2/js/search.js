// Name:  Kelly Rhodes
// Date:  October 1, 2014
// Course:  Programming for Web Applications I, on-campus, section 00
// Assignment:  Debug

// Note:  What I've corrected is marked in comments with my initials (KAR)



// Create privatized scope using a self-executing function
(function(){

    //------------------------------------------------------------------------------------------------------------------
	//----------------------VARIABLE INITIALIZATION (DO NOT FIX ANY OF THE BELOW VAR's)---------------------------------
    //------------------------------------------------------------------------------------------------------------------

	var resultsDIV = document.getElementById("results"),
		searchInput = document.forms[0].search,
		currentSearch = ''
	;


    //------------------------------------------------------------------------------------------------------------------
	//------------------------FUNCTION DECLARATION----------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------

    //-------FUNCTION validqte:  VALIDATES SEARCH QUERY-----------------------------------------------------------------
    // Function validqte takes query (string) as an input, checks for whitespace at start & end and min # of char's
    // Function search is run after the sting has been validated
	var validqte = function(query){ // KAR -- deleted extra '='
		
		// Trim whitespace from start and end of search query
		while(query.charAt(0) === " "){ // trims whitespace from start of search query, method .charAt(n) returns char at n position; KAR -- fixed from assignment (=) to logical (===)
			query = query.substring(1, query.length);
		};
		while(query.charAt(query.length-1) === "") { // trims whitespace at end of search query
            query = query.substring(0, query.length - 1);
        } // KAR -- deleted extra ; and added }

		
		// Check search length, must have 3 characters
		if(query.length < 3){
			alert("Your search query is too small, try again."); // KAR -- closed quotes
			
			// (DO NOT FIX THE LINE DIRECTLY BELOW)
			searchInput.focus();
			return;
		};
		
		search(query); // KAR -- invoking the function search if string meets req's, passing the parameter of query
	};


	//--------------------FUNCTION search:  FINDS SEARCH MATCHES--------------------------------------------------------
	// Function search has argument of query (string)
    // If there are no matches, function noMatch will run; else, if there are matches, function showMatches will run
	var search = function(query) { // KAR -- added '{'
		
		// split the user's search query string into an array
		var queryArray = query.split(" "); // KAR -- change from join method to split method
		// (The join() method joins the elements of an array into a string, and returns the string.)
		
		// array to store matched results from database.js
		var results = [];


		// loop through each index of db array --> db is an array defined in database.js
		for(var i=0, j=db.length; i<j; i++) {

            // each db[i] is a single video item, each title ends with a pipe "|"
            // save a lowercase variable of the video title
            var dbTitleEnd = db[i].indexOf('|');
            var dbitem = db[i].toLowerCase().substring(0, dbTitleEnd); // KAR -- fixed camelCase on toLowerCase

            // loop through the user's search query words
            // save a lowercase variable of the search keyword
            for (var ii = 0, jj = queryArray.length; ii < jj; ii++) {
                var qitem = queryArray[ii].toLowerCase(); // KAR -- fixed camelCase on toLowerCase

                // is the keyword anywhere in the video title?
                // If a match is found, push full db[i] into results array
                var compare = dbitem.indexOf(qitem);
                if (compare !== -1) {
                    results.push(db[i]);
                };

            }; // KAR -- added '}'
        }; // KAR -- added '}'
		
		results.sort(); // sort method will alphabetize the elements of results
        console.log("results = " + results); // KAR:  added print out of results to console
		
		// Check that matches were found, and run output functions
		if(results.length === 0){ // if the array results is of length 0 (no elements), there are no matches; KAR corrected to logical comparison (===)
			noMatch(); // invoking function noMatch, no arguments needed
            console.log("running noMatch");
		}else{ // if the array results has a length other than 0, there are matches (results)
			showMatches(results); // invoking function showMatches, passing the array results to the function
            console.log("running showMatches");
		};
	};


	//----------FUNCTION noMatch:  Put "No Results" message into page (DO NOT FIX THE HTML VAR NOR THE innerHTML)-------
    // Function noMatch will run if there were no matches found; it takes no arguments; it's invoked inside of function search
	var noMatch = function(){
		console.log("No results found.");

        var html = ''+
			'<p>No Results found.</p>'+
			'<p style="font-size:10px;">Try searching for "JavaScript".  Just an idea.</p>'
		;
		resultsDIV.innerHTML = html;
	};


	//-------------FUNCTION showMatches:  Put matches into page as paragraphs with anchors------------------------------
    // Function showMatches will run if results were found; it's invoked inside of function search, takes array results as a parameter
	var showMatches = function(results){
		
		// THE NEXT 4 LINES ARE CORRECT.
		var html = '<p>Results</p>', 
			title, 
			url
		;
		
		// loop through all the results search() function
		for(var i=0, j=results.length; i<j; i++){
		
			// title of video ends with pipe
			// pull the title's string using index numbers
			titleEnd = results[i].indexOf('|'); // indexOf returns the position of the occurrence of '|' in the string
			title = results[i].substring(0, titleEnd); // KAR -- corrected capital 'S' in subString
			
			// pull the video url after the title (after the pipe)
			url = results[i].substring(results[i].indexOf('|')+1, results[i].length);
			
			// make the video link - THE NEXT LINE IS CORRECT.
			html += '<p><a href=' + url + '>' + title + '</a></p>';
		};
		resultsDIV.innerHTML = html; //THIS LINE IS CORRECT.
	};

    //------------------------------------------------------------------------------------------------------------------
    //------------------------EXECUTABLE--------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------

	// ------------The onsubmit event will be reviewed in upcoming Course Material.-------------------------------------
	// THE LINE DIRECTLY BELOW IS CORRECT
	document.forms[0].onsubmit = function() { // anonymous function
        var query = searchInput.value; // query (string) is result of user input
        console.log(query);
        validqte(query); // invoking the function validqte & passing query (string)

        // return false is needed for most events - this will be reviewed in upcoming course material
        // THE LINE DIRECTLY BELOW IS CORRECT
        return false;
    }; // KAR -- added '}'
    //------------------------------------------------------------------------------------------------------------------

})(); // end of self-executing function