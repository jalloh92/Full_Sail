// Classroom notes for October 7, 2014

//-----for each loop-------
/*var numbers = [5, 10, 25];
var total = 0;

numbers.forEach(function(e){ // for each element in the array, do the function
    total += e;
    console.log(e);
});

console.log("total is " + total);

*/



(function(){ //self-executing function start
/*
    //------create a function that will return the number of even numbers in an array-----------------------------------

    //console.log(evenNumbers([2,3,4,5,6,7,8])); // both logging to the console and calling the function evenNumbers

    function evenNumbers(arr){
    // need to loop through the array
    // look at each element and determine if even (divisible by 2)
    // then add to total if even

        var total = 0;

        arr.forEach(function(e){
            if(e%2 == 0){
            total ++;
            }
        });

        return total;

}


    //----------object literal -- data structure that has properties and methods (members)------------------------------
    // relate function to an object is a method
    // for example, the object dog has the properties of name & age and the methods of bark, eat, tricks and taxes
    // for a total of 6 members

    var dog = {name: "Max", age: 8}; // dog with 2 properties, use curly braces
    // for initialization var dog = {name: "", age: 0};
    dog.breed = "German Shepherd"; // adding a new property of breed, using dot syntax, no quotes after the object!!!
    dog["age"] = 9; // using array access notation to change the property of age, need quotes inside the brackets!!!

    var prop = "age";
    dog[prop] = 10; // advantage of using array access:  variables as properties!  (can't do this with dot syntax)

    //----------for-in loop for object access---------------------------------------------------------------------------
    for (var p in dog){ // "I want to loop through all the properties in dog"
        console.log(p + ": " + dog[p]); // can't use dot syntax b/c p (property) is of type string
        // dog.p is the same as dog."name" --> not going to work
    }
*/


    //------------json example---------------------------------------------

    /*console.log(person); // to verify that the data loaded
    console.log(person.first); // to get the first name "John", dot syntax
    console.log(person["first"]); // array access

    console.log(person.interests[0]); // to get the first items of the interests array
    console.log(person.interests.length); // to get the total number of interests

    console.log(person.favorites.food); // to access the object within the object
    console.log(person.favorites["food"]); // accessing with combo of dot syntax & array access

    console.log(person.skills[0].tests[0].score); // skills is an array, tests is an array, elements of tests are objects

    console.log(person.skills[1].category); // get to CouchDB
    */



    for(var i = 0; i < person.skills.length; i++){ // will loop for the number of elements in the array skills
        console.log(person.skills[i].category);
        for(var j = 0; j < person.skills[i].tests.length; j++){
            console.log("   Name: " + person.skills[i].tests[j].name + " *** Score: " + person.skills[i].tests[j].score);
        }
        console.log("------------------------");

        }


















})(); // self-executing function end

