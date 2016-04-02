<?

// Create "ReadDisplay" Class (aka Object)

class ReadDisplay{

	public function readrecords(){

		$user = "root";
		$pass = "root";
		$dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

		// Prepare a new SQL statement to READ & find all fruit records and put them in ascending order
		$stmt = $dbh->prepare('SELECT * FROM fruits order by fruitid ASC;');

		// No binding because we're not inserting or updating; Just doing a READ of the database
		$stmt->execute();

		// Now put the results in a variable so we can play with them & display
		$result = $stmt->fetchall(PDO::FETCH_ASSOC);

		/*
		The above parameter PDO::FETCH_ASSOC means it will return an indexed array with each index 
		containing an Associative array of each row; You could do a var_dum($result) to see the array 
		results and for debugging when necessary
		*/

		// Now that we've READ the database and stored the results in varibale
		// Let's use a foreach loop to echo out the array result
		echo '<div class = "container">';

		foreach ($result as $row) {
			echo 'ID: ' . $row['fruitid'] . 
			' Name: ' . $row['fruitname'] . 
			' Color: ' . $row['fruitcolor'] .
			' Fruit Image: ' . $row['fruitimage'] .
			' <a href="index.php?action=delete&id=' . $row['fruitid'] . '">Delete</a>
			 <a href="index.php?action=update&id=' . $row['fruitid'] . '">Update</a><br/>';
		} // close foreach

		echo '</div>';

	} // close public function readrecords()

} // close class ReadDisplay

?>