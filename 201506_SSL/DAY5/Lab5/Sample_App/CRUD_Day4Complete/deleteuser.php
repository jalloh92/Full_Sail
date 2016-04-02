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
<h1><b>PHP Programming Basics<br>(DAY #4) - by Fia (Working)</b></h1>

<!-- REPLACE MY PHOTO BELOW WITH YOUR PHOTO -->
<center><img src="images/fiapic.jpg" width=150 height=150></center><br><br>


<h2>*** MySQL DATABASE LOGIN & CRUD Functionality ***</h2>

<h2>*** More PHP CONCEPTS ***</h2>



<!--****************************** LAB 4 PREP *************************** -->

<H3>CREATING CRUD DATABASE APPS with PDO</H3>

<?php

// SSL - Week 2 //
// Fialishia O'Loughlin (deleteuser.php) //



// Establish PDO Database Connection //

$user    = "root";
$pass    = "root";
$dbh     = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

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