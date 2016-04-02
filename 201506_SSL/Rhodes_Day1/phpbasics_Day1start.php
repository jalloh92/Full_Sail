<!--
* SSL 1506 PHP Basics (Syntax Rules, Variables, Arrays, Functions, SuperGlobals, GET/POST)
* Name:  Updated by Fia
* Date:  Summer2015
-->


<!-- STARTING HTML -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>SSL Basics - by Kelly</title>
    <meta name="description" content="">
    <meta name="author" content="">

</head>


<!-- CSS File -->

<link rel="stylesheet" type="text/css" href="css/basics.css">


<body>

<!-- REPLACE MY NAME IN THE TITLE BELOW WITH YOUR NAME -->
<h1><b>PHP Programming Basics<br>(DAY #1) - by Kelly</b></h1>

<!-- REPLACE MY PHOTO BELOW WITH YOUR PHOTO -->
<center><img src="images/kelly_photo.jpg" width=150 height=150></center><br><br>


<h2>*** SYNTAX RULES, COMMENTS, AND CASE SENSITIVITY ***</h2>


<!----------------------- BASIC SYNTAX RULES -----------------
- A PHP file normally contains HTML tags, and some PHP scripting code.
- A PHP script is executed on the server, and the plain HTML result is sent back to the browser.
- The default file extension for PHP files is ".php".
- A PHP script can be placed anywhere in the document.
- A PHP script starts & ends with <?php /* put some code here */ ?>
- End all PHP statements or commands with a semi-colon ;


<!--------------------------- PHP "ECHO" VS. "PRINT" Statements --------------------------
In PHP there are two basic ways to get output: echo and print.

In this class we use echo (and print) in almost every example.
- echo and print are more or less the same. They are both used to output data to the screen.
- The differences are small, but echo is marginally faster than print.
- The echo and print statement can be used with or without parentheses: echo or echo().
- Later we'll use the parentheses when we want to combine text strings with addition of 2 variables.
- Moving forward, we will use print for HTML titles and echo for everything else...
- Create an example below that shows how to output text with the echo command
- Notice that the text can contain HTML markup: -->

<?php
print "<h2>BROWSER OUTPUT - ECHO VS. PRINT STATEMENTS</h2>";
echo "Hello World!<br>";
echo "I'm about to learn PHP!<br>";
echo "This ", "string ", "was ", "made ", "with comma concatenation & multiple parameters.<br>";
echo "This ". "string ". "was ". "made ". "with dot /period concatenation & multiple parameters.<br>";
?>


<!---------------------- DECLARING PHP Variables ---------------------
Variables are "containers" for storing information.
In PHP, a variable starts with the $ sign, followed by the name of the variable:
-->

<?php
$txt = "Hello World!";
$x = 5;
$y = 10.5;
?>

<!----------------------- WHY USE COMMENTS INSIDE YOUR CODE? ------------------
Comments can be used to:
- Let others understand what you are doing
- Remind yourself of what you did - Most programmers have experienced coming back to their own work a year or two late
  and having to re-figure out what they did. Comments can remind you of what you were thinking when you wrote the code
- PHP supports several ways of commenting:
-->

<?php
// This is a single-line comment

# This is also a single-line comment

/*
This is a multiple-lines comment block
that spans over multiple
lines
*/
?>

<!-- You can also use comments to leave out parts of a code line -->

<?php
$x = 5 /* + 15 */ + 5;
echo "I set my 1st PHP variable equal to: " . $x;
?>


<!----------------------  PHP CASE SENSITIVITY ---------------------
- In PHP, all keywords (e.g. if, else, while, echo, etc.), classes, functions, and user-defined functions are NOT
case-sensitive.
- Create 3 different "echo" statements below where all three echo statements are legal (and equal): -->

<?php
ECHO "<br><hr>Hello SSL Class!<br>";
echo "<br>Welcome to Server Side Languages!<br>";
EcHo "<br>Now, go create some PHP!<br><hr>";
?>


<!---------------------- VARIABLES & CASE SENSITIVITY ---------------------
- All variable names are case-sensitive.
- Create an example below that will display the value of the $color variable (remember, $color, $COLOR,
  and $coLOR are treated as three different variables): -->

<?php
$color = "red";
echo "<hr>My car is " . $color . "<br>";
echo "My house is " . $COLOR . "<br>";
echo "My boat is " . $coLOR . "<br><hr>";
?>

<!---------------------- more on DECLARING PHP Variables ---------------------
- When you assign a text value to a variable, put quotes around the value.
- Unlike other programming languages, PHP has no command for declaring a variable.
- It is created the moment you first assign a value to it.

Rules for PHP variables:
- Again, variables start with the $ sign, followed by the name of the variable
- Then, variable name must start with a letter or the underscore character
- A variable can have a short name (like x and y) or a more descriptive name (age, carname, total_volume).
- A variable name cannot start with a number
- A variable name can only contain alpha-numeric characters and underscores (A-z, 0-9, and _ )
- Variable names are case-sensitive ($age and $AGE are two different variables)

Output Variables
- The PHP echo statement is often used to output data to the screen.
- Create an example below will show how to output text and a variable:
-->

<?php
$txt = "Programming in PHP with Fia";
echo "I love $txt";


// Using Escape characters wth variable output
echo "I love escape characters too!  The value of \$txt is: " . $txt . "<br>";
?>

<!-- Create an alternative example that will produce the SAME output as the example above: -->

<?php
$txt = "Programming in SSL.  It's totally awesome";
echo "I love " . $txt . "!<br>";
?>


<!-- Create a example that will output the sum of two variables: -->

<?php
$x = 5;
$y = 4;
echo "Here is how you output 2 variables with parentheses: " . ($x + $y) . "<br>";
?>


<!-------------- NOTE:  PHP is a Loosely Typed Language -----------------------
- In the example above, notice that we did not have to tell PHP which data type the variable is.
- PHP automatically converts the variable to the correct data type, depending on its value.
- In other languages such as C, C++, and Java, the programmer must declare the name and type of the variable
  before using it.
-->


<!-------------------  PHP VARIABLE SCOPE -----------------------------
-- In PHP, variables can be declared anywhere in the script.
-- The scope of a variable is the part of the script where the variable can be referenced/used.
-- PHP has three different variable scopes:

1. local
2. global
3. static

- A variable declared outside a function has a GLOBAL SCOPE and can only be accessed "outside" a function
- Create an example that demonstrates Global VS Local Scope:
-->

<?php
$x = 5; // global scope
function myTest1(){
  // using x inside this function will generate an error
  echo "<p>Using x inside this function will generate an error!</p>";
  echo "<p>(1) Variable x inside the function is $x</p>";
}
myTest1();

echo "<p>(2) Variable x outside function is: $x</p>";
?>

<!--
- Remember, a variable declared within a function has a LOCAL SCOPE and can only be accessed within that function.
- Create an example below: -->

<?php
function myTest2(){
  $x = 5; // local scope
  echo "<p>(3) Varaible inside function is: $x</p>";
}
myTest2();

// using x outside the funciton will generate an error
echo "<p>(4) Variable outside function is $x</p>"
?>

<!--------------------- THE GLOBAL KEYWORD
You can have local variables with the same name in different functions, because local variables are only
recognized by the function in which they are declared.

- The global keyword is used to access a global variable from within a function.
- To do this, use the global keyword before the variables (inside the function): -->

<?php
$x = 5;
$y = 10;

function myTest3(){
  global $x, $y;
  $y = $x + $y;
}

myTest3();
echo "Wow - I'm accessing a gloabl variable for outside a function.  Result of \$y = " . $y . "<br>"
?>

<!--
- PHP can also stores all global variables in an array called $GLOBALS[index].
- The index holds the name of the variable.
- This array is also accessible from within functions and can be used to update global variables directly.
- The example above can be rewritten like this:
- We'll explore this more in detail later... -->

<?php
$x = 5;
$y = 10;

function myTest4(){
  $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];
}

