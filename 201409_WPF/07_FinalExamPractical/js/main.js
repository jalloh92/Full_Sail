// FINAL EXAM PRACTICAL!!!!!!
// Kelly Rhodes
// September 26, 2015
// Web Programming Fundamentals


// --setting up the variable myCost for prompting user to give item cost--
var myCost = Number(prompt("How much does your item cost? Please enter a number and do not enter any special characters.")); // variable myCost will be used to hold the user response to the prompt for a cost; Number() is used for casting user's response as a number.

while(myCost === "" || isNaN(myCost)){ // while loop that will start if myCost is left blank or if myCost is not a number.
    myCost = Number(prompt("How much does your item cost? Please enter a number and do not enter any special characters.")); // prompting the user again to enter a number
}
console.log("The original price is " + myCost + typeof myCost); // printing to the console to help de-bug

// --setting up the variable myDiscount for prompting user to give the amount of discount--
var myDiscount = Number(prompt("What is the % discount?  Please enter a number between 0 & 100."));// variable myDiscount will be used to hold the user response to the prompt for a discount %; Number() is used for casting user's response as a number.

while (myDiscount < 0 || myDiscount > 100) { // while loop that will start if myDiscount is not between 0 & 100.
    myDiscount = Number(prompt("What is the % discount?  Please enter a number between 0 & 100.")); // prompting the user again to enter a number
}
console.log("The discount % is " + myDiscount + typeof myDiscount); // printing to the console to help de-bug

// --function calcDiscount to calculate the new price--
function calcDiscount(cost, discount){ // function is named calcDiscount; parameters are cost & discount
    // this is me being a nerdy rocket scientist.  I completely disagree with the equation given in the practical; it does not calculate "discount price" but does calculate discount amount
    var discountAmt = cost * discount / 100; // discount amount (discountAmt) is the cost times the discount percentage divided by 100
    var newPrice = cost - discountAmt; // the new price (newPrice) is the original cost minus the discountAmt
    return newPrice; // the function will return the new price
}

var myNewPrice = calcDiscount(myCost, myDiscount); // creating the variable myNewPrice to capture the results of calcDiscount when myCost and myDiscount are arguments

// --string to print results to the console--
console.log("Your original price was $" + myCost.toFixed(2) + ".  Your discount percentage was " + myDiscount.toFixed(2) + "%.  Your new price is $" + myNewPrice.toFixed(2) + ".");