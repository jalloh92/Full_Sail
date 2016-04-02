<?
/*
 *	==================================
 *	PROJECT:	SSL - Lab 4 & 5 Prep
 *	FILE:		models/deleteuser.php
 *	AUTHOR: 	Fialishia O. (Updated 1506)
 *	CREATED:	2015
 *	==================================
 */


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
echo "No Going Back Now - Your Delete is Complete!!!&nbsp;|&nbsp;";

echo "<a href='http://localhost:8888/DAY6/mvc_app/index.php/?action=logout'>Log Out?</a>&nbsp;|&nbsp;";
echo "<a href='http://localhost:8888/DAY6/mvc_app/index.php/?action=dashboard'>Dashboard</a>&nbsp;|&nbsp;";

die();

?>
]
