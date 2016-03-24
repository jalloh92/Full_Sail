// Name = Kelly Rhodes
// Date = September 22, 2014
// Course = Web Programming Fundamentals, on campus, section 00
// Assignment = Functions (Personal, Professional, Wacky)

// ------------------------------------------------------------------------------
// Part III:  Wacky Functions
// PROBLEM DESCRIPTION
// Kitty is now an internet superstar!!!  Let's predict how much money Kitty will make off of her fame in a month and in a year!
// Kitty is still a cat.  I guess Kitty could be a human this time, but then it's not as funny.

// Use a function as part of your code in each sub-project. This function should have at least two parameters and return a value.

// This project contains the following elements (marked with **):
//    ** A ternary
//    -- An else if
//    -- An anonymous function
//    ** A normal "named" function
//    ** An expression with two arithmetic operators
//    ** A function with three parameters
//    ** At least one logical operator

console.log("Part III:  Wacky Functions\nKitty's Making Money!!!!\n"); // printing to console

//---------------FUNCTIONS FOR USER INPUT VALIDATION-----------------------------
// VALIDATING USER INPUT (NUMBER)
// The function validateNumber will prompt the user to answer a question and check to see if the user didn't enter a blank AND entered a number.
// It takes the question as an input.  It will then return the user's response.
function validateNumber(question){

    var num = prompt(question); // setting up a var for the user's answer to the question passed to the function, using prompt to get their response, forcing the result to be of type Number, storing it to local var num
    console.log("The user was asked: " + question); // printing the question asked to the console

    while(isNaN(num) || num === ""){ // if the user enters a blank OR if they don't enter a Number, we enter the while loop
        num = prompt("Please re-enter, ensuring that you entered a number.\n" + question); // if the user enters a number, we can exit the while loop, otherwise the while loop will repeat
    }

    console.log("The user answered:  " + num); // printing to the console
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

    console.log("The user answered:  " + yesOrNo); // printing to the console
    return yesOrNo; // output of the function is yesOrNo (user response to the question asked)
}


//---------------QUESTIONS FOR COLLECTING USER INPUT----------------------------------
// Questions are set up as string variables and will be passed to the validation functions to ensure that the user is
// entering in appropriate responses
var q1 = "Did Kitty make any special appearances this month (YES or NO)?"; // question 1
var q2 = "How many special appearances did Kitty make this month?"; // question 2
var q3 = "How much did Kitty earn on average for a special appearance?  Do not enter any special characters."; // question 3
var q4 = "Did Kitty appear in any commercials this month (YES or NO)?"; // question 4
var q5 = "How many commercials did Kitty appear in this month?"; // question 5
var q6 = "How much did Kitty earn on average for a commercial?  Do not enter any special characters"; // question 6
var q7 = "Did Kitty sell any merchandise this month (YES or NO)?"; // question 7
var q8 = "What was Kitty's gross revenue this month from merchandise?  Do not enter any special characters."; // question 8


//---------------SETTING UP VARIABLES--------------------------------------------
var appearanceMoney = 0; // variable for how much money Kitty makes from appearances in a month
var commercialMoney = 0; // variable for how much money Kitty makes from commercials in a month
var merchandiseMoney = 0; // variable for how much money Kitty makes from merchandise in a month


//---------------FUNCTIONS FOR CALCULATING KITTY'S MONEY-----------------------------

function makingMoney(numTimes, earningPerTime){ // function is used to calculate how much money is made.  Inputs are number of times and amount of money earned per time
    money = (numTimes * earningPerTime).toFixed(2); // money is the number of times multiplied by the amount of earnings per time
    console.log("Money earned is: $" + money + "\n"); // printing output to the console
    return money; // the output of the function is money

}

function addThreeThings(thing1, thing2, thing3){ // this function will add three things together.  Inputs are thing1, thing2 and thing3
    sum = thing1 + thing2 + thing3; // sum is thing1 plus thing2 plus thing3
    return sum; // sum is the output of this function
}

//---------------EXECUTABLE----------------------------------------------------------
if(validateYesOrNO(q1) === "YES"){                  // if the user replied YES to question 1 that Kitty has made special appearances
    var numAppearances = validateNumber(q2);        // then the user will be asked the question about number of appearances.  The number of appearances will be stored in numAppearances.
    var earningPerAppearance = validateNumber(q3);  // The user will then be asked about how much Kitty earns per appearance.  The average earnings per appearance will be stored in earningPerAppearance.
    appearanceMoney = Number(makingMoney(numAppearances, earningPerAppearance));  // then the function makingMoney will run to calculate how much Kitty earned from appearances and store that value in appearanceMoney.
}

if (validateYesOrNO(q4) === "YES"){                 // if the user replied YES to question 4 that Kitty has made commercials
    var numCommercials = validateNumber(q5);        // then the user will be asked the question about number of commercials.  The number of commercials will be stored in numCommercials.
    var earningPerCommercial = validateNumber(q6);  // The user will then be asked about how much Kitty earns per commercial.  The average earnings per commercial will be stored in earningPerCommercial.
    commercialMoney = Number(makingMoney(numCommercials, earningPerCommercial));  // then the function makingMoney will run to calculate how much Kitty earned from commercials

}

if(validateYesOrNO(q7) === "YES"){                  // if the user replied YES to question 7 that Kitty has sold merchandise
    merchandiseMoney = Number(validateNumber(q8));  // then they will be asked the question about how much Kitty earned in merchandise
}

var kittyMoneyMonth = addThreeThings(appearanceMoney, commercialMoney, merchandiseMoney); // variable to store all the money Kitty makes in a month, used the function add three things to add her difference sources of revenue together
var kittyMoneyYear = kittyMoneyMonth * 12; // variable to store all the money Kitty makes in a year

//---------------PRINTING OUTPUTS AS ALERTS & TO CONSOLE-----------------------------
alert("Kitty earned $" + kittyMoneyMonth + " this month"); // alerting user how much Kitty earned this month
console.log("\nKitty earned $" + kittyMoneyMonth + " this month"); // printing to console how much Kitty earned this month
alert("If Kitty earns at this rate for the rest of the year, she will earn approximately $" + kittyMoneyYear + " this year."); // alerting user how much Kitty will earn this year
console.log("If Kitty earns at this rate for the rest of the year, she will earn approximately $" + kittyMoneyYear + " this year."); // printing to the console how much Kitty will earn this year

(kittyMoneyYear < 100) ? alert("Kitty did not make enough money to pay the bills!  She should work harder!") : alert("Kitty's doing awesome!");