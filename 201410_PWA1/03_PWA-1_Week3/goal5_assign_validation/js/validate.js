/*
     Developed by the JavaScript team at Fullsail
     Date: 1306
*/

// Name:  Kelly Rhodes
// Date:  October 14, 2014
// Course:  Programming for Web Applications I, on-campus, section 00
// Assignment:  Form Validation

//=====================================INSTRUCTIONS: ===================================================================
// Using regular expressions, you will need to create JavaScript code to validate each of the different formatted fields.
// Each field has a very specific format which is outlined below.

//1. An HTML form containing fields has been provided to you in the index.html file. The fields on the form are as follows:
//
//  -- username (id = f_username)
//  -- email (id = f_email)
//  -- phone number (id = f_phone)
//  -- social security number (id = f_ssn)
//  -- password (id = f_password)
//
// The id's have been provided to you and is located in the HTML file for each input field. Each field will need to meet
// the following formats:
//
//  -- username: Has a capitalized first character for the firstName and lastName. (i.e "John Doe", "Mary Ann Doe)
//  -- email: Matches a basic email address, and checks that they are of the proper form. Check to ensure the top level
//     domain is between 2 and 4 characters long, but does not need to check the specific domain against a list
//     (especially since there are so many of them now). (i.e. “account@domain.topLevelDomain”)
//          1.  account: This can be any number of alpha-numeric characters, must start with an alphabet.
//          2.  @: this at-sign must exist in an email address domain: This can be any number of alpha-numeric characters,
//              must start with an alphabet.
//          3.  . (the dot) : This is a required special character.
//          4.  topLevelDomain: The top level domain will between 2 and 4 alpha characters long, this is required in the
//              email address name.
//  -- phone number: The phone number must meet this format (###)###-####.
//  -- social security number: The social security number must meet this format ###-##-####.
//  -- password : The password's first character must be a letter, it must contain at least 4 characters and no more
//     than 15 characters and no characters other than letters, numbers and the underscore may be used
//
// 2. A skeleton of the program is being provided to you in the validate.js file.

// 3. You will create an onsubmit function that will contain a call to the function validateField. An argument needs to
//    be passed in the validateField function call. The argument will be the ID name of the input field. You must
//    dynamically retrieve the ID name from the DOM/HTML. You will need one call to the validateField function for each
//    input field that needs to be validated.

// 4. A skeleton of the validateField function has been provided to you in the validate.js file.

// 5. In the validateField function, you will need to create an else-if statement for each input field id. See the IF
//    statement example format in the validate.js file.

// 6. In the validate.js file you will see a variable named "pass". The string value will need to be replaced with
//    JavaScript code that will test the pattern against the input value.

// 7. All the code to make the background red, green, or white has been provided. All you need to do is generate the
//    code above.

//----------------------------------------------------------------------------------------------------------------------

(function(){
console.log("loaded");

    // --------------------VARIABLE DECLARATIONS------------------------------------------------------------------------

    var dom = { // variable for DOM properties

        username:   document.querySelector("#f_username"),
        email:      document.querySelector("#f_email"),
        phone:      document.querySelector("#f_phone"),
        ssn:        document.querySelector("#f_ssn"),
        password:   document.querySelector("#f_password")

    };

    // --------------------FUNCTION DECLARATIONS------------------------------------------------------------------------


    myform.onsubmit = function(e){

        console.log("form submitted");

        console.log(dom.username.value); // logging the value that was entered for the username field
        console.log(dom.email.value);
        console.log(dom.phone.value);
        console.log(dom.ssn.value);
        console.log(dom.password.value);

        //Below is one example of the validateField call with an argument.
        //You must dynamically retrieve the ID name from the DOM/HTML.

        // validateField(id);  //id = is the form input field ID

        validateField(dom.username); // running the function validateField on the username property
        validateField(dom.email);
        validateField(dom.phone);
        validateField(dom.ssn);
        validateField(dom.password);


        e.preventDefault();
        return false;
    };


    var validateField = function(inputName){ // inputName is format dom.xxxxxx


        if (inputName.name === "f_username"){ // if the name property of the inputName matches the string of f_username, then give the variable the pattern below
            var pattern = /^([A-Z]{1}[a-z]{1,})$|^([A-Z]{1}[a-z]{1,}\040[A-Z]{1}[a-z]{1,})$|^([A-Z]{1}[a-z]{1,}\040[A-Z]{1}[a-z]{1,}\040[A-Z]{1}[a-z]{1,})$|^$/;
        }
        else if (inputName.name === "f_email"){
            pattern = /^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$/;
        } else if (inputName.name === "f_phone"){
            pattern = /^\(\d{3}\) ?\d{3}( |-)?\d{4}|^\d{3}( |-)?\d{3}( |-)?\d{4}/;
        } else if (inputName.name === "f_ssn"){
            pattern = /^\d{3}-\d{2}-\d{4}$/;
        } else if (inputName.name === "f_password"){
            pattern = /^[a-zA-Z]\w{3,14}$/;
        }


        //var pass = 'the RegEx .test statement is needed here';

        var pass = pattern.test(inputName.value); // checking the input against the correct pattern, returns a boolean
        // checking the value entered of the inputName against the pattern


        var errorMsg = inputName.nextSibling.nextSibling.nextSibling.nextSibling;

        if (!pass || inputName.value.length < 2){
            errorMsg.style.display='block';
            inputName.style.backgroundColor = 'red';
        } else if (pass && inputName.value.length > 5){
            errorMsg.style.display='none';
            inputName.style.backgroundColor = 'green';
        } else {
            errorMsg.style.display='none';
            inputName.style.backgroundColor = 'white';
        };

    };



})();  // end wrapper



