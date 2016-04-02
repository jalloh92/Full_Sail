<?php
ini_set('session.gc_maxlifetime', 86400); //controls the max amount of time for sessions
//Set at 86,400 seconds, a user should be able to browse your application for 24 hours before
// needing to re-authenticate their session.
session_start();
?>

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

<?php


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

        $_SESSION['userid'] = $result;;
        echo "Congratulations!!! You have successfully logged in.  Enjoy :-)";
        echo "<a href='http://localhost:8888/DAY3/Lecture3/upload_form.php'>Go Back?</a><br><br>";

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
        echo "<a href='http://localhost:8888/DAY3/Lecture3/upload_form.php'>Go Back?</a><br><br>";

    }

}


?>

<pre> <!-- add HTML formatting to your analysis -->
    <?

    // Use print_r to get all currently defined variables include $_GET and $_POST;
    echo "<hr>My print_r analysis report: <br><br><hr>";
         print_r($_FILES);

    // LATER:  Use var_dump(debug_backtrace() to report the number of 'function calls' up to this point.
    echo "<hr>My var_dump of debug_backtrace <br><br><hr>";
         var_dump(debug_backtrace());

    ?>
</pre> <!-- end of Uploads Section -->


</body>
</html>