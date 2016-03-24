// Name = Kelly Rhodes
// Date = September 22, 2014
// Course = Web Programming Fundamentals, on campus, section 00
// Assignment = Functions (Personal, Professional, Wacky)

// ------------------------------------------------------------------------------
// Part I:  Personal Functions
// There's a concert in TN that I want to go to next month.  Based on cost alone (and not time
// involved) should I drive or fly?

// Use a function as part of your code in each sub-project. This function should have at least two parameters and return a value.

//This project contains the following elements (marked with **):
//    -- A ternary
//    ** An else if
//    ** An anonymous function
//    ** A normal "named" function
//    ** An expression with two arithmetic operators
//    ** A function with three parameters
//    ** At least one logical operator

console.log("Part I:  Personal Functions\nDrive or Fly??\n"); // printing to console


//---------------FUNCTIONS FOR USER INPUT VALIDATION-----------------------------
// VALIDATING USER INPUT (NUMBER)
// The function validateNumber will prompt the user to answer a question and check to see if the user didn't enter a blank AND entered a number.
// It takes the question as an input.  It will then return the user's response.

function validateNumber(question){

    var num = prompt(question); // setting up a var for the user's answer to the question passed to the function, using prompt to get their response, forcing the result to be of type Number, storing it to local var num
    console.log("The user was asked: " + question); // printing the question asked to the console

    while(isNaN(num) || num === ""){ // if the user enters a blank OR if they don't enter a Number, we enter the while loop
        num = prompt("Please re-enter, ensuring that you entered a number.\n" + question); // if the user enters a string, we can exit the while loop, otherwise the while loop will repeat
    }

    console.log("The user answered: " + num); // printing user's response to the console
    return num; // output of the function is num (user response to the question asked)
}

// VALIDATING USER INPUT (YES or NO)
// The function validateYesOrNo will prompt the user to answer a question and check to see if the user entered YES or NO.
// It takes the question as an input.  It will then return the user's response.

function validateYesOrNO(question){

    yesOrNo = prompt(question).toUpperCase(); // setting up a var for the user's answer to the question entered into the function, using prompt to get their response, storing response into local var text
    console.log("The user was asked: " + question); // printing the question asked to the console

    while (yesOrNo != "YES" && yesOrNo != "NO"){ // if the user does not enter YES or NO, we enter the while loop
        yesOrNo = prompt("Please re-enter, ensuring that you entered a YES or NO.\n" + question).toUpperCase(); // if the user enters a YES or NO, we can exit the while loop, otherwise the while loop will repeat
    }

    console.log("The user answered:  " + yesOrNo); // printing user's response to the console
    return yesOrNo; // output of the function is yesOrNo (user response to the question asked)
}

// VALIDATING USER INPUT (1, 2, or 3)
// The function validate validate123 will prompt the user to answer a question and check to see if the user entered 1, 2 or 3.
// It takes the question as the input.  It will then return the user's response.


function validate123(question){
    num123 = Number(prompt(question)); // setting up a var for the user's answer to the question entered into the function, using prompt to get their response, storing response in local var num123
    console.log("The user was asked: " + question);  // pring the question asked to the console

    while(num123 != 1 && num123 != 2 && num123 != 3){ // if the user does not enter a 1, 2 or 3, we enter the while loop
        num123 = Number(prompt("Please re-enter, ensuring that you entered a 1, 2 or 3.\n" + question)); // if the user enters a 1, 2 or 3, we can exit the while loop, otherwise the while loop will repeat
    }

    console.log("The user answered:  " + num123); // printing user's response to the console
    return num123; // output of the function is num123 (user response to the question asked)

}


//---------------QUESTIONS FOR COLLECTING USER INPUT----------------------------------
// Questions are set up as string variables and will be passed to the validation functions to ensure that the user is
// entering in appropriate responses
var q1 = "What is your budget for this trip?\nDo not enter any special characters."; // question 1
var q2 = "How much does a plane ticket cost?\nDo not enter any special characters."; // question 2
var q3 = "How many miles away is it?\nDo not enter any special characters."; // question 3
var q4 = "Which do you drive?  Please enter a number.\n(1) Electric Car\n(2) Sedan\n(3) SUV"; // question 4
var q5 = "If you drive, will you need to spend the night?\nPlease enter YES or NO."; // question 5
var q6 = "How much is the hotel room you will get while on the road?\nDo not enter any special characters"; // question 6

