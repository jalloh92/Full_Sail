<?php
//ini_set('session.gc_maxlifetime', 5 * 60);
session_start();
//if (isset($_SESSION['userid'])) {
//    header('Location: profile.php');
//}
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
    <h1><b>PHP Programming Basics<br>(DAY #4) - by Kelly</b></h1>

    <!-- REPLACE MY PHOTO BELOW WITH YOUR PHOTO -->
    <center><img src="images/kelly_photo.jpg" width=150 height=150><br><br></center>



    <h2>*** UPLOADS, IMAGE MANIPULATION, PASSWORDS/CAPTCHA, DATABASE LOGIN ***</h2>

    <H3>UPLOADS</H3>

<?php

// SSL - Week 2 //
// Fialishia O'Loughlin (deleteuser.php) //



// Establish PDO Database Connection //

$user    = 'root';
$pass    = 'root';
$dbh     = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user ,$pass);

// Use GET to capture userid //

$userid = $_GET['id'];

// Use PREPARE to delete userid //
$stmt    = $dbh->prepare("DELETE FROM users where userid IN (:userid)");

$stmt->bindParam(':userid', $userid);
$stmt->execute();
//header('Location: dashboard.php'); //redirect back to the original login page
echo "Your Delete is Complete!&nbsp;|&nbsp;";
echo "<a href='logout.php'>Log Out?</a>&nbsp;|&nbsp;";
echo "<a href='dashboard.php'>Delete More?</a><br><br>";
die();
?>

</body>
</html>