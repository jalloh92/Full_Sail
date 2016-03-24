// Name:  Kelly Rhodes
// Date:  October 11, 2014
// Course:  Programming for Web Applications I, on-campus, section 00
// Assignment:  Develop Duel #3


//-----------------------------------------------------
//----------PROGRAM DESCRIPTION -----------------------
//-----------------------------------------------------

// 1. Create three variables (name, health, damage) for each player of the two players.
// 2. Both players start off with 100 hit points (Health)
// 3. Minimum of two functions:
//    a. fight() function - This function contains the code that loops through rounds and reduces the player’s health
//       accordingly.  Use a for loop.  A break command is used to escape out of the loop if the fight is over before
//       the 10 rounds is reached
//    b. winnerCheck() function - This function is invoked after each round and returns a string of either the winner,
//       the loser, a tie (both die) or no winner yet. This function does the conditional logic to determine if there
//       is a winner or not.
// 4. To advance rounds, use the alert() function. The alert box will show the two players' remaining health and the
//    round number.
//    Example (alert button is clicked after each round):
//       Batman: 100 **START** Spiderman 100
//       Batman: 88 **ROUND 1 OVER** Spiderman 92
//       Batman: 79 **ROUND 2 OVER** Spiderman 84
//       Batman: 5 **ROUND 9 OVER** Spiderman 11
//       GAME OVER Batman Wins!!!
// 5. Damage occurs to both players at a random amount between half damage and maximum damage. So, if the player's
//    damage variable is 50 then the amount of damage that can be inflicted will be between 25-50. The random syntax
//    is as follows: Math.floor(Math.random() * (max - min) + min);
// 6. Display the correct winner after the 10th round. If both players happen to die during the same round then display
//    “No Winner Message”.

// UPDATE:  For Duel 2, replace some of the variable declarations with array literals

// UPDATE:  For Duel 3:
//  1.  All uses of alert() must be removed
//  2.  An object with three properties(keys) is created for both fighters. The three properties are:
//          -- name
//          -- damage
//          -- health
//      Example: fighter1 = {name:Spiderman, damage:20, health:100};
//  3.  Both fighter objects should be in an array
//  4.  Modify fight() function
//      Since this assignment is now using objects, the code in the fight() function must be modified from the previous
//      version of the assignment to accommodate for this. NO loop will be needed!-since clicking on the button is what
//      triggers the next round.
//      Replace the alerts with code that access the DOM(HTML) such as getElemetById and/or querySelector
//  5.  Use JavaScript's innerHTML property to change the text in the HTML. The following information will be displayed dynamically in the HTML (view the demonstration again to see how this should look):
//          -- Fighter's name and health at the top
//          -- Current round number above the button
//  6.  Create a click event on the button.  When the button is clicked, the following should commence:
//          -- advance round
//          -- the modified fight() function is called
//  7.  Disable the button when the game is over and make sure the appropriate "game over message" is shown at the top.
//      The message should be one of the following:
//          -- Fighter 1 wins
//          -- Fighter 2 wins
//          -- Both Fighters Die
//          -- Make sure the actual name of the fighter is shown not fighter1 or fighter2. You can always change the message to something else if you want to be more creative.

