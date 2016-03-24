/**
 * Created by kellyrhodes on 9/6/14.
 */

// name = Kelly Rhodes
// date = September 8, 2014
// course = Web Programming Fundamentals, on-campus, section 00
// assignment = Expressions



// ------------------------------------
// problem #1 = Slice of Pie, Part I
// calculate number of slices per person, okay if decimal slices is returned

// setting up initial variables
var numPizza = 20;
var numPartyPeople = 100;
var slicesPerPizza = 8;

// performing calcs to get slices per person
var totalSlices = numPizza * slicesPerPizza;
var slicesPerPerson = totalSlices / numPartyPeople;

// printing output
console.log("Each person ate " + slicesPerPerson + " slices of pizza at the party.");



// ------------------------------------
// problem #2 = Slice of Pie, Part II
// people now only eat whole slices of pizza, Sparky the dog gets remaining slices
// use previous variables

// performing calcs to get leftover slices for Sparky
var sparkyGets = totalSlices % numPartyPeople;

// printing output
console.log("Sparky got " + sparkyGets + " slices of pizza.");



// ------------------------------------
// problem #3 = Average Shopping Bill
// calculate total and average grocery bill given amounts for 5 weeks

// setting up initial variables, using an array
var groceries = [100, 50, 75, 25, 89];

// performing cals to get total and average
var totalGroceries = (groceries[0] + groceries[1] + groceries[2] + groceries[3] + groceries[4]).toFixed(2);
var averageGroceries = (totalGroceries / groceries.length).toFixed(2);

// printing output
console.log("You have spent a total of $" + totalGroceries + " on groceries over 5 weeks.  That is an average of $" + averageGroceries + " per week.");


// ------------------------------------
// problem #4 = Discounts
// calculate discounted price for an item with and without sales tax

// setting up initial variables
var originalPrice = 99.99;
var discountPercentage = 20;
var descriptionOfItem = "thing";
var salesTaxPercentage = 7;

// performing calcs to get discounted price without and with sales tax
var discountAmount = originalPrice * (discountPercentage / 100);
var discountPriceNoTax = originalPrice - discountAmount;
var taxAmount = discountPriceNoTax * (salesTaxPercentage / 100);
var discountPriceWithTax = discountPriceNoTax + taxAmount;

// printing output
console.log("Your " + descriptionOfItem + " was originally $" + originalPrice.toFixed(2) + ", but after a " + discountPercentage + "% discount, it is now $" + discountPriceNoTax.toFixed(2) + " without tax, and $" + discountPriceWithTax.toFixed(2) + " with tax.");




