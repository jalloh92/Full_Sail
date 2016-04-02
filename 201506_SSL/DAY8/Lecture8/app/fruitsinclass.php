<?php

	$user = "root";
	$pass = "root";

	$dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

	// Conditional:  Only INSERT or create new data in the database if the form is submitted
	if($_SERVER['REQUEST_METHOD']=='POST'){

		// Grab all form fields from super global $_POST and store in variables
		$fruitname = $_POST['fruitname'];
		$fruitcolor = $_POST['fruitcolor'];

		// Prepare your database INSERT statement to CREATE a new record (CRUD)
		$stmt = $dbh->prepare("INSERT INTO fruits (fruitname, fruitcolor) VALUES (:fruitname, :fruitcolor);");

		// Bind the databse field names to the form values / varialbe collected earlier
		// Then, execute the SQL statement
		$stmt->bindParam(':fruitname', $fruitname);
		$stmt->bindParam(':fruitcolor', $fruitcolor);
		$stmt->execute();
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fruit Shop</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
	<div class="container">
		<h2>Kelly Rhodes</h2>
		<h3>Fruit Shop Activity</h3>

		<form action="fruitsinclass.php" method="POST">
			<input type="text" name="fruitname" placeholder="Fruit Name"/>
			<input type="text" name="fruitcolor" placeholder="Fruit Color"/>
			<input type="submit"/>
		</form>
	</div><!-- closes container -->	

</body>
</html>

<?

// Prepare a new SQL statement to READ & find all fruit records and put them in ascending order
$stmt = $dbh->prepare('SELECT * FROM fruits order by fruitid ASC;');

// No binding because we're not inserting or updateing; Just doing a READ of the database
$stmt->execute();

// Now put hte results in a variable so we can play with them & display
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
	echo 'ID: ' . $row['fruitid'] . ' Name: ' . $row['fruitname'] . ' Color: ' . $row['fruitcolor'] .
	' <a href="deletefruitinclass.php?id=' . $row['fruitid'] . '">Delete</a>
	 <a href="updatefruitinclass.php?id=' . $row['fruitid'] . '">Update</a><br/>';
}

echo '</div>';

?>