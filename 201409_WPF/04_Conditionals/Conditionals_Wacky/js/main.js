// Name = Kelly Rhodes
// Date = September 15, 2014
// Course = Web Programming Fundamentals, on campus, section 00
// Assignment = Conditionals (Personal, Professional, Wacky)

// ------------------------------------------------------------------------------
// Part III:  Wacky Conditionals
// We've seen the meteoric rise of fame of kitties such as Grumpy
// Cat, Hipster Cat and Colonel Meow...but just how did they get
// there?  This program will ask the user questions about their cat
// to see if they have internet kitty fame potential!
// Note:  Once again, Kitty is a cat and not a human.
console.log("Part III:  Wacky Conditionals\nKitty Internet Fame Predictor\n"); // printing to console

//---------------SETTING UP VARIABLES--------------------------------------------
var kittyFameScore = 0; // we will use this to keep track of how
// famous Kitty could be!  Every positive response will get 10 points;
// Kitties scoring at least 70 have a chance at internet fame!

// we'll ask the user a series of questions; they are set up below
// as strings (q1 = question 1, q2 = question 2...) and then put
// into an array called kittyFameQuestions

var q1 = "Does Kitty ham it up for the camera?"; // question 1
var q2 = "Does Kitty have distinctive markings?  Ugly counts!"; // question 2
var q3 = "Does Kitty have a special talent, such as juggling or cooking a 5 course meal?"; // question 3
var q4 = "Does Kitty respond intelligently (meow, cry, sing) when you talk to Kitty?"; // question 4
var q5 = "Does Kitty have more than one social media account with at least 100 followers?"; // question 5
var q6 = "Does Kitty have a memorable name, like Princess Chew Chew Kitten Pants?"; // question 6
var q7 = "Has Kitty ever made a hairball or turd that looked like something else, preferably a religious icon?"; // question 7
var q8 = "Is Kitty good at parties without drinking too much?"; // question 8
var q9 = "Does Kitty like to hide adorably in small containers?"; // question 9
var q10 = "Does Kitty want internet fame, like really, really want it?"; // question 10

var kittyFameQuestions = [q1, q2, q3, q4, q5, q6, q7, q8, q9, q10]; // array for kittyFameQuestions

var userResponse; // variable for user response

//---------------USING A FOR LOOP-------------------------------------------------
// We can use a for  and a do-while loop to cycle through the questions and increment
// kittyFameScore based on the response

for(var i = 0; i < kittyFameQuestions.length; i++){ // loop continues for the length of kittyFameQuestions
    do{
        userResponse = prompt("Please enter YES or NO \n" + kittyFameQuestions[i]).toUpperCase(); //asking the user a
        // Kitty Fame Question & storing into userResponse.  Also forcing it to be upper case to be able to verify the sting.
    } while (userResponse != "YES" && userResponse != "NO"); // if user enters anything other than "YES" or "NO" they
    // will be asked the question again.  A do-while loop ensures that they are asked each question at least once.

    if (userResponse === "YES"){ // if the user enters "YES", kittyFameScore is increased by 10
        kittyFameScore += 10;
    } // if the user enters "NO", kittyFameScore is not increased
    console.log("For question " + (i+1) + ": The current kittyFameScore is " + kittyFameScore); // printing to console to verify code
}

//--------------ASSIGNING FAME POTENTIAL BASED ON FAME SCORE--------------------------
if(kittyFameScore >= 70){ // if kittyFameScore is greater than or equal to 70, user will be alerted to her awesomeness
    alert("Kitty's fame score was " + kittyFameScore + " out of 100.  Kitty has super fame potential!  You should quit your day job to be her social media coordinator!");
    console.log("Kitty's fame score was " + kittyFameScore + " out of 100.  Kitty has super fame potential!  You should quit your day job to be her social media coordinator!");
} else if (kittyFameScore >= 50){ // if kittyFameScore is between 50 and 70, user will be alerted that there's hope
    alert("Kitty's fame score was " + kittyFameScore + " out of 100.  Kitty could be famous one day, but still needs more grooming.  Be like the paparazzi in hopes of catching something cute!");
    console.log("Kitty's fame score was " + kittyFameScore + " out of 100.  Kitty could be famous one day, but still needs more grooming.  Be like the paparazzi in hopes of catching something cute!");
} else { // if kittyFameScore is less than 50, user will be alerted that there's no chance for Kitty
    alert("Kitty's fame score was " + kittyFameScore + " out of 100.  Sadly, Kitty does not have what it takes to make it in this competitive kitty world.");
    console.log("Kitty's fame score was " + kittyFameScore + " out of 100.  Sadly, Kitty does not have what it takes to make it in this competitive kitty world.");
}