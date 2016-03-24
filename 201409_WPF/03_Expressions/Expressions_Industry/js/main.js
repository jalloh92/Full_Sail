// Name = Kelly Rhodes
// Date = September 10, 2014
// Course = Web Programming Fundamentals, on campus, section 00
// Assignment = Expressions (Personal, Professional, Wacky)

// -----------------------------------------
// Part II:  Industry Expressions
// I'm doing real estate to help pay for school (and I love referrals!)
// Let's do some code to figure out average price per square foot given 3 comparable homes
// and then given $ / sq ft, calculate what the list price of a home should be

//--------SETTING UP VARIABLES----------------------
var compSqFt = [1300, 1400, 1500]; // setting up array for comparable homes 1, 2 & 3 square footage
var compSellPrice = [170000, 200000, 190000]; // setting up array for comparable homes 1, 2 & 3 sales price
var pricePerSqFt = []; // setting up an array to calculate the price per square foot for homes 1, 2 & 3
var yourHomeSqFt; // setting up var for your home's square footage
var sumPricePerSqFt = 0; // setting up a var to aid in calculating avg price / sq ft

//--------GETTING INPUTS FROM USER-------------------
//asking for comp 1 info
compSqFt[0] = Number(prompt("How many square feet is comparable home #1?")); //getting sq ft for comp 1 and storing into the 0 element
compSellPrice[0] = Number(prompt("How much did the comp #1 sell for?\nDo not include the '$' sign or a comma.")); // getting sales price for comp 1 and storing into 0 element

//asking for comp 2 info
compSqFt[1] = Number(prompt("How many square feet is comparable home #2?")); //getting sq ft for comp 2 and storing into the 1 element
compSellPrice[1] = Number(prompt("How much did the comp #1 sell for?\nDo not include the '$' sign or a comma.")); // getting sales price for comp 2 and storing into 1 element

//asking for comp 3 info
compSqFt[2] = Number(prompt("How many square feet is comparable home #3?")); //getting sq ft for comp 3 and storing into the 2 element
compSellPrice[2] = Number(prompt("How much did the comp #1 sell for?\nDo not include the '$' sign or a comma.")); // getting sales price for comp 3 and storing into 2 element

yourHomeSqFt = Number(prompt("How many square feet is your home?")); // getting user's home square footage

//--------PERFORMING THE CALCS-------------------
// using a for loop to calculate price per square foot for each home (sales price / square footage)
// printing to the console as a check
for (var i = 0; i < compSqFt.length && i < compSellPrice.length; i++){
    pricePerSqFt[i] = compSellPrice[i] / compSqFt [i];
    //console.log(pricePerSqFt[i]);
}

// using a for loop to help with getting the average price per square foot
// the for loop is adding up the individual price per square foot and storing it into sumPricePerSqFt
for (var j = 0; j < pricePerSqFt.length; j++){
    sumPricePerSqFt += pricePerSqFt[j];
}

var avgPricePerSqFt = sumPricePerSqFt / pricePerSqFt.length; // calculating average price per square foot
var yourHomeValue = yourHomeSqFt * avgPricePerSqFt; // multiplying your home sq ft by the average price / sq ft to get expected value

//console.log("avgPricePerSqFt = " + avgPricePerSqFt);
//console.log("yourHomeValue = " + yourHomeValue);

var prettyPriceFormat = "$" + (yourHomeValue / 1000).toFixed(0) + ",000"; // Rounding to the nearest $1K and printing with $ and ,
//console.log(prettyPriceFormat);

//--------PRINTING TO THE CONSOLE-------------------
console.log("Based on the comparable homes in your neighborhood, the average price per square foot is $" + avgPricePerSqFt.toFixed(2)); // printing result of avg price per sq ft to console
console.log("If you were to sell your home at this average price per square foot, you would sell your home for approximately " + prettyPriceFormat); // printing expected sales price to console
alert("Based on the comparable homes in your neighborhood, the average price per square foot is $" + avgPricePerSqFt.toFixed(2)); // alerting user of avg price per sq ft
alert("If you were to sell your home at this average price per square foot, you would sell your home for approximately " + prettyPriceFormat); // alerting user of expected sales price

