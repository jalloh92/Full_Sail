<!--
* Course:  SSL-1506 DAY #2 (MORE PHP Basics: SuperGlobals, GET/POST, Cookies, Sessions, Uploads, Passwords)
* Name:    Updated by Fia
* Date:    Summer2015
-->


<!-- STARTING HTML -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>SSL Basics - by Fia</title>
    <meta name="description" content="">
    <meta name="author" content="">

</head>


<!-- CSS File -->

<link rel="stylesheet" type="text/css" href="css/basics.css">


<body>

<!-- REPLACE MY NAME IN THE TITLE BELOW WITH YOUR NAME -->
<h1><b>PHP Programming Basics && More!<br>(DAY #2) - by Kelly</b></h1>

<!-- REPLACE MY PHOTO BELOW WITH YOUR PHOTO -->
<center><img src="images/kelly_photo.jpg" width=150 height=150></center><br><br>


<h2>*** More PHP SYNTAX RULES & CONCEPTS ***</h2>

<?php
// Updating php.ini on the fly... Useful when using a server where multiple developers are sharing a copy of PHP

ini_set('display_errors', 'On'); // turning on display_errors on the fly.

error_reporting(E_ALL | E_STRICT); // updating error_reporting on the fly.

?>


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
- PHP stores all global variables in an array called $GLOBALS[index]. The index holds the *name* of the variable.

The example below will show how to use the super global variable $GLOBALS: -->


<?php
print "<h2>PHP Global Variables - Superglobals (GLOBALS, _SERVER, _REQUEST, _POST, _GET)</h2>";

$x = 75;
$y = 25;

function addition() {
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

echo "My PHP_SELF is: " . $_SERVER['PHP_SELF'];  //Returns the filename of the currently executing script
echo "<br>";
echo "My SERVER_NAME is: " . $_SERVER['SERVER_NAME']; //Returns the name of the host server
echo "<br>";
echo "My HTTP_HOST is: " . $_SERVER['HTTP_HOST']; //Returns the Host header from the current request
echo "<br>";
echo "My HTTP_REFERER is: " . $_SERVER['HTTP_REFERER']; //Returns the complete URL of the current page
echo "<br>";
echo "My HTTP_USER_AGENT is: " . $_SERVER['HTTP_USER_AGENT']; // Returns Your Machine Details
echo "<br>";
echo "My SCRIPT_NAME is: " . $_SERVER['SCRIPT_NAME']; //Returns the path of the current script
?>

<!-- MORE elements for #_SERVER
- The following website lists the most important elements that can go inside $_SERVER:
http://php.net/manual/en/reserved.variables.server.php -->


<!--------------------- ANALYZING DEFINED PHP VARIABLES - SUPER GLOBALS & LOCAL VARIABLES:
- To see the value of all Super Globals, use print_r AS FOLLOWS: -->

<pre>
<!-- NOTE on the <pre> HTML tag
- Add the the <pre> tag to define pre-formatted PHP text.
- Text in a <pre> element is displayed in a fixed-width font (usually Courier),
  and it preserves both spaces and line breaks to give it a cleaner look. -->

    <?php

    // Use print_r to get all currently defined variables (BOTH LOCAL & GLOBAL);
    // echo "<hr>My print_r analysis report: <br><br><hr>";
    // print_r(get_defined_vars());

    // LATER:  Use var_dump(debug_backtrace() to report the number of 'function calls' up to this point.
    // echo "<hr>My var_dump of debug_backtrace <br><br><hr>";
    // var_dump(debug_backtrace());

    ?>

</pre> <!-- end HTML formatting -->





<!-------------------------------- PROCESSING FORMS:  _POST VS. _GET --------------------------------------

- Both GET and POST create an array (e.g. array( key => value, key2 => value2, key3 => value3, ...)).
- This array holds key/value pairs, where keys are the names of the form controls and values are the input data from
  the user.
- Both GET and POST are treated as $_GET and $_POST. These are super globals, which means that they are always
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
- Developers prefer POST for sending form data. -->



<!-------------------------------- PHP $_GET (Pointing to Self)
- $_GET can collect data sent in the URL.
- Create an HTML page that contains a hyperlink with the following parameters.
- Change the "href" file name below to phpbasics_Day2start.php
-->


<? print "<h2>Using _GET to pass fields thru HYPERLINK pointing to same PHP File</h2>"; ?>

<a href="phpbasics_Day2start.php?subject1=PHPwithFia&sname1=FullSail.edu">Test $GET</a><br><br>


<!-------------------------------- PHP $_GET (Pointing to Same)
- Now type the following code below...
- Then, save your work, go to your browser & test the link above
- When a user clicks on the link ABOVE "Test $GET", the parameters "subject" and "web" is sent to "phpbasics_Day2start.php",
- We can then use the code below to access the values in "phpbasics_Day2start.php" with $_GET using the following code...
- NOTICE WHAT HAPPENS TO YOUR BROWSER URL -->

        <?php
        echo "Study " . $_GET['subject1'] . " at " . $_GET['sname1'];
        echo "<br><br>";
        ?>


<!-------------------------------- PHP $_GET (Pointing to Same vs External Script File)
- Now practice using $_GET with an external processing script file called "test_get.php"
- FIRST, copy/paste the link above & change the HTML HYPERLINK so that it point to "External" PHP File test_get.php
- NEXT Copy/paste the HTMl Formatting from this script to your NEW file
  (Copy/Paste everything from the opening HTML tag to your PHOTO img src tag)
- Remember to add closing HTML/Body tags at the bottom.
-->

<? print "<h3>Using _GET to pass fields thru HYPERLINK pointing to external PHP File</h3>"; ?>

<a href="test_get.php?subject1=PHPwithFia&sname1=FullSail.edu">Test $GET</a><br><br><br>


<!--
- Next, setup PHP $_GET with a Form & External Form Processor
- PHP $_GET can also be used to collect form data after submitting an HTML form with method="get".
- Create an HTML form that contains the following parameters:
- Make sure it points to your external processor script called test_gest.php -->

<? print "<h3>Using _GET with FORM pointing to external PHP File</h3>"; ?>

<!-- The form action is different this time! -->

<form method="get" action="test_get.php">
    School Name: <input type="text" name="sname1">
    Subject: <input type="text" name="subject1">
    Web Address: <input type="text" name="web1">
    <input type="submit">
</form>


<pre>
<!-- NOTE on the <pre> HTML tag
- Add the the <pre> tag to define pre-formatted PHP text.
- Text in a <pre> element is displayed in a fixed-width font (usually Courier),
  and it preserves both spaces and line breaks to give it a cleaner look. -->

    <?php

    // Use print_r to get all currently defined variables (BOTH LOCAL & GLOBAL);
    // echo "<hr>My print_r analysis report: <br><br><hr>";
    // print_r(get_defined_vars());

    // LATER:  Use var_dump(debug_backtrace() to report the number of 'function calls' up to this point.
    // echo "<hr>My var_dump of debug_backtrace <br><br><hr>";
    // var_dump(debug_backtrace());

    ?>

</pre> <!-- end HTML formatting -->




<!-------------------------------- Using PHP $_POST with Forms
- PHP $_POST is widely used to collect form data after submitting an HTML form with method="post".
- $_POST is also widely used to pass variables.
- The example below shows a form with an input field and a submit button.
- When a user submits the data by clicking on "Submit", the form data is sent to the file specified in the action
  attribute of the <form> tag. In this example, we point to the file itself for processing form data.
- Create the form below:
-->

<? print "<h3>Using PHP _POST with same PHP Script File</h3>"; ?>

<!-- Notice we're using the $_SERVER super global to tell the form which URL to use for processing the form
     We're still pointing to this SAME php script for processing--- NOT an external file-->

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    School Name: <input type="text" name="sname2">
    Subject: <input type="text" name="subject2">
    Web Address: <input type="text" name="web2">
    <input type="submit">
</form>


<!-- PHP Processor using the "REQUEST_METHOD" element of the $_SERVER superglobal to find out which method was used -->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { // useful test when using multiple form on same page/application
    // collect value of input field
    $sname2 = $_POST['sname2'];
    $subject2 = $_POST['subject2'];
    $web2 = $_POST['web2'];

    if (empty($sname2) || empty($subject2) || empty($web2)) {
        echo "Some fields are missing!";
        echo "<br>";
    } else {
        echo "Study " . $_POST['subject2'] . " at " . $_POST['sname2'];
        echo "<br>";
    }
}
?>



<!--
- Now use another PHP file to process form data with an EXTERNAL script;
- RE-use your test_get.php file to SAVE AS and create a filename called "test_post.php".
- Then, place the PHP code (PHP Processor) ABOVE inside.
- Notice that we can use the super global variable $_POST to collect the value of the input field:
-->

<? print "<h3>Using PHP _POST with External PHP Script File</h3>"; ?>

<!-- The form action is different this time! -->

<form method="post" action="test_post.php">
    School Name: <input type="text" name="sname2">
    Subject: <input type="text" name="subject2">
    Web Address: <input type="text" name="web2">
    <input type="submit">
</form>


<!-- CODE ANALYSIS/DEBUG:
- Again, how do we analyze what's going on with our data and function calls?  Use print_r and var_dump to analyze data
- Add this code to the bottom of your test_get.php file -->


<pre>
<!-- NOTE on the <pre> HTML tag
- Add the the <pre> tag to define pre-formatted PHP text.
- Text in a <pre> element is displayed in a fixed-width font (usually Courier),
  and it preserves both spaces and line breaks to give it a cleaner look. -->

    <?php

    // Use print_r to get all currently defined variables (BOTH LOCAL & GLOBAL);
    // echo "<hr>My print_r analysis report: <br><br><hr>";
    // print_r(get_defined_vars());

    // LATER:  Use var_dump(debug_backtrace() to report the number of 'function calls' up to this point.
    // echo "<hr>My var_dump of debug_backtrace <br><br><hr>";
    // var_dump(debug_backtrace());

    ?>

</pre> <!-- end HTML formatting -->


<h2>*** COOKIES, SESSION, UPLOADS, PASSWORDS ***</h2>

<H3>WHAT IS STATE PERSISTENCE?</H3>

<!-- THE CHALLENGE OF STATE PERSISTENCE:

- Traditional HTML requests by nature result in short-term, stateless interactions.  Here's the process:

1. Browser opens connection to server (IP address, port 80) and requests page from web server (HTTP GET Request)
2. Server retrieves or generates HTML response and sends back to browser through IP connection made by initial
   request (HTTP Response)
3. Server and Browser close IP connection when data transfer is complete.
4. For EACH HTTP request sent to/received by server these steps take place.
   This includes EACH .js .css .jpeg .png etc. file that is included on a single web page.

NOTE:  But on the Internet there is one problem: the web server does not know who you are or what you do.
       This is because the HTTP address doesn't maintain state.  Because each transaction is a standalone request,
       there is no way for the server to know which client made each request. So, to start tracking users, we use
       cookies & sessions.
-->


<H3>USING "COOKIES" TO TRACK WEBSITE USERS (Client-Side)</H3>

<!---------------------------------------- ONE SOLUTION:  COOKIES
- What is a Cookie?  A cookie is often used to identify a user.
- A cookie is a small file that the server embeds on the user's computer (CLIENT-SIDE ONLY).
- Each time the same CLIENT'S computer requests a page with a browser, it will send the cookie too.
- With PHP, you can both create and retrieve cookie values.

Creating Cookies With PHP
- A cookie is created with the setcookie() function.

Syntax:
- setcookie(name, value, expire, path, domain, secure, httponly);
- Only the "name" parameter is required. All other parameters are optional.

How do we Create/Retrieve a Cookie with PHP:
- The following example creates a cookie named "user" with the value "John Doe".
- The cookie will expire after 30 days (86400 * 30).
- The "/" means that the cookie is available to entire website (otherwise, select the directory you prefer).
- We then retrieve the value of the cookie "user" (--using the global variable $_COOKIE).
- We also use the isset() function to find out if the cookie is set.... SEE BELOW.

DIRECTIONS:

PART #1
- RE-USE your test_post.php file from the previous exercise and SAVE AS "setcookie.php"
- Then type the code below, making sure the setcookie() function is ABOVE the <html> tag.
- Test your new PHP File... Did you get any errors?
-->


<!-- NOTE:  See set_cookie.php -->

<!--- IMPORTANT NOTES!
- The setcookie() function must appear BEFORE the <html> tag; Plus, must be at the very top of your code.
- PHP Cookies are part of the HTTP header. Therefore, in a PHP script, if it is not set before any other
  output is sent to the browser, you will get warning like "...headers already sent....".

PART #2:
- How would you add another cookie to setcookie.php?  Go to setcookie.php and Try it.
- Test it.  Did you get any errors?  Why? -->




<!----------------------------------------- MODIFYING & DELETING COOKIES

How do we MODIFY a PHP Session Variable?
- To change a session variable, just overwrite it or re-set it by changing the value;

How do we DELETE a Cookie?
- To delete a cookie, use the setcookie() function with an "expiration date" in the PAST as follows...
- Re-use setcookie.php by doing a "SAVE AS" to create "deletecookie.php"
- Make the following code adjustments -->

<!-- NOTE:  See delete_cookie.php -->


<!-- How do we Check to see if Cookies are Enabled?
- The following example creates a small script that checks whether cookies are enabled.
- First, try to create a test cookie with the setcookie() function, then count the $_COOKIE array variable:
- ADD the following code to the bottom of your "deletecookie.php" -->




<!-- - For a complete reference of HTTP functions, visit PHP.NET -->



<h2>*** COOKIES, SESSION, UPLOADS, PASSWORDS ***</h2>


<H3>USING "SESSIONS" TO TRACK USERS (Server-Side)</H3>

<!---------------------------------------- SESSIONS ------------------------------------------
- Both cookies and sessions are used for storing persistent data. But there are differences for sure.
- Sessions are stored on the server side.  Cookies are stored on the client side.
- Sessions are closed whenever the user closes his browser. For cookies, you can set time for when it will expire.
- Sessions are SAFER that cookies. Why? Since cookies are stored on the client's computer,
  there are ways to modify or manipulate cookies.
- A session is a way to store information (in variables) to be used across multiple pages.
- Unlike a cookie, SESSION information is **not** stored on the users computer.

What is a PHP Session?
- When you work with an application, you open it, make some changes, and then you close it.
- This is just like a Session.
- The COMPUTER knows who you are. It knows when you start the application and when you end.
- But remember, on the INTERNET there is one problem: the WEB SERVER **does not*** know who you are or what you do.
- This is because the HTTP address doesn't maintain state.
- Session variables solve this problem by storing user information to be used across multiple website pages
  (e.g. username, favorite color, etc).
- By default, session variables last until the user closes the browser.
- So, session variables hold information about one single user, and are available to all pages in one application.
- Tip:  When we need a permanent storage, we will want to store the data in a database.

---------------------------------------- How do we Start a PHP Session?
- A session is started with the session_start() function.
- Session variables are set with the PHP global variable: $_SESSION.
- RE-use your "deletecookie.php" & SAVE AS "setsession.php" - Then replace the old code with the new code below...
- In this code, we start a new PHP session and set some session variables:
- Note: The session_start() function must be the very first thing in your document. Before any HTML tags.
- Otherwise, you will get warning like "...headers already sent....".
-->

<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<body>

<?php
// Set session variables
$_SESSION[] = "green";
$_SESSION[] = "tiger";
echo "";
?>

</body>
</html>


<!------------------------ PART 1:  SETTING SESSIONS WITH $_GET AND HYPERLINKS

- Build a query string like below and ADD it to your setsession.php
  http://localhost:8888/getsession.php?namestr=michael&statestr=ny

- Then use $_GET['name'] etc. to set your $_SESSION variable. -->

<!-- Build a query string and pass values for future session variables -->

<a href="http://localhost:8888/DAY2/Lecture2/get_session.php?namestring=john&statestring=ny">GET Sessions</a><br>


<!--
- Now RE-USE your setsession.php to SAVE AS and create "GETsession.php"
- Next, replace the code at the bottom with the following lines of code in your GETsession.php -->

<?php
// Grab the URL query string values from the HYPERLINK we added to setsession.php to set 2 new session variables
# $_SESSION["name"] =
# $_SESSION["state"] =
?>


<!------------------------ PART 2:  GETTING & DISPLAYING THE SESSION VARIABLES

How do we display the Variables Values of a PHP Session?  USE ECHO!
- Next, ADD the following lines of code to your getsession.php
- From this page (getsession.php), we will access the session information we set on the first page ("setsession.php").
- Notice that session variables are not passed individually to each new page, instead they are retrieved
  from the session we open at the beginning of each page (session_start()).
- Also notice that all session variable values are stored in the global $_SESSION variable: -->


<?
// Get Sessions - Echo out the value of each $_SESSION variable
echo "One of my favorite colors is "  . ".<br>";
echo "My Favorite animal is a "  . ".<br>";
echo "My name is " . ".<br>";
echo "I Live in  " . ".<br>";
?>

<!-- Another way to show all of the session variable values for a user session is to run the following code:
     Next, ADD the following lines of code to the bottom of your getsession.php  -->

<pre>
<?php

// Part 3:  Another way to show the value of each $_SESSION Variable


?>
</pre>




<!--------------------------------- PHP SESSIONS & USER-KEYS

How does it work? How does it know it's me?
- Most sessions set a user-key on the user's computer that looks something like this:
  765487cf34ert8dede5a562e4f3a7e12.
- Then, when a session is opened on another page, it scans the computer for the user-key.
- If there is a match, it accesses that session, if not, it starts a new session.

How do we Modify a PHP Session Variable?
- To change a session variable, just overwrite it:
- RE-USE your getsession.php;  SAVE AS "reset_session.php";
- Next, ADD the following lines of code to your reset_session.php -->


<?php
// to change a session variable, just overwrite it


?>


<!------------------------------------ How do we DESTROY a PHP Session?
- To remove all global session variables and destroy the session, use session_unset() and session_destroy():
- RE-use your "getsession.php" & SAVE AS "deletesession.php" - Then replace the old code with the new code below...
- In this code, we start a new PHP session and set some session variables: -->

<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>


<!--
- Remember that there is no persistence between HTML request / response pairs from the client/web server.
- Sessions allow some persistence to emulate a connection-oriented environment.
- PHP sets default session length in php.ini file (usually 30 minutes, but can vary).
- To manipulate the session length, we can add the following code:
- NOTE:  Feel free to try this later on your own -->

<?
# ini_set(); //set session timeout to 60sec
session_start();
?>


<!--
1. LATER:   Try adding the line above to ALL 3 scripts:
ini_set(’session.gc_maxlifetime’, 60); //set session timeout to 60sec
-->




<H3>FILE UPLOADS</H3>

<!---------------------------------------- FILE UPLOADS ------------------------------
- With PHP, it is easy to upload files to the server...
- However, with ease comes danger, so always be careful when allowing file uploads to your own server!

1.  Configure The "php.ini" File
- First, ensure that PHP is configured to allow file uploads.
- Click on your MAMP icon;
- Click on "Open Web Start Page";
- Once the page opens, click on "php info";  You will see the contents of your php.ini file.
- Now do CTRL-F to search for "file_upload"
- Make sure it set it to "On" | file_uploads = On
- If not, go to /Applications/MAMP/bin/php/php5.6.2/conf/php.ini and make the change;

2. Create The HTML Form for Uploads.
-  RE-USE your deletesession.php and SAVE-AS "upload_form.php";
-  Next, add an HTML form to upload_form.php that allow users to choose the image file they want to upload: -->

<form enctype="multipart/form-data" action="test_uploads.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>


<!-- Some rules to follow for the HTML form above:
- Make sure that the form uses method="post"
- The form also MUST HAVE the following attribute: enctype="multipart/form-data".
- This attribute specifies which content-type to use when submitting the form
- Without the requirements above, the file upload ** WILL NOT ** work.

Other things to notice:
- The type="file" attribute of the <input> tag shows the input field as a file-select control,
  with a "Browse" button next to the input control
- The form above sends data to a file called "test_uploads.php", which we will create in a bit. -->



<!---------------------------------------- PHP script explained

NOW, let's get started with the rest of our setup...
- FIRST, create a folder called "uploads" inside "Day2/Lecture2/Activity/"
- SECOND, RE-USE your upload_form.php file ("SAVE AS" to create The Upload File PHP Script)
  Call it "test_uploads.php", adding the following code:
- The completed Upload File PHP Script "test_uploads.php" file now looks like this: -->



<!-- CREATE the target directory:
- You will need to create a new directory called "uploads" in the directory where "upload.php" file resides.
- The uploaded files will be saved there.

Set Your Variables:
- $target_dir = "uploads/" - specifies the directory where the file is going to be placed
- $target_file specifies the "path of the file" to be uploaded
- $uploadOk is checking to see if the file is a real image, already exists in the "uploads" folder, or is too big.
- $imageFileType holds the file extension of the file
- Next, check if the image file is an actual image or a fake image
-->


<?php


# $target_dir =
# $target_file =
# $uploadOk =
# $imageFileType =


// Setup Conditional to Check if image file is a actual image or fake image
# if(isset($_POST[])) {
#    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
#    if($check !== false) {
#         echo "";
#         $uploadOk = 1;
#     } else {
#         echo "";
#         $uploadOk = 0;
#     }
# }

/* Now we can add some restrictions:
- First, we will check if the file already exists in the "uploads" folder.
- If it does, an error message is displayed, and $uploadOk is set to 0: */

# if (file_exists()) {
#     echo "";
#     echo "";
#     $uploadOk = 0;
# }


/* Check the File Size (To Limit File Size)
- The file input field in our HTML form above is named "fileToUpload".
- Now, we want to check the size of the file.
- If the file is larger than 500kb, an error message is displayed, and $uploadOk is set to 0: */


# if ($_FILES[""][""] > 500000) {
#     echo "";
#     $uploadOk = 0;
# }


/* Allow only certain file formats...
- The code below only allows users to upload JPG, JPEG, PNG, and GIF files.
- All other file types gives an error message before setting $uploadOk to 0: */

# if($imageFileType != "" && $imageFileType != "" && $imageFileType != ""
#     && $imageFileType != "" ) {
#     echo "";
#     $uploadOk = 0;
# }


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES[""][""], $target_file)) {
        echo "";
        echo "";
        echo $target_file;
    } else {
        echo "";
    }
}
?>


