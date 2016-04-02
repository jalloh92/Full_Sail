<?php

	$user = "root";
	$pass = "root";

	$dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

	// Grab "id" from URL in previous page; Use super global $_GET
	$fruitid = $_GET['id'];

	// Create a prepared statment with your SQL DELETE command:
	$stmt = $dbh->prepare("DELETE FROM fruits where fruitid IN (:fruitid)");

	// Bind parameters to databse; then, execute SQL statement
	$stmt->bindParam(':fruitid', $fruitid);
	$stmt->execute();

	// Redirect user back to the orignal page once the record has been deleted.
	header('Location: fruitsinclass.php');

?>
