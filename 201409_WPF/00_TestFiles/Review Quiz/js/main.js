// Review Quiz, September 24, 2014

var radius = prompt("What is the radius of the circle?"); // prompt the user for a radius of a circle


while(radius === "" || isNaN(radius)){ // validate the prompt is in fact a number and not left blank
    radius = prompt("What is the radius of the circle (ensuring that you entered a number)?");
}


function calcArea(r){ // create a function that will calculate the area of a circle, use radius as parameter
    area = 2 * Math.PI * r;
    return area; // function returns area
}

var circleArea = calcArea(radius); // function call

console.log("The area of the circle with radius " + radius + " is " + circleArea.toFixed(2)); // console.log with area


