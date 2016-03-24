/**
 * Created by kellyrhodes on 10/16/14.
 */

console.log("loaded");

(function(){

    // -------------CONSTRUCTOR OBJECT----------------------------------------------------------------------------------
    // creating a blueprint or a pattern for a dog

    /*
    function Dog(){ // CAPITALIZED!!!!  Means that Dog will be an constructor object (like Math and Date)
        console.log("dog created"); // recommended to include

        // need to make instance variables that are tied to the dog object
        this.name = ""; // implies ownership of property to object
        this.age = 0;
        this.breed = "";

    }

    var jeffDog = new Dog(); // creating a new instance of Dog, calling the function
    jeffDog.name = "Pippi"; // assigning a name to jeffDog

    console.log(jeffDog.name);


    var alexDog = new Dog();
    alexDog.name = "Eevee";

    var kennel = [jeffDog, alexDog]; // usually use an array to store all the instances of an object
    // data might be collected via a web page or a program and then pushed into the array
    */


    //------------------------------------------------------------------------------------------------------------------


    /*
    var names = ["Skippy", "Bob", "Princess", "Spot", "Petunia"];
    var maxAge = 15;
    var kennel = [];

    function Dog(){

        console.log("Dog created");
        this.name = names[~~(Math.random()*names.length)]; // to pick a name randomly from the array of names
        this.age = ~~(Math.random()*maxAge + 1); // to pick an age between 1 and 15 randomly
    }


    for (i = 0; i < 101; i++){

        kennel.push(new Dog()); // pushing a new dog into the array kennel with random properties
        console.log(kennel[i]);

    }


    function displayDogNames(){

        kennel.forEach(function(e){
            console.log(e.name);
        })

    }

*/

    //------------------------------------------------------------------------------------------------------------------
    // LOAD DATA BEFORE MAIN -- main needs the data to run; it's main is loaded first, it can't find the data!!!!

    var students = [];
    var studNum = 0;

    createStudents();

    function createStudents(){

        classRoom.students.forEach(function(e){ // for each element is the student array from the json..

            var kid = new Kid(); // creating a new instance of Kid
            kid.name = e.name; // getting name from json and storing as new kid's name
            kid.id = e.id; // getting id from json and storing as new kid's id
            kid.grades = e.grades;

            students.push(kid); // adding to the students array in the main file

        });

    }

    function Kid(){
        this.name = "";
        this.id = 0;
        this.grades = [];
    }



    Kid.prototype.eat = function (){ // must use anonymous function

        // how to add a method (function) to an object need to modify the PROTOTYPE
        console.log(this.name + " is eating"); // it knows the "this" reference

    };




    Kid.prototype.getAverage = function(){

        var total = 0;
        for(var i = 0; i < this.grades.length; i++){
            total += this.grades[i];
        }

        return (total / this.grades.length);
    }


    function displayData(){
        students.forEach(function(e){

            console.log("Name: " + e.name);
            console.log("ID: " + e.id);
            console.log("Average: " + e.getAverage());
            console.log("-------------------------------");

        })


    }

    displayData();


})();