myTest4();
echo "Value of \$GLOBALS array - \$y value (adding x & y): " . $y . "<br>"; // outputs 15
?>

<!-- PHP - THE STATIC KEYWORD
Normally, when a function is completed/executed, all of its variables are deleted.
However, sometimes we want a local variable NOT to be deleted because we need it for a further job.
To do this, use the "static" keyword when you first declare the variable: -->

<?php
function myTest5(){
  static $x2 = 0;
  echo $x2 . "<br>";
  $x2++;
}

myTest5();
myTest5();
myTest5();
echo $x2 . "Notice that there is NO result for x outside of function --- even using the static keyword!<br>";
?>



<!--
Then, each time the function is called, that variable will still have the information it contained from the last
time the function was called.  Note: The variable is still local to the function. -->



<!---------------------------- Display Variables (more practice)
- Create an example below that shows how to output text and variables with the echo statement: -->

<?php
$txt1 = "DISPLAYING VARIABLES with Echo";
$txt2 = "Full Sail University";
$x = 5;
$y = 4;

echo "<h2>$txt1</h2>";
echo "Study PHP at $txt2<br>";
echo "This echo statement using parentheses to add variables: " . ($x + $y). "<br>";
?>



<!---------------------------- The PHP print Statement   ------------------------------
- The print statement can be used with or without parentheses: print or print().
- Create an example below that show how to output text with the print command (notice that the text can
  contain HTML markup):
-->

<?php
print "<h2>Using the PHP PRINT Statement</h2>";
print "Hello World!<br>";
print "I'm about to learn PHP! ";
print "This print statment uses parentheses to add variables: " . ($x + $y) . "<br>";
?>


<!----------------------------- Display Variables ------------------------------
- Create an example below that shows how to output text and variables with the print statement:
-->

<?php
$txt1 = "DISPLAYING VARIABLES with print";
$txt2 = "Full Sail University";
$x = 5;
$y = 4;
print "<h2>$txt2</h2>";
print "Study PHP at $txt2<br>";
print $x + $y;
?>


<!----------------------------- PHP Data Types ------------------------------
Variables can store data of different types, and different data types can do different things.

PHP supports the following data types:
- String
- Integer
- Float (floating point numbers - also called double)
- Boolean
- Array
- Object
- NULL

PHP STRINGS
- A string is a sequence of characters, like "Hello world!".
- A string can be any text inside quotes. You can use single or double quotes:
- Create an example below:
-->

