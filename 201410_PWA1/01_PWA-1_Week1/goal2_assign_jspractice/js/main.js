// Name:  Kelly Rhodes
// Date:  October 8, 2014
// Course:  Programming for Web Applications I, On-Campus, Section 00
// Assignment:  JS Practice

// --------------ASSIGNMENT DESCRIPTION---------------------------------------------------------------------------------

// 1. Create a function named 'avgNumbers'
//    - accept 1 parameter into the function that will be an array of unlimited numbers
//    - find the average of all the numbers
//    - return the average from the function
//    - console.log the answer outside of the function
//
// 2. Create a function named 'fullName'
//    - accept 2 parameters into the function that are strings (firstname and lastname)
//    - return the name after it has been concatenated
//    - console.log the answer outside of the function
//
// 3. Create a function named 'wordCount'
//    - accept 1 parameter into the function that is a long string of text words
//    - create a function that counts all the words and return the answer
//    - console.log the answer outside of the function
//
// 4. Create a function named 'charCount'
//    - accept 1 parameter into the function that is a long string of text
//    - return length of the array of string characters
//    - console.log the answer outside of the function
//
// 5. Create a function named 'vowelsInWord'
//    - accept 1 parameter into the function that is a a one word string
//    - return the number of vowels in the word
//    - console.log the answer outside of the function
//
// 6. Create a function named 'findNum'
//    - accepts 2 parameters into the function - 1. array of numbers, 2. boolean
//    - if the second parameter being passed is "false" or null then
//    - create an array with all of the odd numbers from the array
//    - else
//    - create an array with all of the even numbers from the array
//    - return the array
//    - console.log the answer outside of the function

//----------------------------------------------------------------------------------------------------------------------
(function(){ // beginning of self-executing function

    // -----------------PART 1:  FUNCTION avgNumbers -------------------------------------------------------------------
    // Create a function that will take the average of an array of numbers
    var myArray = [1, 2, 3, 4, 5, 6, 7, 65];
    var myAvg = 0;

    function avgNumbers(arr){
       var sum = 0;
       var avg = 0;

       for (var i = 0; i < arr.length; i++){
            sum += arr[i];
       }

       avg = sum / arr.length;
       return avg;
    }

    myAvg = avgNumbers(myArray);
    console.log("1. The average is: " + myAvg);


    // -----------------PART 2:  FUNCTION fullName ---------------------------------------------------------------------
    // Create a function that will concatenate two strings (firstName + lastName = fullName
    var fName = "Kelly";
    var lName = "Rhodes";
    var myName;

    function fullName(firstName, lastName){
        var totalName = firstName.concat(" ", lastName);
        return totalName;
    }

    myName = fullName(fName, lName);
    console.log("2. The full name is: " + myName);


    // -----------------PART 31:  FUNCTION wordCount -------------------------------------------------------------------
    // Create a function to count all the words in a long string of words (assuming no special characters to separate words, only single spaces)
    var longString = "Mary had a little lamb whose fleece was white as snow.";
    var wCount = 0;

    function wordCount(str){
        var words = []; // create an array to hold the words that are found

        words = str.split(" "); // the split method will split the string into an array of words

        var numWords = words.length; // the length of the words array will be the number of words in the string
        return numWords;
    }

    wCount = wordCount(longString);
    console.log("3. The word count for the long string is: " + wCount);


    // -----------------PART 4:  FUNCTION charCount --------------------------------------------------------------------
    // Create a function that will return the number of characters in a string
    var anotherLongString = "abcdefghijklmnopqrstuvwxyz"; // one-word string
    var numChars = 0;

    function charCount(str){
        var chars = str.length;

        return chars;
    }

    numChars = charCount(anotherLongString);
    console.log("4. The number of characters in the long string is: " + numChars);


    // -----------------PART 5:  FUNCTION vowelsInWord -----------------------------------------------------------------
    // Create a function to count the number of vowels in a long string word
    // let's use anotherLongString in this example
    var numVowels = 0;

    function vowelsInWord(str){
        str = str.toLocaleLowerCase(); // including the toLowerCase method to ensure only lower case letters are sent to the function
        var count = 0; // count will be used for number of vowels
        var arrayOfLetters = str.split("");

        for (var i = 0; i < arrayOfLetters.length; i++){
            switch(arrayOfLetters[i]){
                case "a":
                    count ++;
                    break;
                case "e":
                    count ++;
                    break;
                case "i":
                    count ++;
                    break;
                case "o":
                    count ++;
                    break;
                case "u":
                    count ++;
                    break;

            }
        }


        return count;
    }

    numVowels = vowelsInWord(anotherLongString);
    console.log("5. The number of vowels in the long string is: " + numVowels);


    // -----------------PART 6:  FUNCTION findNum ----------------------------------------------------------------------
    // Create a function that will count the number of even or odd numbers in an array, depending on the boolean passed
    // let's use myArray from above in this example

    var evensOrOdds = [];
    var odds = false;
    var evens = true;

    function findNum(arr, bool){
        var newArray = [];

        for(var i = 0; i < arr.length; i++){ // looping through the array

            if (bool == false){ // if false, create array of odds
                if(arr[i]%2 != 0){ // if the ith element of the array IS NOT divisible by 2, it is odd
                    newArray.push(arr[i]); // the ith element will then be added to the new array
                }

            } else { // if true, create array of evens
                if(arr[i]%2 == 0){ // if the ith element of the array IS divisible by 2, it is even
                    newArray.push(arr[i]); // the ith element of the array will be added to the new array
                }

            }

        }

        return newArray;
    }

    evensOrOdds = findNum(myArray, evens);
    console.log("6. The new array is: " + evensOrOdds);


})(); // end of self-executing function
