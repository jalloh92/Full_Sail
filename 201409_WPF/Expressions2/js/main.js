// Name = Kelly Rhodes
// Date = September 10, 2014
// Course = Web Programming Fundamentals, on campus, section 00
// Assignment = Expressions (Personal, Professional, Wacky)

// -----------------------------------------
// Part I:  Personal Expressions
// Collect from user miles run and time spent running for Monday - Friday
// Calculate total miles and average pace

//--------SETTING UP VARIABLES----------------------
var miles = []; // creating an array for miles.  Each day's miles (M - F) will be stored in a different element
var runTimes = []; // creating an array for time spend running.  Each day's minutes (M - F) will be stored in a different element

//--------GETTING INPUTS FROM USER-------------------
// asking user for Monday's info and storing it
miles[0] = prompt("How many miles did you run on Monday?"); // getting Monday's miles and storing into 0 element
runTimes[0] = prompt("That's awesome!\nHow many minutes did it take?"); // getting Monday's mins and storing into 0 element

// asking user for Tuesday's info and storing it
miles[1] = prompt("How many miles did you run on Tuesday?"); // getting Tuesday's miles and storing into 1 element
runTimes[1] = prompt("Good job!\nHow many minutes did it take?"); // getting Tuesday's mins and storing into 1 element

// asking user for Wednesday's info and storing it
miles[2] = prompt("How many miles did you run on Wednesday?"); // getting Wednesday's miles and storing into 2 element
runTimes[2] = prompt("Way to go!\nHow many minutes did it take?"); // getting Wednesday's mins and storing into 2 element

// asking user for Thursday's info and storing it
miles[3] = prompt("How many miles did you run on Thursday?"); // getting Thursday's miles and storing into 3 element
runTimes[3] = prompt("You're adding up those miles!\nHow many minutes did it take?"); // getting Thursday's mins and storing into 3 element

// asking user for Friday's info and storing it
miles[4] = prompt("How many miles did you run on Friday?"); // getting Friday's miles and storing into 4 element
runTimes[4] = prompt("How many minutes did it take?\nYou did so well, take the weekend off!"); // getting Friday's mins and storing into 4 element

//--------PERFORMING THE CALCS-------------------
// calculating total miles for the week.  I couldn't help but to use a for loop for this!  The result is that each element of the array is added to TotalMiles.
for(var i = 0; i < miles.length; i++){
    var totalMiles += miles[i];
};
// calculating total minutes run for the week.  Once again using a for loop.  The result is that each element of the array is added to TotalMins.
for(var j = 0; j < miles.length; j++){
    var totalMins += miles[j];
};
var avgPaceMins = (totalMins / totalMiles).toFixed(0); // taking the total number of minutes run for the week and dividing by the total number of miles.  Using .toFixed(0) will force it to be a whole number and return a string.
var avgPaceSecs = ((totalMins % totalMiles)*60 / totalMiles).toFixed(0); // finding the remaining minutes that are not accounted for in avgPaceMins.  These minutes need to be converted to seconds (multiply by 60) and divided by the total number of miles to get the seconds portion of the average pace.
var avgPace = avgPaceMins + ":" + avgPaceSecs; // creating a string variable that is the average pace in minutes and seconds

//--------PRINTING TO THE CONSOLE-------------------
console.log("You did great this week!\nYou ran a total of " + totalMiles + " miles at an average pace of " + avgPace + "."); // printing output to the console



//-----------------------------------------------
//Part II:  Industry Expressions
// Initial comments

//--------SETTING UP VARIABLES----------------------
var compSqFt = [];
var compSellPrice = [];
var pricePerSqFt = [];

//--------GETTING INPUTS FROM USER-------------------
//asking for comp 1 info
compSqFt[0] = prompt("How many square feet is comparable home #1?"); //getting sq ft for comp 1 and storing into the 0 element
compSellPrice[0] = prompt("How much did the comp #1 sell for?\nDo not include the '$' sign or a comma."); // getting sales price for comp 1 and storing into 0 element

//asking for comp 2 info
compSqFt[1] = prompt("How many square feet is comparable home #2?"); //getting sq ft for comp 2 and storing into the 1 element
compSellPrice[1] = prompt("How much did the comp #1 sell for?\nDo not include the '$' sign or a comma."); // getting sales price for comp 2 and storing into 1 element

//asking for comp 3 info
compSqFt[2] = prompt("How many square feet is comparable home #3?"); //getting sq ft for comp 3 and storing into the 2 element
compSellPrice[2] = prompt("How much did the comp #1 sell for?\nDo not include the '$' sign or a comma."); // getting sales price for comp 3 and storing into 2 element

var yourHomeSqFt = prompt("How many square feet is your home?");

//--------PERFORMING THE CALCS-------------------
for (var i = 0; i < compSqFt.length && i < compSellPrice.length; i++){
    pricePerSqFt[i] = compSellPrice[i] / compSqFt [i];
}
for (var j = 0; j < pricePerSqFt.length; j++){
    var sumPricePerSqFt += pricePerSqFt[j];
}
var avgPricePerSqFt = sumPricePerSqFt / pricePerSqFt.length;
var yourHomeValue = yourHomeSqFt * avgPricePerSqFt;


//--------PRINTING TO THE CONSOLE-------------------
console.log("Based on the comparable homes in your neighborhood, the average price per square foot is $" + avgPricePerSqFt.toFixed(2));
console.log("If you were to sell your home at this average price per square foot, you would sell your home for $" + yourHomeValue.toFixed(2));


//----------------------------------------------------------------------------------
//Part III:  Wacky Expressions
// Let's calculate Kitty's weight over the course of a day!
// Note:  Kitty is a cat and not a person; otherwise this example would be gross!

//-----------------SETTING UP VAR'S & INITIALIZING VIA USER PROMPTS-----------------
var kittyWeight = prompt("How much did Kitty weigh (in pounds) at the start of the day?"); // asking user for Kitty's initial weight
var cansOfFood = prompt("How many cans of Fancy Feast did she eat today?"); // asking user for number of cans of food
var numHairballs = prompt("How many hairballs did Kitty cough up today?"); // asking user for number of hairballs


//----------------PERFORMING CALCS----------------------------------------------------
var foodWeight = cansOfFood * 3 * 0.0625; //convert cans of food into weight in pounds.  Each can is 3 oz.  An oz is 0.0625 lbs.
var hairballWeight = numHairballs * 0.0625; //convert number of hairballs into weight in pounds.  Each hairball is 1 oz.
kittyWeight = kittyWeight + foodWeight - hairballWeight; // calculating Kitty's new weight after eating food and expelling hairballs.

//----------------PRINTING TO THE CONSOLE---------------------------------------------
var kittyResult = "Kitty's weight in lbs is now: "; // string var for printing results
console.log(kittyResult + kittyWeight); // printing to the console