<?php
print "<h2>PHP DATA TYPES (Strings)</h2>";
$x = "Hey PHP Programmer!";
$y = 'Want an A in Server-Side Languages!';
$z = 'Great - You can do it!  Make sure you study hard, debug your code, and do your lab/screen casts';

echo $x;
echo "<br>";
echo $y;
echo "<br>";
echo $z;
echo "<br>";
?>


<!------------------------------ PHP INTEGERS ------------------------------
An integer is a whole number (without decimals).  It is a number between -2,147,483,648 and +2,147,483,647.

Rules for integers:
- An integer must have at least one digit (0-9)
- An integer cannot contain comma or blanks
- An integer must not have a decimal point
- An integer can be either positive or negative
- Integers can be specified in three formats: decimal (10-based), hexadecimal (16-based - prefixed with 0x) or octal
  (8-based - prefixed with 0)

Create an example where $x is an integer. Use PHP var_dump() function to return the data type and value:
-->

<?php
print "<h2>PHP INTEGERS</h2>";
$x = 5985;
echo '// var_dump is great for figureing out the data type & value of your variables!!<br>';
echo '// Here\'s a var_dump of an integer.<br><br>';
var_dump($x);
echo "<br><br>";
?>


<!------------------------------ PHP FLOAT ------------------------------
- A float (floating point number) is a number with a decimal point or a number in exponential form.
- In the following example $x is a float. The PHP var_dump() function returns the data type and value:
-->

<?php
$x2 = 10.365;
echo '// Here\'s a var_dump of a floating point number.<br><br>';
var_dump($x2);
echo "<br><br>";
?>



<!------------------------------ PHP BOOLEAN ------------------------------
- A Boolean represents two possible states: TRUE or FALSE.
- Booleans are often used in conditional testing.
- We'll get to this later... but this is how you define a boolean variable:

$x = true;
$y = false;

 -->


<!------------------------------ PHP ARRAYS  ------------------------------
- An array stores multiple values in one single variable.
- In the following example $cars is an array.
- The PHP var_dump() function returns the data type and value: -->


<?php
print "<h2>PHP ARRAYS</h2>";
$cars = array("Volvo", "BMW", "Toyota");
var_dump($cars);
echo "<br><br>"
?>


<!------------------------------  PHP OBJECTS ------------------------------
- An object is a data type which stores data and information on how to process that data.
- In PHP, an object must be explicitly declared.
- First we must declare a class of object. For this, we use the class keyword.
- Also use the object operator " -> " pronounced "dash chevron" when referencing a method or instance of a class
- A class is a structure that can contain properties and methods: -->

<?php
class Car{
  function Car(){
    $this->model = "VW";
  }
}

// create an object
$herbie = new Car();
?>

<?php
print "<h2>PHP OBJECTS</h2>";
echo $herbie->model;
echo "<br><br>";
?>


<!------------------------------  PHP NULL Value ------------------------------
- Null is a special data type which can have only one value: NULL.
- A variable of data type NULL is a variable that has no value assigned to it.
- Tip: If a variable is created without a value, it is automatically assigned a value of NULL.
- Variables can also be emptied by setting the value to NULL: -->

<?php
$x = "Hello World!";
$x = null;
var_dump($x);
echo "<br><br>";
?>



<!------------------------------ PHP STRING FUNCTIONS ------------------------------
A string is a sequence of characters, like "Hello world!".
We will look at some commonly used functions to manipulate strings.
- The PHP strlen() function returns the length of a string (number of characters).
- Create an example below that returns the length of the string below: -->

<?php
print "<h2>PHP STRING FUNCTIONS</h2>";
echo strlen("I love string functions!"); // outputs 24 including spaces
echo "<br><br>";
?>


<!-- Count The Number of Words in a String
- The PHP str_word_count() function counts the number of words in a string:
- Create an example below that counts the length of the string below: -->

<?php
echo str_word_count("The String Word Count Function is so Convenient!"); // outputs 8
echo "<br><br>";
?>



<!-- Reverse a String
- The PHP strrev() function reverses a string:
- Create an example below that reverses the length of the string below": -->

<?php
echo strrev("Hey, Hey, Hey! It's Fat Albert"); 
echo "<br><br>";
?>



<!-- Search For a Specific Text Within a String
- The PHP strpos() function searches for a specific text within a string.
- If a match is found, the function returns the character position of the first match. If no match is found, it will
  return FALSE.
- Create an example below that searches for the text "world" in the string "Hello world!": -->

<?php
echo strpos("Hey, Hey, Hey! It's Fat Albert:-)", ":-)"); 
echo "<br><br>";
?>


<!-- TIP: The first character position in a string is 0 (not 1). -->


<!-- Replace Text Within a String
- The PHP str_replace() function replaces some characters with some other characters in a string.
- Create an example below that below replaces the text "world" with "Dolly":  -->

<?php
echo str_replace("world", "Full Sailor", "Hello world!");
echo "<br><br>";
?>


<!-- Complete PHP String Reference
For a complete reference of all string functions, go to our complete http://php.net/ref.strings
The PHP string reference contains description and example of use, for each function -->





