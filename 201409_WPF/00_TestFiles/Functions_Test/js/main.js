/**
 * Created by kellyrhodes on 9/19/14.
 */

// Function call or invoked
// Must be called or it will not run

function printHello(){
    console.log("Hello World!");
}

function printMore() {
    console.log("Prints out more text!");

}

printHello();
printMore();


//--------------------------

var width = 15;
var height = 20;
calcArea(width, height);

function calcArea(w,h){

    var area = w * h;

    console.log(area);
}

//-------------------------

function calcDogYears(age){
    var ageFactor = 7;
    var dogYears = age * ageFactor;
    console.log(dogYears);
    return dogYears;
}

var snoopyAge = 5;

calcDogYears(snoopyAge);


//----------------------------

function calcPerimeter(length, width){
    var perimeter = 2 * length + 2 * width;
    return perimeter;
}

var myLength = 10;
var myWidth = 20;
var myPerimeter = calcPerimeter(myLength, myWidth);

console.log(myPerimeter);

