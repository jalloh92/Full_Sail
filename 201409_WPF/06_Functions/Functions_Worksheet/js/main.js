// Name = Kelly Rhodes
// Date = September 19, 2014
// Course = Web Programming Fundamentals, on-campus, section 00
// Assignment = Functions Worksheet

// ------------------------------------------------------------------------------
// Functions Worksheet
// For each solution you will need the following:
//    -- Comment each line of code appropriately. Comment, comment, comment!
//    -- Write the givens as variables, and pass the givens to the function using arguments.
//    -- The calculations should be within the functions and the function should return the result to the result variable.
//    -- Create a variable for your result (don’t forget!)
//    -- Print the result using the result variable and the appropriate message outside the function. (Do not print from the functions you create)
//    -- There should be a minimum of 20 commits to your git repository.
//    -- This should all be done in a single project and single .as file.

console.log("Functions Worksheet\n"); // printing to console

// ------------------------------------------------------------------------------
// --------------------PROBLEM 1:  CIRCUMFERENCE---------------------------------
// ------------------------------------------------------------------------------

console.log("Problem 1:  Circumference"); // printing to console
// Calculate the circumference of a circle.
// Parameter(s) for function:
//    -- Radius of the circle
// Return:
//    -- Circumference of the circle
// Result to print to the console:
//    -- “The circumference of the circle is X”;

var radius = 5; // variable for the radius of the circle
var circumference = calcCircumference(radius); // variable for the circumference of the circle with radius "radius", setting it equal to the output of the function calcCircumference
console.log("The circumference of the circle is " + circumference.toFixed(2)); // printing output to console

function calcCircumference(r){ // creating function calcCircumference with argument "r"
    return 2 * Math.PI * r; // function will return 2 times pi times r (radius), equation for circumference of a circle
}

// ------------------------------------------------------------------------------
// --------------------PROBLEM 2:  STUNG!!!!!!!!---------------------------------
// ------------------------------------------------------------------------------

console.log("\nProblem 2:  Stung!!!!!!!"); // printing to console

// It takes 8.666666667 bee stings per pound to kill an animal. Calculate how many bee stings are needed to kill an animal in a function
// Given:
//    -- Victim’s weight (in pounds)
// Parameter(s) for function:
//    -- Victim’s weight (in pounds)
// Return:
//    -- Number of Bee stings
// Result to print to the console:
//    -- “It takes X bee stings to kill this animal.

var victimWeight = 100; // victim's weight in pounds
var numStings = calcNumStings(victimWeight); // variable for the number of bee stings, setting it equal to the output of the function calcNumStings
console.log("It takes " + numStings.toFixed(2) + " bee stings to kill this animal."); // printing output to console

function calcNumStings(weight){ // creating function calcNumStings with argument "weight"
    return (52 / 6) * weight; // function will return the number of bee stings to kill as a function of weight (Note:  52/6 is equivalent to 8.666667
}
