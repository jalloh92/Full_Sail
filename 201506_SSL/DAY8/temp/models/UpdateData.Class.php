<?php

// Create "UpdateData" Class (aka Object)

class UpdateData{

	public function updaterecord(){

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

		// Validate/filter the URL entered by User;
		if(isset($_POST['submit'])){

		    $fruitid = $_GET['id'];
		    $fruitname = $_POST['fruitname'];
		    $fruitcolor = $_POST['fruitcolor'];
		    $stmt=$dbh->prepare("UPDATE fruits SET fruitname = :fruitname, fruitcolor = :fruitcolor 
		    	WHERE fruitid = :fruitid;");
		    $stmt->bindParam(':fruitid', $fruitid);
		    $stmt->bindParam(':fruitname', $fruitname);
		    $stmt->bindParam(':fruitcolor', $fruitcolor);
		    $stmt->execute();  

		    header('Location: index.php');

		} // close if statement

	} // closes public function updaterecord()

} // closes class UpdateData

?>