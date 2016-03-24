/**
 * Created by kellyrhodes on 10/11/14.
 */
// Test Review

(function(){

    var output = document.querySelector("#test");
    document.querySelector("button").addEventListener("click", onClick);


    function onClick(){
        updateHTML();
        console.log("click");

    }

    function updateHTML(){
        output.innerHTML = "good luck";
    }



})();
