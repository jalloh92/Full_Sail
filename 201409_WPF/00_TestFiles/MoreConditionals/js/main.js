/**
 * Created by kellyrhodes on 9/15/14.
 */
// test problems for math or for conditionals, Day 6

var min = Number(prompt("Please enter a minimum number"));
//test to see if a number was actually entered
if(isNaN(min) || min === ""){
    console.log("You did not enter a min number!");
    min = (prompt("PLEASE enter a minimum number"));
}
console.log("The minimum number is " + min);


var max = Number(prompt("Please enter a maximum number"));
if (max === "" || isNaN(max)){
    console.log("You did not enter a maximum number")
    max = prompt("Please enter a maximum number, pretty please");
}
console.log("The maximum number is " + max);

//isNaN checks to see if something is a number

// want a random number between max & min, rounding makes it an integer
var randomNumber = Math.round(Math.random()*(max - min) + min);

console.log("Your random number is " + randomNumber);


var num1 = 9.5555;
console.log(num1);
console.log(Math.round(num1));
console.log(Math.ceil(num1));
console.log(Math.floor(num1));

