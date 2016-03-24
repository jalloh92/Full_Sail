// test files for september 30, 2014
// figure out lowest number in array and return it

var myArray = [4, 3, 10, 27]; // test array for function

function detLowest(n){ // function declaration that will take array n
    var lowest = n[0]; // variable lowest is initially set to the first element of the array, will be used to track the lowest number
    for(var i = 1; i < n.length ; i++){ // cycling through each element of the array
        if (n[i] < lowest){ // if the ith element is less than the lowest value
            lowest = n[i]; // then lowest will be changed to the value of the ith element
        } // closing if statement
    } // closing for loop
    return lowest; // function returns lowest number
} // closing function

console.log("The lowest value in the array is: " + detLowest(myArray)); // printing to the console








