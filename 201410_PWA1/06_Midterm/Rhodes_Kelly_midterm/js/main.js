// Name:  Kelly Rhodes
// Date:  October 11, 2014
// Course:  Programming for Web Applications I, on-campus, section 00
// Assignment:  Midterm Exam

/*
    Mid Terms for PWA1
    do NOT modify the included HTML/CSS file
    read comments in HTML
    Make sure the first student's information is displayed when the browser loads
*/

// ------------------INSTRUCTIONS---------------------------------------------------------------------------------------
//  1.  Create an array of 3 student objects(Object Literals) containing 3 properties. (30%)
//      Properties are:
//          name
//          address (this should be an object with 3 properties, see below)
//              1. street
//              2. city
//              3. state
//          grades (this will be an array of 3 test scores that you make up for the student in this object)
//      Make sure you supply appropriate values for each of the above properties for each student.
//  2.  The HTML (35%) - 25% for correct display, 10% for functioning button
//          • Refer to the given HTML to determine the ID of the tags that need to be referenced by JavaScript including the button
//          • The student name, address, grades, and average grade needs to be displayed correctly in the HTML similar to how It was
//            done in lecture
//          • The next button when clicked will advance to the next student and show the appropriate information. Once the last student
//            is reached then cycle back to the first student in the array.
// 3.   Getting the Average (25%)
//          • Create a custom function named getAverage() that is given an array of numbers as an argument and returns the average
//          • The average that is returned from the function mentioned above is displayed in the HTML for each student, one at a time.
//          • Do NOT created an additional property in the student object literal for the average
//  4.  Dynamic programming: (10%)
//          • The exam should still work regardless of how many students are in the array and how many grades each student has
// ---------------------------------------------------------------------------------------------------------------------


(function(){

    console.log("javascript loaded");

    // ----------------VARIABLE DECLARATION-----------------------------------------------------------------------------

    var student1 = { // object for student 1
        name:       "Minnie Mouse",
        address:    {
             street:     "123 Main Street",
             city:       "Celebration",
             state:      "Florida"
        },
        grades:     [100, 95, 90, 101, 75]
        };

    var student2 = { // object for student 2
        name:       "Mighty Mouse",
        address:    {
            street:     "456 Central Ave",
            city:       "Orlando",
            state:      "Florida"
        },
        grades:     [87, 65, 99]
    };

    var student3 = { // object for student 3
        name:       "Foghorn Leghorn",
        address:    {
            street:     "789 Somewhere Drive",
            city:       "Lexington",
            state:      "Kentucky"
        },
        grades:     [45, 70, 65]
    };

    var students = [student1, student2, student3]; // array to hold all the students
    var studNum = 0; // used to track what student is currently being displayed

    var dom = { // used to easily grab items from DOM
        name:       document.querySelector("#name"),
        address:    document.querySelector("#address"),
        grades:     document.querySelector("#grades"),
        gpa:        document.querySelector("#avg"),
        btn:        document.querySelector("#button")
    };

    var gradesString = "";

// ----------------FUNCTION DECLARATIONS--------------------------------------------------------------------------------


    function display(){

        dom.name.innerHTML = students[studNum].name;
        dom.address.innerHTML = students[studNum].address.street + " " + students[studNum].address.city + " " + students[studNum].address.state;
        dom.grades.innerHTML = students[studNum].grades;
        for(var i = 0; i < students[studNum].grades.length; i++){
            gradesString += "Grade " + (i + 1) + ":  " + students[studNum].grades[i] + " *** ";
        }
        dom.grades.innerHTML = gradesString;
        dom.gpa.innerHTML = calcGpa().toFixed(2);

        studNum ++;
        gradesString = "";

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

// -------------------------EXECUTABLE----------------------------------------------------------------------------------

    dom.btn.addEventListener("click", display);

    display();
    calcGpa();








})();  // end self executing closure