<pre> <!-- add HTML formatting to your analysis -->
    <?

    // Use print_r to get all currently defined variables include $_GET and $_POST;
    echo "";
    #     print_r();

    // LATER:  Use var_dump(debug_backtrace() to report the number of 'function calls' up to this point.
    echo "";
    #     var_dump();

    ?>
</pre> <!-- end of Uploads Section -->



<!--Complete PHP Filesystem Reference:
For a complete reference of filesystem functions, go to PHP.net. -->




<H3>PASSWORD ENCRYPTION - HASHING & SALTING</H3>

<!---------------------------------------- PASSWORD SECURITY & ENCRYPTION  -------------------------
-  In PHP 5.1.2, we got a new function called hash, which allows us to tell hash what algorithm you want to use with to
   encrypt passwords.
- This way we don't have to have a function for every single one under the sun.
- Hashing is the term for the process of taking a string of data and apply a mathematical function to it to
  produce a unique string of output.
- A hash is a one-way cryptographic algorithm to mathematically compute an input to a fixed-length result.
- This means you can not use the result from the hash to recreate the data.
- Hashes are quickly computed with minimal processing resources (making them fast), and are often used as a
  checksum to compare two larger values.
- Hashing is often used for encryption or password hashing.
- We will apply a hash algorithm to a password, to generate an encrypted string.
- Knowing an encrypting hash won't give away the password and the original password can't be reverse engineered
  even with lots of computing power.