<!------------------------------ PHP CONSTANTS ------------------------------
-  Constants are like variables except that once they are defined they cannot be changed or undefined.
- A constant is an identifier (name) for a simple value. The value cannot be changed during the script.
- A valid constant name starts with a letter or underscore (no $ sign before the constant name).
- Unlike variables, constants are automatically global across the entire script.

Create a PHP Constant
- To create a constant, use the define() function.
- Syntax:  define(name, value, case-insensitive)

Parameters:

- name: Specifies the name of the constant
- value: Specifies the value of the constant
- case-insensitive: Specifies whether the constant name should be case-insensitive. Default is false

Write an example below that creates a constant with a case-sensitive name: -->

<?php
print "<h2>PHP CONSTANTS</h2>";
define("GREETING", "I'm a great SSL student because I study hard!");
echo GREETING . "<br>";
echo "<br><br>";
?>

<!-- The example below creates a constant with a case-insensitive name: -->

<?php
define("GREETING", "I develop & program awesome web applications in SSL!", true);
echo greeting;
echo "<br><br>";
?>



<!-- Constants are Global
- Constants are automatically global and can be used across the entire script.
- Create an example below that uses a constant inside a function, even if it is defined outside the function: -->

<?php
define("GREETING", "My clients love my web development work");

function myTest7(){
  echo GREETING;
  echo "<br><br>";
}

myTest7();
?>





<!------------------------------ PHP OPERATORS ------------------------------

Operators are used to perform operations on variables and values.

PHP divides the operators in the following groups:

    Arithmetic operators
    Assignment operators
    Comparison operators
    Increment/Decrement operators
    Logical operators
    String operators
    Array operators

- Arithmetic operators are used with numeric values to perform common (+, -, *, / %)
  arithmetical operations, such as addition, subtraction, multiplication etc.
- Assignment operators are used with numeric values to write a value to a variable. (=, +=, -=, *=, /=)
  The basic assignment operator in PHP is "=". It means that the left operand gets set to the value of the
  assignment expression on the right.
- Comparison operators are used to compare two values (number or string) ($x == $y, ===, !=, <>, >, <, <=, >=)
- Increment operators are used to increment a variable's value. (++$x or $x++)
- Decrement operators are used to decrement a variable's value. ($x-- or --$x)
- The PHP logical operators are used to combine conditional statements. (AND: $x && $y; OR: $x || $y; NOT !$x)
- PHP has two operators that are specially designed for strings (CONCATENATE: $txt1 . $txt2 | APPEND: $txt1 .= $txt2)
- The PHP array operators are used to compare arrays. (+, ==, ===, !=, etc.)

NOTE:  For a complete list of operators and examples of how to use them, visit the website below.

http://us1.php.net/manual/en/language.operators.comparison.php
Use to compare variables - strings, integers, boolean, etc. -->






<!------------------------------ PHP CONTROL STRUCTURES - if...else...elseif Statements ------------------------------

- Conditional statements are used to perform different actions based on different conditions.
- Very often when you write code, you want to perform different actions for different decisions.
- You can use conditional statements or control structure in your code to do this.

In PHP we have the following conditional statements:
- if statement - executes some code only if a specified condition is true
- if...else statement - executes some code if a condition is true and another code if the condition is false
- if...elseif....else statement - specifies a new condition to test, if the first condition is false
- switch statement - selects one of many blocks of code to be executed

The if Statement
- The if statement is used to execute some code only if a specified condition is true.

SYNTAX:
if (condition) {
code to be executed if condition is true;
}

Create an example below that will output "Have a good day!" if the current time (HOUR) is less than 20: -->

<?php
print "<h2>CONTROL STRUCTURES - if...else...elseif Statements</h2>";
$t = date("H");

if($t < "18"){
  echo "Have a good day!";
  echo "<br>";
  echo "<br><br>";
}

echo date("Y/m/d H:i:s");
?>





<!-- NOTE on time zones. A more complete approach is.....

Above examples will return NOW using your server timezone, as it is defined in php.ini, for example:

[Date]
; Defines the default timezone used by the date functions
; http://php.net/date.timezone
date.timezone = Europe/Athens

To fix this, COPY/PASTE this line right before your ECHO statement above:

date_default_timezone_set("America/New_York");

See example below:

-->

<?php
print "<h3>Fixing Time Zone</h3>";
$t = date("H");

if($t < "13"){
  echo "Have a good morning!";
  echo "<br>";
  echo "<br><br>";
}
// changed the time zone
date_default_timezone_set("America/New_York");
echo date("Y/m/d H:i:s");
?>
<!-- NO

<!-------------------------------- if...else Statement

- Use the if....else statement to execute some code if a condition is true and another code if the condition is false.

SYNTAX:
if (condition) {
code to be executed if condition is true;
} else {
code to be executed if condition is false;
}

- Create an example below that will output "Have a good day!" if the current time is less than 20,
and "Have a good night!" otherwise:
-->

<?php
date_default_timezone_set("America/New_York");
$t = date("H");

if($t < "18"){
  echo "Have a good day!";
  echo "<br><br>";
} else {
  echo "Have a good night!";
  echo "<br><br>";
}
?>






<!-------------------------------- PHP - The if...elseif....else Statement

- Use the if....elseif...else statement to specify a new condition to test, if the first condition is false.

