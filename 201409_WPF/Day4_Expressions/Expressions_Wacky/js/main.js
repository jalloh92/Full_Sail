// Name = Kelly Rhodes
// Date = September 10, 2014
// Course = Web Programming Fundamentals, on campus, section 00
// Assignment = Expressions (Personal, Professional, Wacky)

//----------------------------------------------------------------------------------
//Part III:  Wacky Expressions
// Let's calculate Kitty's weight over the course of a day!
// Note:  Kitty is a cat and not a person; otherwise this example would be gross!

//-----------------SETTING UP VAR'S & INITIALIZING VIA USER PROMPTS-----------------
var kittyWeight = Number(prompt("How much did Kitty weigh (in pounds) at the start of the day?")); // asking user for Kitty's initial weight
var cansOfFood = Number(prompt("How many cans of Fancy Feast did she eat today?")); // asking user for number of cans of food
var numHairballs = Number(prompt("How many hairballs did Kitty cough up today?")); // asking user for number of hairballs

//----------------PERFORMING CALCS----------------------------------------------------
var foodWeight = cansOfFood * 3 * 0.0625; //convert cans of food into weight in pounds.  Each can is 3 oz.  An oz is 0.0625 lbs.
var hairballWeight = numHairballs * 0.0625; //convert number of hairballs into weight in pounds.  Each hairball is 1 oz.
kittyWeight = kittyWeight + foodWeight - hairballWeight; // calculating Kitty's new weight after eating food and expelling hairballs.

//----------------PRINTING TO THE CONSOLE---------------------------------------------
var kittyResult = "Kitty's weight in lbs is now: "; // string var for printing results
console.log(kittyResult + kittyWeight); // printing Kitty's new weight to the console
alert(kittyResult + kittyWeight); // alerting the user to Kitty's new weight