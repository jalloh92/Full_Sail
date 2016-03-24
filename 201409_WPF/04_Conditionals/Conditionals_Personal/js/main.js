// Name = Kelly Rhodes
// Date = September 15, 2014
// Course = Web Programming Fundamentals, on campus, section 00
// Assignment = Conditionals (Personal, Professional, Wacky)

// -----------------------------------------
// Part I:  Personal Conditionals
// I'm moving into a house.  What will my new monthly expenses be,
// both with and without a roommate?
console.log("Part I:  Personal Conditionals\nMonthly Expenses Calculator\n"); // printing to console

//----------SETTING UP VARIABLES-------------
var userResponse = null; // used to store a Yes or No response from the user
var haveRoommate;// haveRoommate is set to true if the user has a roommate


//---------GETTING USER INPUT-----------------
var rent = Number(prompt("How much do you pay for rent a month (in $)?  Please enter a number only and no special characters.")); //asking the user how much they pay for rent in $, storing it in rent & converting it to a Number
if(isNaN(rent) || rent === ""){ // validating that they did not leave rent blank and that they entered a Number; if not, they are prompted to re-enter rent
    rent = prompt("You forgot to enter a value for rent!  Please enter a number only and no special characters.");
}

var utilities = Number(prompt("How much do you pay a month for utilities (electric, water, sewer and garbage) (in $)?  Please enter a number only and no special characters.")); //asking the user how much they pay for utilities in $, storing it in utilities & converting it to a Number
if(isNaN(utilities) || utilities === ""){ // validating that they did not leave rent blank; if so, they are prompted to re-enter rent
    utilities = prompt("You forgot to enter a value for the utilities!  Please enter a number only and no special characters.");
}

var cable = Number(prompt("How much do you pay a month for cable and internet access (in $)?  Please enter a number only and no special characters.")); //asking the user how much they pay for cable & internet in $, storing it in cable & converting it to a Number
if(isNaN(cable) || cable === ""){ // validating that they did not leave rent blank and they entered a Number; if not, they are prompted to re-enter rent
    cable = prompt("You forgot to enter a value for the cable!  Please enter a number only and no special characters.");
}

// Asking if user has a roommate & storing into userResponse.
do{
    userResponse = prompt("Please enter YES or NO.\nDo you have a roommate?").toUpperCase();
    //Forcing it to be upper case to be able to verify the sting.
} while (userResponse != "YES" && userResponse != "NO"); // if user enters anything other than "YES" or "NO" they
// will be asked the question again.  Since we originally set this to null, the code will execute initially.

userResponse === "YES" ? haveRoommate = true : haveRoommate = false;

//-------------------------------------------------------
if(haveRoommate) { //if the user has a roommate, they will be asked additional questions
    var roommateRent = Number(prompt("How much of the rent will your roommate pay (in $)?  Please enter a number between 0 and " + rent + " and no special characters")); // asking how much of the rent the roommate will pay in $, storing it in roommateRent & converting it to a Number
    if(isNaN(roommateRent) || roommateRent === ""){ //validating that they did not leave roommmateRent blank and they entered a Number; if not, they are prompted to re-enter roommmateRent
        roommateRent = prompt("You forgot to enter a value for the the roommate's portion of rent!  Please enter a number only and no special characters.");
    }

    var roommateBills = Number(prompt("What percentage (%) of the bills (electric, water, sewer, garbage, cable & internet) will the roommate pay?  Please enter a number between 0 and 100 and no special characters")); // asking what % of the bills the roommate will pay, storing it in roommateBills & converting it to a Number
    if(isNaN(roommateBills) || roommateBills === ""){ // validating that they did not leave roommateBills blank and they entered a Number; if not they are prompted to re-enter roommateBills
        roommateBills = prompt("You forgot to enter a value for the the roommate's percentage of the bills!  Please enter a number only and no special characters.");
    }
}

//----------------PERFORMING CALCULATIONS & PRINTING OUTPUT-------------------
var totalMonthlyExpenses = rent + utilities + cable; // total monthly expenses for the house in $; sum of rent, utilities & cable

if(haveRoommate){ // if the user has a roommate, the user's portion of the bills will be calculated
    var userShareOfRent = rent - roommateRent; // the user's portion of rent with a roommate is total rent minus what the roommate is paying
    var roommateShareOfBills = (utilities + cable) * roommateBills / 100; // the roommate's share of bills is the sum of the utilities plus the cable times the percentage of bills they are paying
    var userShareOfBills = utilities + cable - roommateShareOfBills; // the user's portion of the bills is the sum of the utilities plus the cable minus the roommate's share of the bills
    // message that's printed if you have a roommate:
    alert("You have a roommate.  Total monthly expenses for rent and bills were $" + totalMonthlyExpenses + ", but since you have a roommate, you only need to pay $" + userShareOfRent + " for rent and $" + userShareOfBills + " for the bills.");
    console.log("You have a roommate.  Total monthly expenses for rent and bills were $" + totalMonthlyExpenses + ", but since you have a roommate, you only need to pay $" + userShareOfRent + " for rent and $" + userShareOfBills + " for the bills.");
} else { // message that's printed if you don't have a roommate:
    alert("You do not have a roommate.  You will have to pay $" + totalMonthlyExpenses + " a month for rent and bills by yourself.");
    console.log("You do not have a roommate.  You will have to pay $" + totalMonthlyExpenses + " a month for rent and bills by yourself.");
}