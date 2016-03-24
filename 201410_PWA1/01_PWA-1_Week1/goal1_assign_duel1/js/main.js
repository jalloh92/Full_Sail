// Name:  Kelly Rhodes
// Date:  October 1, 2014
// Course:  Programming for Web Applications I, on-campus, section 00
// Assignment:  Analyze Duel #1


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

(function() { // Create privatized scope using a self-executing function

    //-----------------------------------------------------
    //----------INITIALIZING VARIABLES --------------------
    //-----------------------------------------------------

    var player1Name = "Garfield"; // Name of Player 1
    var player1Health = 100; // Health of Player 1; initially set to 100
    var player1Damage = 5; // Maximum amount of damage Player 1 can inflict per round

    var player2Name = "Nermal"; // Name of Player 2
    var player2Health = 100; // Health of Player 2; initially set to 100
    var player2Damage = 5; // Maximum amount of damage Player 2 can inflict per round

    var round = 1; // round number, set to one initially

    //-----------------------------------------------------
    //----------FUNCTION DECLARATIONS----------------------
    //-----------------------------------------------------

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

        if (player1Health < 0 && player2Health < 0) { // if both Player 1 and Player 2 go below 0 health, they both die
            result = "You both die";
        }
        else if (player1Health < 0) { // if only Player 1 health goes below 0, Player 2 wins
            result = player2Name + " wins!!!";
        } else if (player2Health < 0) { // if only Player 2 health goes below 0, Player 1 wins
            result = player1Name + " wins!!!";
        }

        return result; // return the result...note: if no one goes below 0, result stays "no winner"
    };


    //----- function fight:  invokes winnerCheck & inflictDamage within a for loop, will loop 10 times unless one or both players die
    var fight = function () {
        alert(player1Name+": "+player1Health+"  *START*  "+player2Name+": "+player2Health); // initial message to start game


        for (var i = 0; i < 10; i++) { // for each round of fighting, i will be increased

            player1Health -= inflictDamage(player2Damage); // calculating Player 1's health by subtracting amount of damage done via invoking fight function -- this is the damage done by Player 2 to Player 1
            player2Health -= inflictDamage(player1Damage); // calculating Player 2's health by subtracting amount of damage done via invoking fight function -- this is the damage done by Player 1 to Player 2

            console.log(player1Name+": "+player1Health + " " + player2Name+":"+player2Health); // printing to console health status

           var result = winnerCheck(); // invoking winnerCheck function; results of winnerCheck det if fighting continues
           console.log(result);
           if (result==="no winner"){ // as long as there is no winner, the fight keeps going

               alert(player1Name+": "+player1Health+"  *ROUND "+round+" OVER"+"*  "+player2Name+": "+player2Health);
               round++;

            } else{
                alert(result); // if there is a result other than "no winner", the alert will print and the for loop will break
                break;
            };

        }

    };

    //-----------------------------------------------------
    //----------EXECUTABLE --------------------------------
    //-----------------------------------------------------

    fight(); // invoking function fight (the other 2 functions, winnerCheck and invokeDamage, are called within fight


})(); // end of self-executing function






