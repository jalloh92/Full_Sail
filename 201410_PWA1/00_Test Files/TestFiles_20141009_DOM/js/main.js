/**
 * Created by kellyrhodes on 10/9/14.
 */

// ------------ Document Object Model (DOM) stuff ---------------------------------------------------------------------

(function(){

/*

    // ------------------Classroom Notes -----------------------------------------------------------------------------

    // changing text inside p-tag
    document.querySelector("#output").innerHTML = "Hello World!"; // the p tag has an id of "output", the document is the html
    // --- need the # for ID name (see above)
    // --- don't need anything for tag name but still put in quotes (see below)
    // --- need a . for class name

    document.querySelector("p").innerHTML = "Another Change";


    // could also use getElementById to do the same thing
    // querySelector is more versatile (can search by id or tag name or css) but getElementById is slightly faster



// Good practice:  Make a variable equal to the button
    var btn = document.querySelector("button");
    console.log(btn);

    // addEventListener is modern way to do this; will work on any DOM, need IE8 or higher for addEventListener to work

    btn.addEventListener("click",onClick); // onClick is the function that will run after the button is clicked
    // don't call the function onClick() because it will run too soon

    function onClick(){
        console.log("Click Me");
    }


    // 99% of time will use click events for buttons (versus mouse down)
    // *******      need to know click, mouse down & mouse up for test!!!!      ***********
*/

    //------------Make a guessing game from 1 to 10---------------------------------------------------------------------



    var guessesLeft = 3; // max number of tries is 3
    var min = 1; // lower bound of the random number
    var max = 10; // upper bound of the random number
    var userInput = 0;

    var numToGuess = ~~(Math.random()*(max - min+1) + min); // creates a random number (integer) between min & max
    console.log("The number to guess is: " + numToGuess); // logging to the console the random number

    var dom = { // grouping all the DOM stuff together
        btn:       document.querySelector("button"),
        output:    document.querySelector("#output"),
        input:     document.querySelector("input")
    };

    dom.btn.addEventListener("click", onGuess); // talking to the webpage and running onGuess when the button is clicked via addEventListener

    function onGuess(){

        userInput = parseInt(dom.input.value); // parseInt -- takes a string and converts it to a number
        // value is the stuff inside the input field (and not the field itself)
        console.log("The user's guess was: " + userInput);

        if (userInput >= 1 && userInput <= 10){ // if the guess was within the max & min...

            guessesLeft --; // take away a guess
            console.log("Guesses left: " + guessesLeft);


            if(guessesLeft > 0) { // as long as there are guesses remaining, run the check

                check(); // code is cleaner this way

            }

        } else {

            dom.output.innerHTML = "Can you read???!!! A number between 1 & 10, please!";

        }


    }


    function check(){

        //dom.output.innerHTML = "Guess my magic number between 1-10";

        if( userInput > numToGuess){

            dom.output.innerHTML = "Too High.  Guesses left: " + guessesLeft;

        } else if (userInput < numToGuess){

            dom.output.innerHTML = "Too Low.  Guesses left: " + guessesLeft;

        } else {

            dom.output.innerHTML = "You got it!!!!";

        }


    }










})();