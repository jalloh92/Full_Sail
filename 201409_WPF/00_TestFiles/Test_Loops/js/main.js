// September 17, 2014
// in class loop examples

/*  Validation example
var min = prompt("Please enter a minimum number")

// while loop runs as long as condition is true
while(isNaN(min) || min === ""){
    min = prompt("Please enter a number and do not leave blank.");
}


// ---------------basic while loop---------------------
console.log("-----------While Loop Example----------");
// the while loop loops through a block of code as long as a specified condition is true

// initializing counter variable
var counter = 0;

// starting the while loop with condition
// while condition is true loop will run
// when condition is false, loop will stop
while(counter < 5){

    console.log("counter number is " + counter);
    counter ++; // counts until condition is false

}

// --------------do while loops----------------------
console.log("------Do While Loop Example--------");
// the do/while loop is a variant fo the while loop.
// this loop will execute the code block once, before checking if
// the condition is true, then it will repeat the loop as long as
// the condition is true

var i = 0; // set a variable to hold our value

do{
    console.log("The number is " + i);
    i ++;
} while (i < 5);


// ------------for loop-------------------------
console.log("-----For loop example-----------");
// for (initialization, condition, increment of change)
// we use i frequently because it stands for iteration

for(var i = 0; i < 10; i ++){
    console.log(i);
}

*/

//----------for loop with break-------------------
console.log("----------for loop with break example----------");

for (var j = 0; j < 5; j ++){

    if(j === 2){
        break; // stops the loop from cycling
    }

    console.log(j);

}

//----------for with an array-----------------
console.log("-----------for loop with array-----------");


var names = ["Scooby", "Shaggy", "Velma", "Fred", "Daphne"];

for(i=0; i < names.length; i++){
    console.log(names[i] + " solved the case!");

}


//-----------looping with an array
console.log("-----------for loop with array-----------");

var bowlOfFruit = ["apple", "orange", "apple", "kiwi"];
var totalApples = 0;

for(var i = 0; i < bowlOfFruit.length; i ++){
    if (bowlOfFruit[i] === "apple"){
        totalApples ++;
        console.log("You found the apple!");
    }
}

console.log("There are " + totalApples + " apples in the fruit bowl.");