SYNTAX:
if (condition) {
code to be executed if condition is true;
} elseif (condition) {
code to be executed if condition is true;
} else {
code to be executed if condition is false;
}

- Create an example below will output "Have a good morning!" if the current time is less than 10, and "Have a good day!"
if the current time is less than 20. Otherwise it will output "Have a good night!": -->

<?php
$t = date("H");

if($t < "12"){
  echo "<br>We had a good morning!";
  echo "<br><br>";
} elseif($t < "18") {
  echo "<br>We're having a good day!";
  echo "<br><br>";
}else {
  echo "<br>Hope you have a good night!";
  echo "<br><br>";
}
?>



<!-------------------------------- The PHP SWITCH Statement
- The switch statement is used to perform different actions based on different conditions.
- Use the switch statement to select one of many blocks of code to be executed.

SYNTAX:
switch (n) {
    case label1:
        code to be executed if n=label1;
        break;
    case label2:
        code to be executed if n=label2;
        break;
    case label3:
        code to be executed if n=label3;
        break;
    ...
    default:
        code to be executed if n is different from all labels;
}

This is how it works:
- First we have a single expression n (most often a variable), that is evaluated once.
- The value of the expression is then compared with the values for each case in the structure.
- If there is a match, the block of code associated with that case is executed.
- Use break to prevent the code from running into the next case automatically.
- The default statement is used if no match is found.
- Create an example below based on your favorite artist: -->

<?php
print "<h2>The SWITCH Statement</h2>";
$favArtist = "beyonce";

switch($favArtist){
  case "beyonce":
    echo "Your favorite Artist is beyonce!";
    echo "<br><br>";
    break;
  case "madonna":
    echo "Your favorite Artist is madonna!";
    echo "<br><br>";
    break;
  case "prince":
    echo "Your favorite Artist is prince!";
    echo "<br><br>";
    break;
  default:
    echo "Your favorite Artist is neither beyonce, madonna or prince!";
    echo "<br><br>";
}
?>




<!-------------------------------- PHP "while" Loops --------------------------------


- PHP while loops execute a block of code while the specified condition is true.
- Often when you write code, you want the same block of code to run over and over again in a row. Instead of adding
  several almost equal code-lines in a script, we can use loops to perform a task like this.

In PHP, we have the following looping statements:

- while - loops through a block of code as long as the specified condition is true
- do...while - loops through a block of code once, and then repeats the loop as long as the specified condition is true
- for - loops through a block of code a specified number of times
- foreach - loops through a block of code for each element in an array


The PHP while Loop:
- The while loop executes a block of code as long as the specified condition is true.

SYNTAX:
while (condition is true) {
code to be executed;
}

- Create example below that first sets a variable $x to 1 ($x = 1).
- Then, make the while loop continue to run as long as $x is less than, or equal to 5 ($x <= 5).
- $x will decrease by 1 each time the loop runs ($x--): -->

<?php
print "<h2>PHP LOOPS (while, do...while, for, foreach)</h2>";
$x = 1;

while($x <= 5){
  echo "The number is: $x <br>";
  $x++;
}
?>




<!-------------------------------- The PHP "do...while" Loop

- The do...while loop will always execute the block of code once, it will then check the condition
- It repeats the loop while the specified condition is true.

SYNTAX:

do {
code to be executed;
} while (condition is true);

- Create example below that first sets a variable $x to 1 ($x = 1).
- Then, use the do while loop to write some output, and then increment the variable $x with 1.
- Check the condition (is $x less than, or equal to 5?), and let the loop run as long as $x is less than, or equal to 5:
-->

<?php
print "<h3>DO WHILE LOOP</h3>";
$x = 1;
do {
  echo "The number is: $x <br>";
  $x++;
} while ($x <=5);
?>



<!-- NOTE:  Notice that in a do while loop the condition is tested AFTER executing the statements within the loop.
- This means that the do while loop would execute its statements at least once, even if the condition is false the first time.
- Create example below that sets the $x variable to 6, then it runs the loop, and then the condition is checked: -->

<?php
print "<h3>DO WHILE LOOP</h3>";
$x = 6;
do {
  echo "The number is: $x <br>";
  $x++;
} while ($x <=5);
?>


<!-------------------------------- The PHP "for" Loop
- PHP for loops execute a block of code a specified number of times.
- The for loop is used when you know in advance how many times the script should run.

SYNTAX:
for (init counter; test counter; increment counter) {
    code to be executed;
}

Parameters:

    init counter: Initialize the loop counter value
    test counter: Evaluated for each loop iteration.
                 If it evaluates to TRUE, the loop continues.
                 If it evaluates to FALSE, the loop ends.
    increment counter: Increases the loop counter value

Create an example below that displays the numbers from 0 to 10: -->

<?php

print "<h3>FOR LOOP</h3>";

for ($x = 0; $x <= 10; $x++){
  echo "The number is: $x <br>";
}

?>

<!-------------------------------- The PHP foreach Loop

The foreach loop works only on arrays, and is used to loop through each key/value pair in an array.
Syntax:

foreach ($array as $value) {
    code to be executed;
}

For every loop iteration, the value of the current array element is assigned to $value and the array pointer is
moved by one, until it reaches the last array element.

The following example demonstrates a loop that will output the values of the given array ($colors): -->

<?php

