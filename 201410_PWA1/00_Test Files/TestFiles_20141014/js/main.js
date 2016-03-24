/**
 * Created by kellyrhodes on 10/14/14.
 */



(function(){

    // -------- Date Object ----------------
    // to create a date object, you need to create a new instance of it (instantiation)

    var d = new Date();
    console.log(d);
    // format is "Tue Oct 14 2014 10:43:45 GMT-0400 (EDT)", returns an object

    var month = d.getMonth(); // method that gives you the month (number)...but it's from an array starting at zero!!!
    var date = d.getDate(); // method that gives you the day of the month (number)
    var year = d.getFullYear(); // method that gives you the year (number)

    console.log(date);
    console.log(month); // don't forget to add 1 if printing out the number!!
    console.log(year);

    console.log((month + 1) + "/" + date + "/" + year); // formatted at MM/DD/YY

    var day = d.getDay();
    console.log(d.getDay()); // returns a number to represent the day of the week
    // 0 = Sunday
    // 1 = Monday
    // 2 = Tuesday
    // 3 = Wednesday   --->  using an array would be great here!!!
    // 4 = Thursday
    // 5 = Friday
    // 6 = Saturday


    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];


    console.log(days[day] + ", " + months[month] + " " + date + " " + year);




    // ----------Regular Expressions (or RegEx) -----------------
    // is what you type match the pattern defined by the regular expression
    // http://regexlib.com (library of regular expressions)
    // http://www.w3schools.com/jsref/jsref_obj_regexp.asp (good explanation)

    // make a regEx variable to hold the pattern

    // var a = / /; //creates a new regEx (datatype); paste the pattern in between the two slashes
    // ------>    <---------- don't forget the slashes!


    // Checking for a valid email address:
    var pattern = /^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$/;

    document.querySelector("button").addEventListener("click", onClick);

    function onClick(){
        console.log("I was clicked!");

        var input = document.querySelector("#input").value; // grabbing what was inputted into the field
        console.log(input);

        var pass = pattern.test(input); // boolean; true if the input matches the pattern
        console.log(pass);

    }


    // --------Object Constructor ----------------------





})();




