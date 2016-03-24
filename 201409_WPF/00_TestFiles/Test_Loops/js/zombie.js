/**
 * Created by kellyrhodes on 9/17/14.
 */

// zombie madness!!
// we have a zombie here at school.
// it can bit 4 people a day and turn them into zombies
// the cdc want to know how many zombies there will be in 8 days


var numZombies = 1; // initial number of zombies
var numBites = 4; // number of bites per zombie per day
var days = 8; // total number of days

for (var i = 1; i <=  days; i ++){
    numZombies = numZombies * numBites + numZombies; // original zombies plus 4 new zombies per original zombies
    console.log("On day " + i + ", there are " + numZombies + " zombies at school");
}