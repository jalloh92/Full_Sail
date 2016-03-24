/**
 * Created by kellyrhodes on 9/17/14.
 */


// create loop that makes the song 99 bottles of beer on the wall.
// until there are no more

for(var i = 99; i > 0; i --) { // for loop for i starting at 99, decreasing by 1 each loop, until i = 1
    if(i != 1){ // if i is between 2 and 99, the following will print
        console.log(i + " bottles of beer on the wall, " + i + " bottles of beer\nTake one down, pass it around, " + (i-1) + " bottles of beer on the wall!");
    } else { // if i is 1, the following will print
        console.log(i + " bottle of beer on the wall, " + i + " bottle of beer\nTake one down, pass it around, no more bottles of beer on the wall!  THE END!");
    }

}