// Name = Kelly Rhodes
// Date = September 10, 2014
// Course = Web Programming Fundamentals, on campus, section 00
// Assignment = Expressions (Personal, Professional, Wacky)

// -----------------------------------------
// Part I:  Personal Expressions
// Collect from user miles run and time spent running for Monday - Friday
// Calculate total miles and average pace

//--------SETTING UP VARIABLES----------------------
var miles = [5, 4, 3, 5, 4]; // creating an array for miles.  Each day's miles (M - F) will be stored in a different element
var runTimes = [41, 36, 27, 42, 34]; // creating an array for time spend running.  Each day's minutes (M - F) will be stored in a different element
var totalMiles = 0; // declaring var for total number of miles
var totalMins = 0; // declaring var for total number of mins
var remainingSecs = 0;

//--------GETTING INPUTS FROM USER-------------------
// asking user for Monday's info and storing it
miles[0] = Number(prompt("How many miles did you run on Monday?")); // getting Monday's miles and storing into 0 element
runTimes[0] = Number(prompt("That's awesome!\nHow many minutes did it take?")); // getting Monday's mins and storing into 0 element

// asking user for Tuesday's info and storing it
miles[1] = Number(prompt("How many miles did you run on Tuesday?")); // getting Tuesday's miles and storing into 1 element
runTimes[1] = Number(prompt("Good job!\nHow many minutes did it take?")); // getting Tuesday's mins and storing into 1 element

// asking user for Wednesday's info and storing it
miles[2] = Number(prompt("How many miles did you run on Wednesday?")); // getting Wednesday's miles and storing into 2 element
runTimes[2] = Number(prompt("Way to go!\nHow many minutes did it take?")); // getting Wednesday's mins and storing into 2 element

// asking user for Thursday's info and storing it
miles[3] = Number(prompt("How many miles did you run on Thursday?")); // getting Thursday's miles and storing into 3 element
runTimes[3] = Number(prompt("You're adding up those miles!\nHow many minutes did it take?")); // getting Thursday's mins and storing into 3 element

// asking user for Friday's info and storing it
miles[4] = Number(prompt("How many miles did you run on Friday?")); // getting Friday's miles and storing into 4 element
runTimes[4] = Number(prompt("How many minutes did it take?\nYou did so well, take the weekend off!")); // getting Friday's mins and storing into 4 element

//--------PERFORMING THE CALCS-------------------
// calculating total miles for the week.  I couldn't help but to use a for loop for this!  The result is that each element of the array is added to TotalMiles.
for(var i = 0; i < miles.length; i++){
    totalMiles += miles[i];
};
// calculating total minutes run for the week.  Once again using a for loop.  The result is that each element of the array is added to TotalMins.
for(var j = 0; j < runTimes.length; j++){
    totalMins += runTimes[j];
};

// console.log("totalMiles = " + totalMiles);
// console.log("totalMins = " + totalMins);

var avgPaceMins = Number((totalMins / totalMiles - 0.5).toFixed(0)); // taking the total number of minutes run for the week and dividing by the total number of miles.
// Subtracting 0.5 off of it will correct rounding errors
// Using .toFixed(0) and Number will force it to be a whole number
// console.log("avgPaceMins = " + avgPaceMins);
// console.log("typeof avgPaceMins =" + typeof avgPaceMins);

remainingSecs = 60*(totalMins - avgPaceMins * totalMiles); // finding the seconds not accounted for yet
// avgPaceMins * totalMiles would get close; need to subtract from totalMins and multiply the result by 60 to get secs

var avgPaceSecs = (remainingSecs / totalMiles).toFixed(0); // remaining secs are divided by the total number of miles to get the seconds portion of the average pace.

var avgPace = avgPaceMins + ":" + avgPaceSecs; // creating a string variable that is the average pace in minutes and seconds

//--------PRINTING TO THE CONSOLE-------------------
console.log("You did great this week!\nYou ran a total of " + totalMiles + " miles at an average pace of " + avgPace + " minutes per mile."); // printing output to the console
alert("You did great this week!\nYou ran a total of " + totalMiles + " miles at an average pace of " + avgPace + " minutes per mile."); // giving user an alert with results
