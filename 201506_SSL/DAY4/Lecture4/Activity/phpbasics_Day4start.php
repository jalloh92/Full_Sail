<!--
* Course:  SSL-1506 DAY #4
           (MORE PHP Basics: Database Sign-up/Login & CRUD "Create-Read-Update-Delete")
* Name:    Updated by Fia
* Date:    Summer 2015
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
<h1><b>PHP Programming Basics<br>(DAY #4) - by Kelly</b></h1>

<!-- REPLACE MY PHOTO BELOW WITH YOUR PHOTO -->
<center><img src="images/kelly_photo.jpg" width=150 height=150></center><br><br>


<h2>*** MySQL DATABASE LOGIN & CRUD Functionality ***</h2>

<h2>*** More PHP CONCEPTS ***</h2>



<!--****************************** LAB 4 PREP *************************** -->

<H3>DAY 3:  CREATING DATABASE APPS with PDO</H3>

<!--
PHP 5 and later can work with a MySQL database using either:

   1.  MySQLi extension (the "i" stands for improved)
   2.  PDO (PHP Data Objects)

Comparing MySQLi or PDO?
- Both MySQLi and PDO have their advantages
- PDO will work on 12 different database systems, where as MySQLi will only work with MySQL databases.
- So, if you have to switch your project to use another database, PDO makes the process easy. You only have to
  change the connection string and a few queries. With MySQLi, you will need to rewrite the entire code -
  queries included.
- Both are object-oriented, but MySQLi also offers a procedural API.
- Both support Prepared Statements. Prepared Statements protect from SQL injection, and are very important
  for web application security.

PDO is what we will use in SSL.  So what is PDO?
- The PHP Data Objects (PDO) extension defines a lightweight, consistent interface for accessing databases in PHP.
- PDO provides a data-access abstraction layer, which means that, regardless of which database you're using, you use
   the same functions to issue queries and fetch data. PDO does not provide a database abstraction; it doesn't rewrite
   SQL or emulate missing features.
- A data-access abstraction layer makes it easier to connect to multiple types of databases regardless of their
  specific requirements - PDO is a “wedge” to provide unified access. -->



<!-- PDO & DSN
- How do we communicate with the database?  Through PDO & DSN (Data Source Name)
- connection string that tells PDO the type of database to access, where to access it, and other parameters.

Here are the MAIN steps for setting up PDO & DSN:

-----  STEP #1.  CONNECT:  Establish your database connection using the steps above;

<?
$user="root";
$pass="root";
$dbh = new PDO ('mysql:host=localhost;dbname=test;port=8889', $user, $pass);
?>

- Once $dbh is instantiated, we can the pass data to/from the database.
- When you’re finished with the database connection, release the object to free resources on the server side.
- Besides making unified references to a database through PDO, it also uses parameters for increased security
  against things such as SQL injection.
- It also allows for making multiple SQL calls but with different values (for instance, inserting
  multiple rows at a time).
- Once we're done establishing & using the connect, we can close it using: $dbh = null;

-----  STEP #2:  PREPARE & BIND:
                 Write your regular SQL statement, then replace the values with parameters.
                 This can be done either as ordered positioned placeholders (using a “?” as a placeholder),
                 or as named placeholders (using “:placeholdername”). It is recommended to use named placeholders.
                 The prepare() method prepares a SQL statement for use by the PDO object.

                - Use placeholders in the SQL statement itself, in the example :calories
                - Bind EACH placeholder parameter to a variable, in the example $calories -->

                <?
                        $calories = 150;
                        $color = 'red';

                        $sth = $dbh->prepare('SELECT name, color, calories
                                              FROM fruit
                                              WHERE calories < :calories AND color = :color');

                        $sth->bindParam(':calories', $calories, PDO::PARAM_INT);


// STEP #3:  EXECUTE - Execute runs the SQL statement.
                       // Parameters can passed as a single array at time of execution.
                       // Execute a prepared statement by passing an array of insert values -->

                        $sth->execute(array(':calories' =>$calories, ':color' => $color));


//  STEP #4:  FETCH - fetchAll retrieves the records as an key/value array and stores in $result -->

                        $result = $sth->fetchAll();
                        print_r($result)


?>



<!------------------------- DAY 3:  DATABASE & PDO SETUP

Going back to our upload_form.php and test_uploads.php, we created 3 php files for testing our code.

1. First, let's make sure we can add users to the "users" database

   Update your table "users" with the following fields:
   userid
   username
   password
   profilePhoto

2. Update your test_uploads.php code with the following code. --->


<!--- DAY 3:  NOW, update your test_uploads.php with the the following database PDO connection
      This goes inside the conditional     if ($uploadOk == 0) {
      Under the "ELSE" -->

<?
// Connect to database
$user = 'root';
$pass = 'root';
$dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

$salt = "SuperFIASaltHash";
$epass = md5($_POST['password'] . $salt);

?>

<!--  DAY 3:  In the same block of code, but Right before the LAST "else", we copy/pasted the following...
     This should be the last thing under the conditional that looks like this....
     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {   -->
<?
$stmt = $dbh->prepare("insert into users (username, password, profilePhoto)
values(:username, :password, :profilePhoto)");
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $epass);
$stmt->bindParam(':profilePhoto', $profilePhoto);
$stmt->execute();
?>



<!--  3. Added a 2nd form to upload_form.php with username & password; Point the action of the 2nd form to login.php

<!----NOW, add 2nd form inside upload_form.php ----------->

<form action="login.php" method="post">
    <fieldset>
        <legend>Ready to Login?</legend>

        <p>
            <label for="username_li">Username:</label><input id="username_li" type="text" name="username_li">
        </p>
        <p><label for="password_li">Password:</label><input id="password_li" type="password" name="password_li">			</p>
        <p class="rel">
            <button type="submit" class="right">Submit</button>
        </p>
    </fieldset>
</form>


<!-- 4. Create new file called login.php with processing code for username & password -->

<!----------- DAY 3 - Login.php ; Authentication Login Username & Password
              Let's see if we can process the 2nd form ----------->

<?

// Setup DB Username & Password
$user = 'root';
$pass = 'root';
$salt = "SuperFIASaltHash";

// Establish PDO & DSN Connection to Database
$dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);


// Test if 2nd form has the empty fields; If not, grab the username & password & bind to DB parameters
if ($_POST['username_li'] != null && $_POST['password_li'] != null) {
    $usernameInput = $_POST['username_li'];
    $passwordInput = md5($_POST['password_li'] . $salt);

    $sth = $dbh->prepare('select profilePhoto, username, password, userid from users
                    where username = :username and password = :password');
    $sth->bindParam(':username', $usernameInput);
    $sth->bindParam(':password', $passwordInput);
    $sth->execute();
    $result = $sth->fetchAll();

    // If the result of the 1st array item contains a 'userid', let the user know they have successfully logged in.
    if (isset($result[0]['userid'])) {

        $_SESSION['userid'] = $result;
        echo "Congratulations!!! You have successfully logged in.  Enjoy :-)";
        echo "<a href='http://localhost:8888/SSL-1506_MyClassActivities/Day3/Lecture3/Activity/upload_form.php'>Go Back?</a><br><br>";

        // Use userid to look up username & profile photo
        foreach ($_SESSION['userid'] as $row) {

            // Prepare/Bind/Execute and grab results to echo $row['userid']. "<br>";
            $sth = $dbh->prepare('select username, profilePhoto from users where userid = :userid');
            $sth->bindParam(':userid', $row['userid']);
            $sth->execute();
            $result = $sth->fetchAll();

            // Optional Analysis:
            // print_r($result[0]['username']);

            // Store each row found in the $results
            echo "<p>";
            $userid = $row['userid'];
            foreach ($result as $row) {
                $photo = $row['profilePhoto'];
                $username = $row['username'];
            };

            // echo out the profile photo and give user an option to logout.
            echo "<a href=\"profile.php\"><img src=\"uploads/".$photo."\" class=\"right userPhoto\"/></a><br>";
            echo "</p>";
            echo "<ul class=\"right userSection\">
                    <li>Your Username is:  ".$username."</li>
                    <li><a href=\"logout.php\">logout</a></li>
                    </ul>";
        };

    } else {
        // else let user know that their login failed!
        echo "So Sorry - NO Login Success.  Please try again...";
        echo "<a href='http://localhost:8888/SSL-1506_MyClassActivities/Day3/Lecture3/Activity/upload_form.php'>Go Back?</a><br><br>";

    }

}

?>


<!----------- Step 5. Logout.php (DAY 3) ----------->

<?php

ini_set('session.gc_maxlifetime', 86400);

session_start();

session_destroy();

header("Location: upload_form.php");

?>





<!------------------------- DAY 4 START!  UPDATE client validation with SERVER VALIDATION...

1.  UPDATE YOUR TITLES & HEADERS TO SAY "DAY 4" in test_uploads.php and upload_form.php...

2.  Going back to our upload_form.php and test_uploads.php, let's update your test_uploads.php AND login.php
    to validate empty fields-->

<?
// Read in all registration form fields into an "associate" array & return the array for processing output
function makeArray(){
$salt = "SuperFIASaltHash";
$epass = md5($_POST['password'].$salt);
$euser =  $_POST['user'];
$eavatar =  $_POST['profilePhoto']                 //added DAY4

// ADD AFTER Captcha Overview; Also add Captcha to "return array statement below
$captchaInput = $_POST['captcha'];

return array("USER NAME" => $euser, "Hashed PASSWORD with Dash of Salt" => $epass, "Captcha" => $captchaInput, "Profile Photo" => $eavatar);
}


// DAY 4:  ADD/Replace Client Side Validation
if (empty($euser) || empty($epass) || empty($captchaInput) || empty($eavatar)) {
echo "Sorry, you did not fill out all required form fields...<br><br>";
echo "<a href='http://localhost:8888/SSL-1506_MyClassActivities/Day4/Lecture4/Activity/upload_form.php'>Try again?</a><br><br>";
$uploadOk = 0;
}
?>


<!-- 2.  Again, Remember to update your login.php too!  Use the following code; -->


<?
// DAY 4:  ADD Client Side Validation to login.php -- add an "else if" to 1st "IF" statement

if (empty($usernameInput) || empty($epasswordInput)) {
echo "Sorry, you did not fill out all required LOGIN form fields...<br><br>";
echo "<a href='http://localhost:8888/SSL-1506_MyClassActivities/Day4/Lecture4/Activity/upload_form.php'>Try again?</a><br><br>";
$uploadOk = 0;
}


*/

?>

<!-- DAY 4:  UPDATE HTML Layout for 2 files...
             Update your HTML inside "test_uploads.php" AND "login.php" by pasting the following header: -->



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
<h1><b>PHP Programming Basics<br>(DAY #4) - by Fia</b></h1>

<!-- REPLACE MY PHOTO BELOW WITH YOUR PHOTO -->
<center><img src="images/fiapic.jpg" width=150 height=150><br><br></center>





<!------------------------- DAY 4:  DATABASE CRUD - Expanding "Read" Functionality with a Dashboard

- Going back to our upload_form.php, let's re-use upload_form.php to SAVE AS and
  create anew file called dashboard.php -->

<?

// Setup DB Username & Password
$user = 'root';
$pass = 'root';
$salt = "SuperFIASaltHash";

// Establish PDO & DSN Connection to Database
$dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

echo "<a href='logout.php'>Log Out?</a>&nbsp;|&nbsp;";
echo "<a href='dashboard.php'>Dashboard</a><br><br>";
?>



<table width="80%" align="center">
    <tr>
        <th>User ID</th>
        <th>User Name</th>
        <th>Password</th>
        <th>Profile Photo</th>
        <th>Action</th>
    </tr>

    <!-- QUERY & PRINT ALL FRUIT RECORDS/DETAILS FROM SSL DATABASE; PLUS PROVIDE OPTIONAL DELETE LINK -->
    <?


    $stmt = $dbh->prepare('SELECT * FROM users order by userid ASC;');

    $stmt->execute();

    $result = $stmt->fetchall(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        echo '<tr><td>' . $row['userid'] . '</td><td>' . $row['username'] . '</td><td>' . $row['password'] .  '</td><td>' . $row['profilePhoto'] . ' </td><td><a href="deleteuser.php?id=' . $row['userid'] . '">Delete</a></td><td><a href="updateuser.php?id=' . $row['userid'] . '">Update</a></td>';
    }




    ?>

    </tr></table>

</body>
</html>



<!-- Now add a simple navigation to your login.php AND dashboard.php file so that users can get back to dashboard.php -->

echo "<a href=''>Log Out?</a>&nbsp;|&nbsp;";
echo "<a href=''>Dashboard</a>&nbsp;|&nbsp;<br><br>";



<!------------------------- DAY 4:  DATABASE CRUD - Building "Delete" Functionality

- Going back to our dashboard.php, let's re-use upload_form.php to SAVE AS and
  create anew file called deleteuser.php with the following code -->



<?php

// SSL - Week 2 //
// Fialishia O'Loughlin (deleteuser.php) //



// Establish PDO Database Connection //

$user    =
$pass    =
$dbh     =

// Use GET to capture userid //

$userid = $_GET['id'];

// Use PREPARE to delete userid //
$stmt    = $dbh->prepare();

$stmt->bindParam();
$stmt->execute();
//header('Location: dashboard.php'); //redirect back to the original login page
echo "Your Delete is Complete!&nbsp;|&nbsp;";
echo "<a href=''>Log Out?</a>&nbsp;|&nbsp;";
echo "<a href=''>Delete More?</a><br><br>";
die();
?>




<!------------------------- DAY 4:  DATABASE CRUD - Building "Update" Functionality

Going back to our upload_form.php and test_uploads.php, let's update our code. -->


<?

// Establish DB Connection

$user    = 'root';
$pass    = 'root';
$dbh     = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

// Grab Requested Client ID & record where ID equal; "Select All" PRE-populated all fields for updating
$userid = $_GET['id'];
$stmt=$dbh->prepare("SELECT * FROM users where userid = :userid");
$stmt->bindParam(':userid', $userid);
$stmt->execute();
$result = $stmt->fetchall(PDO::FETCH_ASSOC);

// Validate/filter the URL entered by User;  Execute Update & return to dashboard.php page
if(isset($_POST['submit'])){

    $userid = $_GET['id'];
    $username = $_POST['user'];
    $stmt=$dbh->prepare("UPDATE users SET username='".$username."'WHERE userid='".$userid."';");
    $stmt->execute();
    //header('Location: dashboard.php');
    echo "<a href='logout.php'>Log Out?</a>&nbsp;|&nbsp;";
    echo "<a href='dashboard.php'>Update More?</a><br><br>";
    die();
}

?>


<h1 id='header'><b>UPDATE User Name</b> ~ by Fia</h1>


<form action='' id='add' method='POST'>
    Your Username is currently:
    <input type="text" name="user" value=<?php echo '"'.$result[0]['username'].'"';?> /></br>
    <input type='submit' name='submit' value='Save' />
</form>


<!--
For more on how PDO, MySQL, and CRUD work together + other Database Concepts,
check out http://php.net/manual/en/book.pdo.php-->




<!-- Pop Quiz (Profile Challenge)-->




</body>
</html>