// Name = Kelly Rhodes
// Date = September 17, 2014
// Course = Web Programming Fundamentals, on-campus, section 00
// Assignment = Loops Worksheet

// ------------------------------------------------------------------------------
// Loops Worksheet
// Include Validation:  In each of the sub-projects you must use conditionals to validate the information the user
// enters into the prompts. This means your code should check whether or not the user left a prompt entry empty.

// Create one of each type of loop:
// -- while loop
// -- do-while loop
// -- for loop
// -- validating prompts using while loops, one text & one number

console.log("Loops Worksheet\n"); // printing to console

// ------------------------------------------------------------------------------
// Part I:  Validating prompts using while loops (text)
console.log("------Part I:  Validating prompts using while loops (text)------");

var testQuestion1 = "What is your favorite color?"; // setting up a var for my test Question #1

// The function validateText will prompt the user to answer a question and check to see if the user didn't enter a blank.
// It takes the question as an input.  It will then return the user's response.
// (I set up a function (1) to re-use the code for the other exercises and (2) to get practice at writing & using them!)
function validateText(question){

    var text = prompt(question); // setting up a var for the user's answer to the question entered into the function, using prompt to get their response, storing response into local var text
    console.log("The user was asked: " + question); // printing the question asked to the console

    while(text === ""){ // if the user enters a blank, we enter the while loop
        text = prompt("Please re-enter, ensuring that you entered a string.\n" + question); // if the user enters a string, we can exit the while loop, otherwise the while loop will repeat
    }

    return text; // output of the function is text (users response to the question asked)
}

var testString = validateText(testQuestion1); // using the function validateText to see if testString is a valid response
alert("Your answer was " + testString); // alerting the user what their answer was
console.log("The user's answer was:  " + testString); // printing the user's answer to the console


// ------------------------------------------------------------------------------
// Part II:  Validating prompts using while loops (number)
console.log("\n------Part II:  Validating prompts using while loops (number)------");

var testQuestion2 = "What is your favorite number?"; // setting up a var for my test Question #2

// The function validateNumber will prompt the user to answer a question and check to see if the user didn't enter a blank AND entered a number.
// It takes the question as an input.  It will then return the user's response.
function validateNumber(question){

    var num = prompt(question); // setting up a var for the user's answer to the question passed to the function, using prompt to get their response, forcing the result to be of type Number, storing it to local var num
    console.log("The user was asked: " + question); // printing the question asked to the console

    while(isNaN(num) || num === ""){ // if the user enters a blank OR if they don't enter a Number, we enter the while loop
        num = prompt("Please re-enter, ensuring that you entered a number.\n" + question); // if the user enters a string, we can exit the while loop, otherwise the while loop will repeat
    }

    return num; // output of the function is num (user response to the question asked)
}

var testNumber = validateNumber(testQuestion2); // using the function to see if testNumber is a valid response
alert("Your answer was " + testNumber); // alerting the user what their answer was
console.log("The user's answer was:  " + testNumber); // printing the user's answer to the console


// ------------------------------------------------------------------------------
// Part III:  While Loop
console.log("\n------Part III:  While Loop------");

// The user will try to guess a random number between 1 & 10

var numOfGuesses = 1; // number of guesses it will take the user to guess the number
var min = 1; // lower bound of the random number
var max = 10; // upper bound of the random number
var numToGuess = Math.round(Math.random()*(max - min) + min); // creates a random number (integer) between min & max
console.log("The number to guess is: " + numToGuess); // logging to the console the random number

var userGuess = validateNumber("Pick a number between " + min + " and " + max); // asking the user to pick a number between min & max, validating it & storing into userGuess

while (userGuess != numToGuess){ // loop will continue until user guesses the number correctly
    if (userGuess > numToGuess){ // if the userGuess is greater than the number to guess
        console.log("The user's guess was: " + userGuess); // logging the userGuess to the console
        max = userGuess; // updating the max to be what the user last guessed
        userGuess = validateNumber("You guessed too high.  Pick a number between " + min + " and " + max); // telling the user to try again with updated max

    } else { // if the userGuess was less than the number to guess
        console.log("The user's guess was: " + userGuess); // logging the userGuess to the console
        min = userGuess; // updating the min to be the what the user last guessed
        userGuess = validateNumber("You guessed too low.  Pick a number between " + min + " and " + max); // telling the user to try again with update min

    }
    numOfGuesses ++; // increasing the guess count
}

if(numOfGuesses == 1){ // if user guesses correctly the first time, the user gets a message telling him that & it's printed to the console
    alert("You got it!  The mystery number was " + numToGuess + ".  It took you " + numOfGuesses + " try to get it!");
    console.log("The user guessed the mystery number in " + numOfGuesses + " try.");
} else { // if user takes more than one guess, the user gets a message telling him that & it's printed to the console
    alert("You got it!  The mystery number was " + numToGuess + ".  It took you " + numOfGuesses + " tries to get it!");
    console.log("The user guessed the mystery number in " + numOfGuesses + " tries.");
}




// ------------------------------------------------------------------------------
// Part IV:  Do-While Loop
console.log("\n------Part IV:  Do-While Loop------");

var count = 0; // variable count will be used to track how many times we asked the question

do{
    var areWeThereYet = validateText("Are we there yet?").toUpperCase(); // asking the user if we are there yet.  Forcing answer to upper case, storing response into var areWeThereYet
    count ++; // count is increased by one each time the loop cycles.

} while (areWeThereYet != "YES"); // loop continues until user replies "yes"

if (count == 1){ // if the user responds yes the first time, he will get a message
    alert("Woo-hoo!  I only had to ask you once."); // user is alerted to how many times we asked the question
    console.log("It only took the user " + count + " time to respond yes!");  // logging how many times the question was asked to the console
} else { // if the user took more than one time to say yes, he will get a message
    alert("Finally! I only had to ask you " + count + " times!"); // user is alerted to how many times we asked the question
    console.log("Finally! It took the user " + count + " times to respond yes!");  // logging how many times the question was asked to the console
}

// ------------------------------------------------------------------------------
// Part V:  For Loop
console.log("\n------Part V:  For Loop------");

// This loop will ask the user for the number of cats that they own.  It will then ask for the cats' names and store them
// into an array.  Finally, it will print the cats names.

var catNames = []; // array for storing cat names

var numOfCats = validateNumber("How many cats to you own?"); // asking user for number of cats, validating that they entered a number, storing response into numOfCats

for(var i = 0; i < numOfCats; i++){ // loop will cycle for number of cats the user says they own
    catNames[i] = validateText("What is the name of cat #" + (i+1) + "?"); // asking the user for a cat name, one at a time.  Validating response and storing it into the catNames array.
}

if(numOfCats == 0){ // if the user doesn't have any cats, they will get an alert
    alert("You don't have any cats!  How sad!");
    console.log("The user doesn't have any cats!  How sad!");
} else { // if the user says they have cats, the number of cats will be printed with their kitty names
    alert("You have " + numOfCats + " cats: " + catNames);
    console.log("The user has " + numOfCats + " cats: " + catNames);
}