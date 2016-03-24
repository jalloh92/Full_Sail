// Test Files for October 9, 2014

(function(){ // start of self-executing function


//--------nested for loop example---------------------------------------------------------------------------------------

/*
    var hard = [ ["a", "b", "c"], ["d", "e", "f"], ["g", "h", "i"] ];
    // hard[0] = ["a", "b", "c"] --> an array!


    for (var i = 0; i < hard.length; i++){
        for (var j = 0; j < hard[i].length; j++){ // when i = 0, accessing the array ["a", "b", "c"]
            console.log(hard[i][j]); // when i=0 and j=0, accessing the first element ("a") of hard[0]
        }
    }
*/

//----------exam review-------------------------------------------------------------------------------------------------

    console.log("Javascript loaded"); // test to make sure file has been loaded, even put before self-executing function?
    // need a self-executing function

    var student1 = { // need to be able to create an object

        name: "Joe",
        grades: [ 90, 80, 95],
        address: {street: "960 Rolling Hills",city: "Orlando"}

    };

    var student2 = { // need to be able to create an object

        name: "Dave",
        grades: [ 44, 31, 10],
        address: {street: "beer street",city: "Pizza"}

    };


    var student3 = { // need to be able to create an object

        name: "Shelley",
        grades: [ 6, 3, 100],
        address: {street: "123 Main Street",city: "Portland"}

    };



    var students = [student1, student2, student3];
    var studNum = 0; // used to track what student is currently being displayed

    var dom = {
        name:       document.querySelector("#name"),
        address:    document.querySelector("#address"),
        grades:     document.querySelector("#grades"),
        gpa:        document.querySelector("#gpa"),
        btn:        document.querySelector("button")
    };


    dom.btn.addEventListener("click", display);

    display(); // don't forget the function call!!!!
    calcGpa();


    function display(){

        dom.name.innerHTML = students[studNum].name;
        dom.address.innerHTML = students[studNum].address.street + " " + students[studNum].address.city;
        dom.grades.innerHTML = students[studNum].grades;
        dom.gpa.innerHTML = calcGpa().toFixed(2);

        studNum ++;

        if (studNum === students.length) {
            studNum = 0;
        }

    }

    function calcGpa(){

        var total = 0;

        for(var i = 0; i < students[studNum].grades.length; i ++){
            total += students[studNum].grades[i];
        };

        var avg = total / students[studNum].grades.length;

        return avg;

    }






})(); // end of self-executing function
