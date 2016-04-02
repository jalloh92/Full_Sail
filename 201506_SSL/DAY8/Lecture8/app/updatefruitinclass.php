<?php

	// Establish DB Connection
	$user = "root";
	$pass = "root";
	$dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

	// Grab "id" from URL in previous page; Use super global $_GET
	$fruitid = $_GET['id'];

	// Create a prepared statment with your SQL DELETE command:
	$stmt = $dbh->prepare("SELECT * FROM fruits where fruitid IN (:fruitid)");

	// Bind parameters to databse; then, execute SQL statement
	$stmt->bindParam(':fruitid', $fruitid);
	$stmt->execute();


	// Redirect user back to the orignal page once the record has been deleted.
	header('Location: fruitsinclass.php');



 // ************* need to finish!
	

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
	    $stmt=$dbh->prepare("UPDATE users SET username='".$username."' WHERE userid='".$userid."';");
	    $stmt->execute();
	    

	}






?>