print "<h3>FOR EACH LOOP</h3>";
$colors = array("red", "green", "blue", "yellow");
foreach($colors as $value){
  echo "$value <br>";
}
?>


<!-------------------------------- PHP Functions --------------------------------

- The real power of PHP comes from its functions; it has more than 1000 built-in functions.

PHP User Defined Functions
- Besides the built-in PHP functions, we can create our own functions.
- A function is a block of statements that can be used repeatedly in a program.
- A function will not execute immediately when a page loads.
- A function will be executed by a call to the function.
- A user defined function declaration starts with the word "function":

SYNTAX:
function functionName() {
code to be executed;
}

- A function name can start with a letter or underscore (not a number).
- Tip: Give the function a name that reflects what the function does!
- Function names are NOT case-sensitive.
- The opening curly brace ( { ) indicates the beginning of the function code and the closing curly brace ( } )
  indicates the end of the function.
- Create a function named "writeMsg()".
- The function should output "Happy Monday!". To call the function, just write its name: -->

<?php
print "<h2>PHP FUNCTIONS & ARGUMENTS</h2>";
function writeMsg(){
  echo "Happy Mondy Full Sailors!";
}

writeMsg(); // call the function
?>


<!-------------------------------- PHP Function Arguments
- Information can be passed to functions through arguments. An argument is just like a variable.
- Arguments are specified after the function name, inside the parentheses.
- You can add as many arguments as you want, just separate them with a comma.
- Create an example that has a function with one argument ($topic).
- When the something() function is called, also pass along a name (e.g. Fia), and use the topic inside the
  function; then outputs several different topics, but with the same comments at the end: -->

<?php
function something($topic){
  echo "$topic Rocks!<br>";
}

something("Fia");
something("SSL");
something("Full Sail University");
something("WDD");
something("PHP");
?>


<!-- The following example has a function with two arguments ($fname and $year): -->

<?php
function familyName2($fname2, $year){
  echo "$fname2 was born in $year <br>";
}

familyName2("Bill Gates", "1955");
familyName2("Snoop Dog", "1971");
familyName2("Beyone", "1974");
familyName2("Katy Perry", "1984");

echo "<br><hr><br>"
?>



<!-------------------------------- PHP Default Argument Value
- The following example will show how to use a default parameter.
- If we call the function setHeight() without arguments it takes the default value as argument: -->

<?php
function setHeight($minheight = 50){
  echo "<br>My height is : $minheight <br>";
}

setHeight(350);
setHeight();
setHeight(135);
setHeight(80);
echo "<br><hr><br>"
?>



<!-------------------------------- PHP Functions - Returning values
- To let a function return a value, use the return statement: -->

<?php
function sum($x, $y){
  $z = $x + $y;
  return $z;
}

echo "5 + 10 = " . sum(5,10) . "<br>";
echo "7 + 13 = " . sum(7,13) . "<br>";
echo "2 + 4 = " . sum(2,4) . "<br>";

echo "<br><hr><br>"
?>




<!-------------------------------- PHP Arrays --------------------------------
- An array stores multiple values in one single variable:
- An array is a special variable, which can hold more than one value at a time.
- If you have a list of items (a list of car names, for example), storing the cars in single variables
  could look like this:

$cars1 = "Volvo";
$cars2 = "BMW";
$cars3 = "Toyota";

- However, what if you want to loop through the cars and find a specific one? And what if you had not 3 cars, but 300?
- The solution is to create an array!
- An array can hold many values under a single name, and you can access the values by referring to an index number.
- In PHP, the array() function is used to create an array
- In PHP, there are three types of arrays:

1. Indexed arrays - Arrays with a numeric index
2. Associative arrays - Arrays with named keys
3. Multidimensional arrays - Arrays containing one or more arrays; ADVANCED TOPIC "not discussed"  -->


<!-------------------------------- PHP Indexed Arrays

There are two ways to create indexed arrays:

- The index can be assigned automatically (index always starts at 0), like this:

$cars = array("Volvo", "BMW", "Toyota");

- or the index can be assigned manually:
$cars[0] = "Volvo";
$cars[1] = "BMW";
$cars[2] = "Toyota";

- Write example that creates an indexed array named $cars, assigns three elements to it,
  and then prints a text containing the array values: -->

<?php
print "<h2>ARRAYS (Indexed & Associative)</h2>";
$cars = array("Volvo", "BMW", "Toyota");
echo "I like " . $cars[0] . ", " . $cars[1] . " and " , $cars[2]
. ".<br><br>";

?>



<!--------------------------------  Get The Length of an Array - The count() Function
- The count() function is used to return the length (the number of elements) of an array: -->

<?php
$cars2 = array("Volvo", "BMW", "Toyota");
echo "My array has ". count($cars2) . " cars! They are...<br><br>";

?>



<!--------------------------------  Loop Through an Indexed Array
- To loop through and print all the values of an indexed array, you could use a "for" loop, like this: -->

<?php
$cars3 = array("Volvo", "BMW", "Toyota");
$arrlength = count($cars3);

for($x = 0; $x < $arrlength; $x++){
  echo $cars3[$x] . "<br><br>";
}
?>




<!-------------------------------- PHP Associative Arrays (Using NAMED Keys & Values)
- Associative arrays are arrays that use named keys that you assign to them.
- There are two ways to create an associative array:

