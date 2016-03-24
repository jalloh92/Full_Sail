// Name = Kelly Rhodes
// Date = September 22, 2014
// Course = Web Programming Fundamentals, on campus, section 00
// Assignment = Functions (Personal, Professional, Wacky)

// ------------------------------------------------------------------------------
// Part II:  Industry Functions
// PROBLEM DESCRIPTION

// More real estate examples!  Let's calculate what the user's monthly payment for their new home assuming a 30 yr mortgage

//This project contains the following elements (marked with **):
//    -- A ternary
//    -- An else if
//    -- An anonymous function
//    ** A normal "named" function
//    ** An expression with two arithmetic operators
//    ** A function with three parameters
//    -- At least one logical operator


console.log("Part II:  Industry Functions\nMonthly Mortgage Payment\n"); // printing to console


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

//---------------QUESTIONS FOR COLLECTING USER INPUT----------------------------------
// Questions are set up as string variables and will be passed to the validation functions to ensure that the user is
// entering in appropriate responses
var q1 = "What is the loan value for your new mortgage?  Do not enter special characters."; // question 1
var q2 = "What is the interest rate (%) for your new mortgage?  Do not enter special characters."; // question 2
var q3 = "What is your monthly home owners insurance payment?"; // question 3
var q4 = "What is your monthly city and county tax payments?"; // question 4

//---------------SETTING UP VARIABLES--------------------------------------------------
var mortgage = Number(validateNumber(q1)); // loan value for mortgage.  given by user response to question 1.
var interest = Number(validateNumber(q2)) / 100; // interest rate for mortgage.  given by user response to question 2.  Divided by 100 to change into a percent.
var insurance = Number(validateNumber(q3)); // monthly homeowner's insurance amount.  given by user response to question 3.
var taxes = Number(validateNumber(q4)); // monthly tax amount.  given by user response to question 4.
var numYears = 30; // number of years payments will be made.  Typical mortgages are 30 years long.
var numTimesInterest = 12; // number of times a year interest is compounded.  Annually = 12.

//---------------FUNCTIONS FOR PERFORMING CALCULATIONS---------------------------------

function calcLoanPayment(p, r, t, n){ // calculates loan payments given principal, interest rate, number of years, and number of times a year interest is compounded
    var payment = p * (r/n) * Math.pow(1 + r/n, t*n) / (Math.pow(1 + r/n, t*n) - 1); // equation for monthly payment on a mortgage
    return payment; // output for function is payment
}

function add3Things(thing1, thing2, thing3){ // function to add 3 things together.  thing1, thing2 and thing3 are inputs.
    sum = thing1 + thing2 + thing3; // sum is thing1 plus thing2 plus thing3
    return sum; // sum is the output of the function
}

//---------------EXECUTABLE--------------------------------------------------------------
loanPayment = calcLoanPayment(mortgage, interest, numYears, numTimesInterest); // calculating the loan payment given the user inputs
console.log("The monthly loan payment (principal & interest) is :  $" + loanPayment.toFixed(2)); // printing to the console the loan payment
alert("The monthly loan payment (principal & interest) is :  $" + loanPayment.toFixed(2)); // alerting the user the loan payment

totalPayment = add3Things(loanPayment, taxes, insurance); // total monthly payment is the loan payment plus taxes plus insurance
console.log("The total payment (PITI) is:  $" + totalPayment.toFixed(2)); // printing to the console total monthly expenses
alert("The total payment (PITI) is:  $" + totalPayment.toFixed(2)); // alerting the user total monthly expenses
