<?php

// Create "UpdateData" Class (aka Object)

class GetData{

	public function getrecord(){

		// Establish DB Connection
		$user = "root";
		$pass = "root";
		$dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

		// Grab "id" from URL in previous page; Use super global $_GET
		$fruitid = $_GET['id'];

		// Create a prepared statment with your SQL SELECT command:
		$stmt = $dbh->prepare("SELECT * FROM fruits where fruitid IN (:fruitid)");

		// Bind parameters to databse; then, execute SQL statement
		$stmt->bindParam(':fruitid', $fruitid);
		$stmt->execute();

		$result = $stmt->fetchall(PDO::FETCH_ASSOC);

		// Test to see if correct inputs are pulled
		//echo $result[0]['fruitname'];
		//echo $result[0]['fruitcolor'];
		//echo $result[0]['fruitid'];
		
		} // close if statement

	} // closes public function updaterecord()

} // closes class UpdateData

?>