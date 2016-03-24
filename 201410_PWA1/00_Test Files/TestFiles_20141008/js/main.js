/**
 * Created by kellyrhodes on 10/8/14.
 */

// ask Scott about this...how did it know what element, index and array were?
var arr1 = [1,2,3,4,5];

arr1.forEach(function(element, index, array){
        console.log("element: " + element);
        console.log("index: " + index);
        console.log("array: " + array);
        arr1.pop();
        console.log("---------------");
    }

);