- The hash that it generates for each password will be unique, so that it can only be recreated by using the
  same password with the same hashing algorithm.
- The only way to have a password match will be to know the original password and that's what we want.
- The MOST important rule about passwords is never ever, ever store passwords in the database as plain text
- Always encrypt them. If they're in plain text, then anyone who gains access to your database will have every
  user's password. And its not just hackers on the outside that you have to be concerned about.


**** WE WILL FOCUS ON 2 HASHING ALGORITHMS IN THIS CLASS.  Quick Comparisons... ****
-- SHA1 returns a larger result than MD5, so its more secure, but much slower processing, which is GOOD because it
pauses to compare and slows down any hackers trying multiple passwords at one time.

-- MD5 is relatively secure, but older and there are some security flaws.
Overall, its faster & better for applications that don't need extreme security.

MD5 - 32 character hexadecimal number (0-9, A-F)
- MD5 stands for "Message-Digest algorithm 5" and is one of the algorithms we will use to encrypt passwords
http://us1.php.net/manual/en/function.md5.php
http://www.faqs.org/rfcs/rfc1321.html

SHA1 - 40 character hexadecimal number (0-9, A-F)
- SHA1 stands for Secure Hash Algorithm 1
http://us1.php.net/manual/en/function.sha1.php

-Blowfish (using Crypt) is another highly secure algorithm, but you will need to research this one on your own.