$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

- or you can assign them separately:

$age['Peter'] = "35";
$age['Ben'] = "37";
$age['Joe'] = "43";

The named keys can then be used in a script: -->

<?php

$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

echo "Peter is " . $age['Peter'] . " years old.";
echo "<br><br>";
?>



<!-------------------------------- Loop Through an Associative Array
To loop through and print all the values of an associative array, you could use a foreach loop, like this: -->

<?php

$age2 = array();

$age2['Peter'] = "35";
$age2['Ben'] = "37";
$age2['Joe'] = "43";

foreach($age2 as $x => $x_value){
  echo "Key = " . $x . ", Value = " . $x_value . "<br>";
  echo $x . " is " . $x_value . " years old!";
  echo"<br><br>";
}
?>

<!-------------------------------- Complete PHP Array Reference
For a complete reference of all array functions,
go to the PHP Array Reference at http://php.net/manual/en/book.array.php.
The reference contains a brief description, and examples of use, for each function!


PHP - Sort Functions For Arrays
- The elements in an array can be sorted in alphabetical or numerical order, descending or ascending.
- We will go through the following PHP array sort functions:

sort() - sort arrays in ascending order
rsort() - sort arrays in descending order
asort() - sort associative arrays in ascending order, according to the value
ksort() - sort associative arrays in ascending order, according to the key
arsort() - sort associative arrays in descending order, according to the value
krsort() - sort associative arrays in descending order, according to the key -->


<!-------------------------------- Sort Array in Ascending Order - sort()
- The following example sorts the elements of the $cars array in ascending numerical/alphabetical order: -->

<?php
print "<h3>SORT FUNCTIONS FOR ARRAYS (sort, rsort, asort, ksort)</h3>";
$carsNumbers = array("Volvo", "BMW", "Toyota", 4, 6, 2, 22, 11);
sort($carsNumbers);

// use a for loop through indexed array & display in browser
$arrlength = count($carsNumbers);
for($x = 0; $x < $arrlength; $x++){
  echo $carsNumbers[$x];
  echo "<br>";
}
?>


<!-- Sort Array in Descending Order - rsort()
The following example sorts the elements of the $cars array in descending alphabetical order: -->

<?php
$carsNumbers2 = array("Volvo", "BMW", "Toyota", 4, 6, 2, 22, 11);
rsort($carsNumbers2);

// use a for loop through indexed array & display in browser
$arrlength = count($carsNumbers2);
for($x = 0; $x < $arrlength; $x++){
  echo $carsNumbers2[$x];
  echo "<br>";
}
?>






<!-- Sort Array (Ascending Order), According to *** Value **** - asort()
- The following example sorts an associative array in ascending order, according to the VALUE: -->

<?php
$age3 = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
asort($age3);

foreach($age3 as $x => $x_value){
  echo "Key = " . $x . ", Value = " . $x_value;
  echo "<br>";
}
?>




<!-- Sort Array (Ascending Order), According to **** KEY **** - ksort()
- The following example sorts an associative array in ascending order, according to the KEY: -->

<?php
$age4 = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
ksort($age4);

?>






<!-------------------------------- Complete PHP Array Reference
For a complete reference of all array functions,
go to the PHP Array Reference at http://php.net/manual/en/book.array.php.
The reference contains a brief description, and examples of use, for each function!
-->





<!-------------------------------- PHP Global Variables - Super globals --------------------------------
- Super globals were introduced in PHP 4.1.0, and are built-in variables that are always available in all scopes.
- Several predefined variables in PHP are "super globals", which means that they are always accessible,
  regardless of scope - and you can access them from any function, class or file without having to do anything special.

The PHP super global variables are:

$GLOBALS
$_SERVER
$_REQUEST
$_POST
$_GET
$_FILES
$_ENV
$_COOKIE
$_SESSION

This part will explain some of the super globals, and the rest will be explained later.


-------------------------------- PHP $GLOBALS --------------------------------
- $GLOBALS is a PHP super global variable which is used to access global variables from anywhere in the PHP script
  (also from within functions or methods).
- PHP stores all global variables in an array called $GLOBALS[index]. The index holds the name of the variable.

The example below will show how to use the super global variable $GLOBALS: -->

<?php
print "<h2>PHP Global Variables - Superglobals (GLOBALS, _SERVER, _REQUEST, _POST, _GET)</h2>";

$x = 75;
$y = 25;

function addition(){
  $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
}

addition();

echo "The result of adding " . $x . " + " . $y . " = " . $z;
echo "<br>";

?>


<!-- In the example above, since z is a variable present within the $GLOBALS array, it is also accessible from outside
the function!

PHP $_SERVER:
-  $_SERVER is a PHP super global variable which holds information about headers, paths, and script locations.
-  Headers HTTP instructions for the browser & tells it to render content a certain way over the Internet.
-  The example below will show how to use some of the elements in $_SERVER: -->

<?php