(function() { // Create privatized scope using a self-executing function

    //-----------------------------------------------------
    //----------INITIALIZING VARIABLES --------------------
    //-----------------------------------------------------

    var fighter1 = { // Player 1 Name, Player 1 Health, Player 1 Damage
        name:  "Garfield",
        health: 100,
        damage: 20
        };

    var fighter2 = { // Player 2 Name, Player 2 Health, Player 2 Damage
        name: "Nermal",
        health: 100,
        damage: 20
    };

    var fighters = [fighter1, fighter2];
    var round = 1; // round number, set to one initially


    var dom = {
        fighter1:       document.querySelector("#kabal"),
        fighter2:       document.querySelector("#kratos"),
        round:          document.querySelector("#round_number"),
        btn:            document.querySelector("#fight_btn")
    };


    //-----------------------------------------------------
    //----------FUNCTION DECLARATIONS----------------------
    //-----------------------------------------------------

    //-----function onClick to run each time the fight button is clicked
    function onClick(){

            fighters[0].health -= inflictDamage(fighters[1].damage); // calculating Player 1's health by subtracting amount of damage done via invoking fight function -- this is the damage done by Player 2 to Player 1
            fighters[1].health -= inflictDamage(fighters[0].damage); // calculating Player 2's health by subtracting amount of damage done via invoking fight function -- this is the damage done by Player 1 to Player 2

            console.log("Round: " + round + ": " + fighters[0].name + ": " + fighters[0].health + " " + fighters[1].name + ": " + fighters[1].health); // printing to console health status

            var result = winnerCheck(); // invoking winnerCheck function; results of winnerCheck det if fighting continues
            console.log(result);
            if (result==="no winner"){ // as long as there is no winner, the fight keeps going

                //alert(fighters[0].name + ": " + fighters[0].health + "  *ROUND " + round + " OVER*  " + fighters[1].name + ": " + fighters[1].health);
                dom.fighter1.innerHTML = fighters[0].name + ": " + fighters[0].health;
                dom.fighter2.innerHTML = fighters[1].name + ": " + fighters[1].health;
                dom.round.innerHTML = "Round " + round;

                round++;

            } else{ // if there is a result other than "no winner", the result will print

                dom.fighter1.innerHTML = result;
                dom.fighter2.innerHTML = "";
                dom.round.innerHTML = "Round " + round +": Game Over";
                dom.btn.removeEventListener("click", onClick);

            };


    };

    //----- function inflictDamage will reduce player's health accordingly
    var inflictDamage = function(damage) { // function will take damage as a parameter...NOTE:  ensure that damage is the damage done by the other player when this is invoked!

        var max = damage; // maximum amount of damage that can be done is set to the damage parameter
        var min = 0.5 * damage; // minimum amount of damage that can be done is set to 1/2 of the damage parameter
        var damageDone = Math.floor(Math.random() * (max - min + 1) + min); // damage done is calculated using max & min & random, stored into local var damageDone

        return damageDone; // damageDone is the output of this function
    };


    //----- function winnerCheck:  invoked after each round of fighting; returns an appropriate string based on results
    var winnerCheck = function () {

        var result = "no winner"; // initializing result to "no winner"; result is a local var

        if (fighters[0].health < 0 && fighters[1].health < 0) { // if both Player 1 and Player 2 go below 0 health, they both die
            result = "You both die";
        }
        else if (fighters[0].health < 0) { // if only Player 1 health goes below 0, Player 2 wins
            result = fighters[1].name + " wins!!!";
        } else if (fighters[1].health < 0) { // if only Player 2 health goes below 0, Player 1 wins
            result = fighters[0].name + " wins!!!";
        } else if (round == 10){
            result = "It's a draw; no more rounds";
        }

        return result; // return the result...note: if no one goes below 0, result stays "no winner"
    };




    //----- function fight:  invokes winnerCheck & inflictDamage within a for loop, will loop 10 times unless one or both players die
    var fight = function () {
        console.log("I started fighting");

        //alert(fighters[0].name+ ": " + fighters[0].health + "  *START*  " + fighters[1].name +": " + fighters[1].health); // initial message to start game
        dom.fighter1.innerHTML = fighters[0].name + ": " + fighters[0].health;
        dom.fighter2.innerHTML = fighters[1].name + ": " + fighters[1].health;
        dom.round.innerHTML = "START";

        dom.btn.addEventListener("click", onClick);




    };

    //-----------------------------------------------------
    //----------EXECUTABLE --------------------------------
    //-----------------------------------------------------



    fight(); // invoking function fight (the other 2 functions, winnerCheck and invokeDamage, are called within fight


})(); // end of self-executing function