Therefore, a string of “apple” could be hashed using MD5 to generate a checksum of
“1f3870be274f6c49b3e31a0c6728957f”

Notice the result is a value with hexadecimal numbers (0-9, A-F)

**** SYNTAX for both md5 and sha1 is similar, as follows -->

<?
$str = 'apple';
# if (md5() === '1f3870be274f6c49b3e31a0c6728957f') {
#     echo "";
# }

# if (sha1() === 'd0be2dc421be4fcd0172e5afceea3970e2f3d940') {
#     echo "";
# }
?>

<!----------------------------------------  HACKING HASHED PASSWORDS

While hashing is a one-way encryption (---meaning it cannot be reversed or “unencrypted” just by
reversing the algorithm), it is possible to guess combinations until you find a match with the following method...

The easiest way to guess a hashed password is to take the following steps:
1.  Use a pre-built dictionary,
2.  Hash the words and store them in a database,
3.  Search by hashed value for a match.  (These are often called Rainbow Tables.)

For example, try going to https://crackstation.net/.  How long does it take to find these hashed values? 

md5 - '1f3870be274f6c49b3e31a0c6728957f'
sha1 - 'd0be2dc421be4fcd0172e5afceea3970e2f3d940'

- Because hash values can be guessed by hackers (---imagine looping through all possible combinations until you
  find one that works), they are generally considered insecure (when used alone) for storing passwords.