//---------------SETTING UP VARIABLES--------------------------------------------------
var budget = Number(validateNumber(q1)); // variable for the budget for the trip.  It is the response to question 1.
var costToFly = Number(validateNumber(q2));  // variable for cost to fly.  It is the response to question 2.
var milesToDrive = Number(validateNumber(q3)); // variable for the number of miles to drive.  It is the response to question 3.
var carType = Number(validate123(q4)); // variable for type of car the user will drive.  It is the response to question 4.  1 = electric car, 2 = sedan and 3 = SUV.
var getHotel = validateYesOrNO(q5); // variable for whether or not user plans to stay in a hotel if they drive.  It is the answer to question 5.  It will be either YES or NO.

var electricMPG = 90; // variable for MPG (miles per gallon) for an electric vehicle
var sedanMPG = 40; // variable for MPG for a sedan
var suvMPG = 30; // variable for MPG for a SUV

var gasPrice = 3.50; // variable for the cost of a gallon of gas

//---------------FUNCTIONS FOR PERFORMING CALCULATIONS---------------------------------
var calcCostToDrive = function(miles, mpg, pricePerGallon, hotelCost){
    fuelCost = miles / mpg * pricePerGallon; // the fuel cost is equal to the miles divided by the miles per gallon (to get number of gallons required) times the price per gallon
    totalCost = fuelCost + hotelCost; // the total cost is the fuel cost plus the hotel cost

    console.log("The fuel cost is :  $" + fuelCost.toFixed(2)); // printing to the console the cost of gas needed for the trip
    console.log("The total cost is:  $" + totalCost.toFixed(2)); // printing to the console the entire cost if user was to drive

    return totalCost;
}


//---------------EXECUTABLE-------------------------------------------------------------
if (carType == 1){ // if the user said they had an electric car, the mpg for the trip will be the mpg for the electric car
    var mpgForTrip = electricMPG
} else if (carType == 2){  // if the user said they had an sedan, the mpg for the trip will be the mpg for the sedan
    mpgForTrip = sedanMPG
} else {  // if the user said they had an SUV, the mpg for the trip will be the mpg for the SUV
    mpgForTrip = suvMPG;
}

if(getHotel == "YES"){ // if the user replies that they plan on getting a hotel room
    var costForRoom = Number(validateNumber(q6)); // they will be asked what the cost of the hotel room was and it will be stored in costForRoom
} else {
    costForRoom = 0; // otherwise the costForRoom is 0
}

var costToDrive = Number(calcCostToDrive(milesToDrive, mpgForTrip, gasPrice, costForRoom));  // the cost to drive is the output of the function calcCostToDrive with inputs of milesToDrive, mpgForTrip, gasPrice and costForRoom

var costNotification = "Your budget is $" + budget.toFixed(2) + ".\nThe cost to fly is $" + costToFly.toFixed(2) + ".\nThe cost to drive is $" + costToDrive.toFixed(2) +".\n"; // notification summarizing all costs

if(costToFly < costToDrive && costToFly < budget){ // if the cost to fly is less than the cost to drive and the cost to fly is less than the budget
    console.log(costNotification + "It is more expensive to drive.  The user should fly."); // the user will be encouraged to fly
    alert(costNotification + "It is more expensive to drive.  You should fly."); // the user will be encouraged to fly
} else if(costToDrive < costToFly && costToDrive < budget){ // if the cost to drive is less than the cost to drive and the cost to drive is less than the budget
    console.log(costNotification + "It is more expensive to fly.  The user should drive."); // the user will be encouraged to drive
    alert(costNotification + "It is more expensive to fly.  You should drive."); // the user will be encouraged to drive
} else { // else the user does not have the budget to drive or fly
    console.log(costNotification + "The user does not have enough in their budget to fly or drive."); // the user will be alerted that they do not have enough budget to drive or fly
    alert(costNotification + "You do not have enough in your budget to fly or drive."); // the user will be alerted that they do not have enough budget to drive or fly
}



