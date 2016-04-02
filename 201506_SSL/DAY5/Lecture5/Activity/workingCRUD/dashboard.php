<?php

/*
 *	==================================
 *	PROJECT:	SSL - Day 5
 *	FILE:		FULL CRUD - Class Analysis (dashboard.php)
 *	AUTHOR: 	Fialishia O. (Updated 1506)
 *	==================================
 */
?>


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


<h2>*** MySQL DATABASE CRUD "READ - UPDATE - DELETE" Functionality ***</h2>

<h2>*** More PHP CONCEPTS ***</h2>



<!--****************************** LAB 4 PREP *************************** -->

<H3>CREATING CRUD DATABASE APPS with PDO</H3>

<?

// Setup DB Username & Password
$user = 'root';
$pass = 'root';
$salt = "SuperFIASaltHash";

// Establish PDO & DSN Connection to Database
$dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

echo "<a href='logout.php'>Log Out?</a>&nbsp;|&nbsp;";
echo "<a href='dashboard.php'>Dashboard</a>&nbsp;<br><br>";

//echo "Your ID is " . $_GET['id'];
//$uid = $_GET['id'];
//echo $uid;

?>

<!-- <a href="login.php?id=<? echo $uid ?>">Back to Profile</a><br><br><br> -->


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