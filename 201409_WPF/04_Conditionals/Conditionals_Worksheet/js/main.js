// Name = Kelly Rhodes
// Date = September 12, 2014
// Course = Web Programming Fundamentals, on campus, section 00
// Assignment = Conditionals Worksheet

//------------------------------------------------------------
//------------GROUP 1:  LAST CHANCE FOR GAS-------------------
//------------------------------------------------------------
// Determine whether car needs to stop for gas or not
// Givens:  Gas efficiency of car (mpg), gauge reading of gas tank (%), gas tank capacity (gallons)
// Also given miles to next gas station (200 miles)
console.log("This is the output for exercise 1:");

//------------SETTING UP VARS---------------------------------
var milesToStation = 200; // miles to the next gas station
var gasEfficiency = 31; // gas efficiency of car in miles per gallon
var gaugeReading = 10; // gauge reading of tank in %
var tankCapacity = 14; // gas tank capacity of the car in gallons

//------------PERFORMING CALCULATIONS-------------------------
// We need to convert the givens into miles the car can drive until it runs out of fuel
var gallonsInTank = tankCapacity * (gaugeReading / 100); // the remaining gallons of gas in the tank is equal to the tank capacity times the gauge reading
var milesToEmpty =  gallonsInTank* gasEfficiency; // the distance the car can drive before running out of fuel is equal to the remaining gas times the fuel efficiency

//------------RUNNING CONDITIONALS---------------------------
// If the distance the car can drive before running out of gas is greater than the distance to the station, the console
// will print "yay" message.  If not, it will print the "boo" message.
// Ternary Operators:  (Condition to be met) ? True Code : Else Code
var yay = "Yes, you can make it without stopping for gas\nBUT...You only have " + gallonsInTank +  " gallons of gas in your tank.  Better get fuel while you can!" // message if there's enough gas
var boo = "You will run out of gas."; // message if there is not enough gas
(milesToEmpty > milesToStation) ? console.log(yay) : console.log(boo); // if the miles it will take for the car to run out of gas is greater than the miles to the station, the "yay" message will print.  Otherwise, the "boo" message will print.

//------------------------------------------------------------
//------------GROUP 2:  CHECK THE LOGIN-----------------------
//------------------------------------------------------------
// Make sure that a user has the correct username & password
// Print a specific message for each case (correct username & password,
// incorrect username, incorrect password)
console.log("");
console.log("This is the output for exercise 2:");

//------------SETTING UP VARS---------------------------------
var correctUsername = "kellyrhodes"; // correct username
var correctPassword = "password"; // correct password
var enteredUsername = prompt("What is your username?"); // asking user for their username
var enteredPassword = prompt("What is your password?"); // asking user for their password

//------------RUNNING CONDITIONALS---------------------------
// If both the username and password are correct, a welcome greeting will print.
// If an incorrect username is entered, the user will be alerted that the user was not found.
// if an incorrect password is entered, the user will be alerted that the password does not match the records.
if(enteredUsername === correctUsername && enteredPassword == correctPassword){
    console.log("Welcome, " + correctUsername + "!");
    alert("Welcome, " + correctUsername + "!");
} else if(enteredUsername !== correctUsername){
    console.log("User not found.  Try again.");
    alert("User not found.  Try again.");
} else {
    console.log("Password does not match our records");
    alert("Password does not match our records");
}

//------------------------------------------------------------
//------------GROUP 3:  MOVIE TICKET PRICE--------------------
//------------------------------------------------------------
// Determine movie ticket price
// Ticket is normally $12.00 but if your age is greater than 55 or less than 10
// or if it is between 3pm to 5pm (1500 to 1700), the ticket price is $7.00
// Givens:  time of day, age of the customer
console.log("");
console.log("This is the output for exercise 3:");

//------------SETTING UP VARS---------------------------------
var age = 9; // age of movie goer
var time = 1100; // time of day written in whole numbers.
// Note:  we are using military time in order to represent 24 hours.  For example 1600 = 4pm
var normalTicketPrice = "$12.00";
var discountedTicketPrice = "$7.00";

//------------RUNNING CONDITIONALS---------------------------
// If the age is less than or equal to 10 or greater than or equal to 55 --OR --
// if the time is between 1500 and 1700, the ticket price is the discounted price.
// Otherwise, it is the normal price.
if((age <= 10 || age >= 55) || (time >= 1500 && time <= 1700)){
    console.log("The ticket price is " + discountedTicketPrice);
} else{
    console.log("The ticket price is " + normalTicketPrice);
}