---------------------------------------- SALTING for ADDED SECURITY
- Salting adds an additional value to the hashed password that is harder for a attempted hack, which
  ultimately makes hashes more secure.
- Basically, we concatenate the SALT to a string we need to HASH. -->

<?
$str = '';
$salt = '';

//without salting
# if (md5() === '1f3870be274f6c49b3e31a0c6728957f') { echo "valid user";}

//with salting
# if (md5()==='asda3870be2345kf431a0c6728957f') {echo "valid user";}
?>

<!--------------------------------------- Password Hashing API for PHP 5.5 +
* With PHP v5.5, we got an even stronger hash method with password_hash()
* password_hash() creates a new password hash using a stronger one-way hashing algorithm.
* For this class, we just want to hash our password using the current DEFAULT algorithm.
* This is presently BCRYPT, which will produce a 60 character result.
*
* Beware that DEFAULT may change over time, so you would want to prepare ahead of time
* by allowing your database storage to expand past 60 characters (---255 would be good).

SYNTAX:
echo password_hash("rasmuslerdorf", PASSWORD_DEFAULT) . "\n";

The above example will output something similar to:
$2y$10$.vGA1O9wmRjrwAVXD98HNOgsNpDczlqm3Jq7KnEd1rVAGv3Fykk1a


************ LAB 1 & 2 PREP *********
-  We won't use MySQL DB to store passwords until Lab #3;
-  However, for Lab 2 just be sure to show that you need to at least display the hashed/salted password.

