// Classroom notes Oct 2, 2014


//-----------------------------------------------------------------------------
// Random number 1 - 6
// Math.random:  0 <= n < 1 (1 is not included!)
// Math.floor(Math.random * possibilities of numbers + offset)
// ~~ (2 ~'s) is equivalent to Math.floor, is faster as well
// ~ calculates the binary inverse & drops the decimal, second ~ reverts to original number as an integer
// for some reason the two ~~ don't work with negative numbers

/*
min = 1;
max = 6;
var dice = Math.floor(Math.random()*(max - min + 1) + min);

console.log(dice);

function rnd(min, max){ // function to generate a random number between min & max
    if(min > max){ // conditional in case user swapped max & min
        var temp = max; // temp holding variable to hold the max value
        max = min; // max will be converted to min
        min = temp; // min will get temp (original max)
    }

    var ranNum = Math.floor(Math.random()* (max - min + 1) + min); // random number generator
    console.log(ranNum); // logging to console
    return ranNum; // returning random number
}

for(var i= 1; i<100; i++) { // for loop to test code
    rnd(1, 5); // calling the random number function
}


//-------------------------------------------------------------------------
// Switch statements

var grade = 90;
if (grade > 89){
    console.log("You got an A!");
} else if (grade > 79){
    console.log("You got a B!");
} else if (grade > 69){
    console.log("You got a C!");
} else {
    console.log("You failed!");
}

var dice = 4;

switch (dice) {
    case 1:
        console.log("you rolled a one");
        break;
    case 2:
        console.log("you rolled a two");
        break;
    default:
        // blah blah blah
}

*/

var grade = "3";

switch (grade){
    case "A":
        console.log("You got an A");
        break;
    case "B":
        console.log("You got a B");
        break;
    case "C":
        console.log("You got a C");
        break;
    default:
        console.log("You suck");

}

//---------------------------------------------------------
// By default, all variables are global & global variables suck
// Therefore, need to be put all stuff into functions (make it local)


// Self executing functions format (anonymous b/c you're only going to use one time & you don't intend to use it again):
//
(function(){
//    // code to be executed --> put *everything* in here!
 }) ();   // --> close up function and then invoke it