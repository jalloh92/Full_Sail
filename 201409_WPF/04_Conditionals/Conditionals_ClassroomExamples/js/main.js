// September 12, 2014
// Classroom Examples for Conditionals


/*
// ------------------------------------------
// Basic Conditional

var oldEnough = true; // if the child is old enough, they can ride

if(oldEnough){
    // if oldEnough is true, then you can ride!
    // if oldEnough is false, nothing will happen.
    console.log("You can ride the coaster!");
}


// ------------------------------------------
// Relational Expressions
// if the child is tall enough, then they can ride
// child has to be at least 48 inches tall

var kidHeight = 50; // height of child
var minHeight = 48; // minimum height required to ride

if(kidHeight >= minHeight){
    // if kidHeight is greater than or equal to minHeight, they can ride
    console.log("You can ride the coaster!");
}


// ------------------------------------------
/// Conditional with an expression

var kidHeight = 45; // set height
var minHeight = 48; // minimum height
var sneakerLift = 2; // sneaker lift

// tall enough to ride with or without shoes?
// if the kid is taller than the min height with shoes, they can ride

if(kidHeight + sneakerLift >= minHeight){
    // if the kid is tall enough with shoes on, they can ride!
    console.log("You are tall enough with shoes on!")
}


// ------------------------------------------
// If Else Statement
// Choosing between two blocks of code

var minHeight = 48; // minimum height to be able to ride
var kidHeight = 48; // height of child

if(kidHeight >= minHeight){
    // if the child's height is greater than or equal to the min height, they can ride
    console.log("You can ride!");
} else {
    // if false, they are too short and cannot ride
    console.log("You cannot ride!  You are too short!");
}


// ------------------------------------------
// Else If

var kidHeight = 40; // height of child
var minHeight = 48; // minimum height required to ride
var wParentHeight = 45; // minimum height required to ride if accompanied by parent

// if taller than the min height, you can ride
// if shorter than the min height but with parent, you can ride
// if false, they are too short and cannot ride

if(kidHeight >= minHeight){
    console.log("You can ride the coaster!");
} else if(kidHeight >= wParentHeight){
    console.log("You can ride but with a parent.");
} else{
    console.log("You are too short to ride.");
}


// ------------------------------------------
// Logical Operators
// based on budget can you buy an iPad?
var budget = 300;
var iPadPrice = 499.99;
var paycheck = 500;
var wonLottery = true;

// if the price of the iPad is less than our budget
// AND if our paycheck is over 600
if((iPadPrice < budget && paycheck > 600) || wonLottery){
    console.log("You can buy the iPad.");
} else {
    console.log("You cannot buy the iPad.");
}

// && = AND operator; all conditions must be true to be true
// || = OR operator; at least one condition must be true to be true

*/
// ------------------------------------------
// Ternary Conditionals
// if the gpa is over the min score, you can graduate

var gpa = 4.0;
var gpaMin = 2.0;

if (gpa > gpaMin){
    console.log("You can graduate!");
} else {
    console.log("You cannot graduate.");
}


(gpa > gpaMin) ? console.log ("You can graduate!") : console.log("You cannot graduate.");


