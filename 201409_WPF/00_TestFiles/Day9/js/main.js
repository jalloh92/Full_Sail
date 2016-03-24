// Test Files from Day 9 (September 22, 2014)


//-------------------EXAMPLE 1--------------------------
var myMin = 180; // variable for the min number
var myMax = 220; // variable for the max number

var ranNum = randomizer(myMin, myMax); // variable ranNum will hold output of the randomizer function

function randomizer(min, max){ // randomizer function to create a random number taking min & max as inputs
    var randomNumber = Math.round(Math.random()*(max - min) + min); // creates a random number between the main & max
    return randomNumber; // output of the function
}


for(var i = 0; i < 5; i ++){ // for loop; will repeat 5 times
    console.log(randomizer(myMin, myMax)); // printing to the console a random number
}


//-------------------EXAMPLE 2--------------------------
// Normal Function:
// function functionName(parameters){
//
      //    code to execute
      //    return
// }

// Anonymous Function
// var functionName = function(parameters){
//
//    code to execute
//    return
// }

// to call an anonymous function:  functionName(arguments)  --> same as a normal function!

var base = 3;
var height = 4;

/*function triangleArea(b,h){ // normal function
    var area = 0.5 * b * h;
    return area;
}
*/


var triangleArea = function(b,h){ // anonymous function
    var area = 0.5 * base * height;
    return area;
}


console.log(triangleArea(base, height));

//-------------------EXAMPLE 3--------------------------
// using pop & push with an array

var testArray = ["banana", "apple", "peach", "pear"];

console.log(testArray.length);
console.log(testArray);

testArray.push("carrot"); // pushing carrot into the array
console.log(testArray);

testArray.pop();