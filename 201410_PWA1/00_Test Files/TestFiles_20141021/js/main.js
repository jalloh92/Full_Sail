/**
 * Created by kellyrhodes on 10/21/14.
 */

console.log("***** JS loaded *****");

(function(){

    // -----------------------EXAM REVIEW-------------------------------------------------------------------------------


    // -----------------------STRINGS-----------------------------------------------------------------------------------
    console.log("-------------REVIEWING STRINGS----------------");

    var name = "SCOTT";
    var c = name.charAt(0); // index number in string
    var part = name.substring(1,3); // starting index up to ending index (not including ending index)
    var part2 = name.substr(1,3); // starting index plus length

    console.log("name is " + name);
    console.log("charAt(0) = " + c);
    console.log("name.substring(1,3) = " + part);
    console.log("name.substr(1,3) = " + part2);

    // -----------------------LOOPS-------------------------------------------------------------------------------------
    console.log("-------------REVIEWING LOOPS----------------");

    var grades = [ [80, 90, 100], [66, 77, 88] ];

    for(var i = 0; i < grades.length; i++){ // outer loop
        console.log("outer loop " + i + ": "+ grades[i]);

        for (var j = 0; j < grades[i].length; j++){ // inner loop
            console.log("inner loop " + j + ": " + grades[i][j]);
        }
    }

    // -----------------------FOR EACH LOOP-----------------------------------------------------------------------------
    console.log("-------------REVIEWING FOR EACH LOOPS----------------");

    var stuff = [3, "bob", 14, true, [2,3,4]];

    stuff.forEach(function(e){ // loop through each element e in the array, good when you don't need to access the iterator variable!
        console.log("An element of the array is: " + e); // actually pointing to the element...e is not an index number!
    });

    // -----------------------HELPER FUNCTIONS FOR ARRAYS---------------------------------------------------------------
    console.log("-------------REVIEWING HELPER FUNCTIONS FOR ARRAYS----------------");

    var spliceEx = [4, 5, "Bob", 6];
    console.log("The original array is: " + spliceEx);
    //spliceEx.pop(); // to remove the last element of the array
    var thing = spliceEx.splice(2,1); // to remove one element at index 2
    console.log("The new array after spliceEx.splice(2,1): " + spliceEx); // spliceEx is now changed
    console.log("We took out "+ thing); // thing is what was spliced out


    var words = "bob,scott,dave,john,,kelly,car,book,pencil,desk"; // string of words
    var cool = [];
    cool = words.split(","); // splitting up a string of words using a delimiter (comma in this case) and putting into an array
    console.log("The new array is "+ cool);

    // -----------------------DOM---------------------------------------------------------------------------------------
    console.log("-------------REVIEWING DOM----------------");

    var domNode = document.querySelector("p");
    console.log(domNode);
    console.log("The ID is: " + domNode.id);
    console.log("The inner HTML is " + domNode.innerHTML);

    domNode.innerHTML = "hello world!"; // changing innerHTML from default text to hello world!
    console.log("The inner HTML is now " + domNode.innerHTML);

    // can also change id!

    // create an element (need two lines of code):
    var newElement = document.createElement("canvas"); // to create the element  <------ LOOK AT THIS BEFORE TEST!!!!
    document.body.appendChild(newElement); // to place the element

    // -----------------------JSON OBJECTS------------------------------------------------------------------------------
    console.log("-------------REVIEWING JSON OBJECTS----------------");

    var json = {title: "1984", price: 10, author: "George", stats: {pages: 135, coverStock: "paper"}};

    for (var prop in json){ // for each property in the json object
        console.log("The properties are: " + prop); // will give me the name of the properties
        console.log("The value of the properties is: " + json[prop]); // will give me the value of the properties
        // note:  prop will be a string, therefore json[prop] is equivalent to json["title"], etc
        // can't access it via json.prop since prop is a string
    }

    // -----------------------PROTOTYPES------------------------------------------------------------------------------
    console.log("-------------REVIEWING PROTOTYPES----------------");

    function Person(){ // capitalize it so we know it's a constructor function, like a template

        // need "this" to add properties & methods to the constructor
        this.name = Person.prototype.list[~~(Math.random()*Person.prototype.list.length)]; // to get a random name from a list of names
        this.ssn = 123456789;
        this.age=0;
        console.log("Person Created");

    }

    Person.prototype.list = ["bob", "kelly", "joe", "chewie"];

    Person.prototype.eat = function(){ // prototype allows you to add functionality to an object
        console.log(this.name + " is eating"); // do prototype functions outside the constructor object to save RAM
    };

    Person.prototype.getAverage = function(){
        var total = 0;
        this.grades.forEach(function(e){
            total += e;
        });
        return total/this.grades.length;
    };

    var person = new Person(); // creating a new instance of a Person  <------- WILL BE ON TEST!!!!

    //person.name = "Joe";
    person.grades = [100,85,65,70];
    person.eat(); // invoking the eat method
    person.getAverage();

    console.log("The prototype Person is " + Person.prototype);
    console.log(person.name + "'s average is: " + person.getAverage());


    function Student() {
        this.grades = [];
        this.id=0;
        console.log("Student created");
    }

    Student.prototype = new Person(); // just grabbed everything from Person and attached to Student.
    // Add things to the Student prototype AFTER attaching the Person prototype...otherwise previous stuff will be overwritten!

    console.log("The Person's prototype constructor is : " + Person.prototype.constructor);
    console.log("The Student's prototype constructor is : " + Student.prototype.constructor); // still seeing the prototype for Student...sloppy


    var student = new Student;

    console.log("The student's name is: " + student.name); // shows inheritance from Person

    Student.prototype.constructor = Student; // because we overwrote the prototype properties of Student, we need to change the constructor back to Student
    console.log("The Student's prototype constructor is : " + Student.prototype.constructor);

    function Athlete(){
        this.sport = "";
    }

    Athlete.prototype = new Student(); // <-------

    var runner = new Athlete;
    runner.sport = "running";

    console.log(runner.name + runner.sport);

})();