echo "My PHP_SELF is: " . $_SERVER['PHP_SELF'];
echo "<br>";
echo "My SERVER_NAME is: " . $_SERVER['SERVER_NAME'];
echo "<br>";
echo "My HTTP_HOST is: " . $_SERVER['HTTP_HOST'];
echo "<br>";
echo "My HTTP_REFERER is: " . $_SERVER['HTTP_REFERER'];
echo "<br>";
echo "My HTTP_USER_AGENT is: " . $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo "My SCRIPT_NAME is: " . $_SERVER['SCRIPT_NAME'];
echo "<br>";
?>


<!-- MORE elements for #_SERVER
- The following website lists the most important elements that can go inside $_SERVER:
http://php.net/manual/en/reserved.variables.server.php -->



<!-------------------------------- PROCESSING FORMS:  _POST VS. _GET --------------------------------------

- Both GET and POST create an array (e.g. array( key => value, key2 => value2, key3 => value3, ...)).
- This array holds key/value pairs, where keys are the names of the form controls and values are the input data from
  the user.
- Both GET and POST are treated as $_GET and $_POST. These are superglobals, which means that they are always
  accessible, regardless of scope - and you can access them from any function, class or file without having to
  do anything special.
- $_GET is an array of variables passed to the current script via the URL parameters.
- $_POST is an array of variables passed to the current script via the HTTP POST method.


*** When to use GET? ***
- Information sent from a form with the GET method is visible to everyone
  (all variable names and values are displayed in the URL).
- GET also has limits on the amount of information to send.
- The limitation is about 2000 characters. However, because the variables are displayed in the URL,
  it is possible to bookmark the page. This can be useful in some cases.
- GET may be used for sending non-sensitive data.
- Note: GET should NEVER be used for sending passwords or other sensitive information!

*** When to use POST? ***
- Information sent from a form with the POST method is invisible to others (all names/values are embedded within
  the body of the HTTP request) and has no limits on the amount of information to send.
- Moreover POST supports advanced functionality such as support for multi-part binary input while uploading
  files to server.
- However, because the variables are not displayed in the URL, it is not possible to bookmark the page.
- Developers prefer POST for sending form data.



<!-------------------------------- PHP $_GET (Pointing to Self)
- $_GET can collect data sent in the URL.
- Assume we have an HTML page that contains a hyperlink with parameters.
- When a user clicks on the link "Test $GET", the parameters "subject" and "web" is sent to "phpbasics_Day1.php",
  you can then access their values in "phpbasics_Day1.php" with $_GET.
- NOTICE WHAT HAPPENS TO YOUR BROWSER URL -->


<? print "<h3>Using _GET to pass fields thru HYPERLINK pointing to same PHP File</h3>"; ?>
  <a href="phpbasics_Day1key.php?subject1=PHPwithFia&web1=FullSail.edu">Test $GET</a><br>



<!--- Now, create code below and point to a file called "test_get.php": -->

<?php
echo "Study " . $_GET['subject1'] . " at " . $_GET['web1'];
echo "<br><br>";
?>


<!--- Type & Test HYPERLINK passing parameters to External PHP File -->
<? print "<h3>Using _GET to pass fields thru HYPERLINK pointing to external PHP File</h3>"; ?>
<a href="test_get.php?subject1=PHPwithFia&web1=FullSail.edu">Test $GET</a><br><br>


<!-------------------------------- PHP $_GET with Forms
- PHP $_GET can also be used to collect form data after submitting an HTML form with method="get".
- Assume we have an HTML form that contains a hyperlink with parameters: -->

<? print "<h3>Using _GET with FORM pointing to external PHP File</h3>"; ?>
<form method="get" action="test_get.php">
  School Name: <input type="text" name="fname1">
  Subject: <input type="text" name="subject1">
  Web Address: <input type="text" name="web1">
  <input type="submit">
</form>  




<!-------------------------------- Using PHP $_POST with Forms
- PHP $_POST is widely used to collect form data after submitting an HTML form with method="post".
- $_POST is also widely used to pass variables.
- The example below shows a form with an input field and a submit button.
- When a user submits the data by clicking on "Submit", the form data is sent to the file specified in the action
  attribute of the <form> tag. In this example, we point to the file itself for processing form data.
-->

<? print "<h3>Using PHP _POST with same PHP Script File</h3>"; ?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  School Name: <input type="text" name="sname2">
  Subject: <input type="text" name="subject2">
  Web Address: <input type="text" name="web2">
  <input type="submit">
</form> 




<!-- Create a PHP Processor  -->
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  // collect value of input field
  $sname2 = $_POST['sname2'];
  $subject2 = $_POST['subject2'];
  $web2 = $_POST['web2'];
  if (empty($sname2) || empty($subject2) || empty($web2)){
    echo "Some fields are missing!!";
    echo "<br>";
  } else {
    echo "Study " . $_POST['subject2'] . " at " .$_POST['sname2'];
    echo "<br>";
  }
}
?>


<!--
- Now use another PHP file to process form data with an EXTERNAL script; replace the filename with test_post.php.
- Then, place the PHP code ABOVE inside & we can use the super global variable $_POST to collect the value of the
  input field:
-->

<? print "<h3>Using PHP _POST with External PHP Script File</h3>"; ?>
<form method = "post" action = "test_post.php">
  School Name: <input type="text" name="sname2">
  Subject: <input type="text" name="subject2">
  Web Address: <input type="text" name="web2">
  <input type="submit">
</form> 


</body>
</html>