Let's step thru a simple EXAMPLE of how to use hashed/salted passwords:

STEP #1:  Go back to your upload_form.php and add an input fieldS for user name & password as follow: -->

Username: <input type="text" /></br>
Password: <input type="password" /></br>


<!-- NEXT, add this code below the HTML formatting, but at the top of your 2nd PHP Script tag in TEST_UPLOADS.php -->

<?

// Read in all form fields into an "associate" array & return the array for processing output
function makeArray(){
    # $salt =
    # $epass =
    # $euser =
    return array();
}

?>


<!-- Add this code to the BOTTOM of your 2nd PHP Script tag in TEST_UPLOADS.php -->

<?

// Output Array Details to User

# if(isset($_POST[''])) {
    echo "";
    echo "";

    // CONVERT array into a variable

#     $data =

    // FOREACH to displaying Array Contents created in makeArray Function

    echo "";

    // Use foreach loop to echo everything
#     foreach ($data as $attribute => $data) {
        echo "";
#     }

    echo "";

# }
?>



<!-- ALTERNATIVE APPROACH USING SESSIONS in Lab #2:
- Add your session_start() at the TOP of your TEST_UPLOADS.php script -->

<?php
session_start();
?>

<!-- ALTERNATIVE APPROACH USING SESSION WITH MD5 in Lab #2:
- Add this to the top of your 2nd PHP Script in TEST_UPLOADS.php  -->

<?
# $_SESSION['username'] =

# $_SESSION['pass'] =
?>

<!-- ALTERNATIVE APPROACH DISPLAYING SESSION VARIABLES in Lab #2:
- Add this code to the bottom of your last PHP Script in TEST_UPLOADS.php -->

<?
// Display Username & Hashed/Salted Password to User
echo "";
echo "";
?>

</body>
</html>
