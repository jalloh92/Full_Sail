<?

// Create "CreateData" Class (aka Object)

class CreateData{

	public function createrecord(){

		$user = "root";
		$pass = "root";
		$dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);	
	
		// Grab all form fields from super global $_POST and store in variables
		$fruitname = $_POST['fruitname'];
		$fruitcolor = $_POST['fruitcolor'];
		$fruitimage = $_POST['fruitimage'];

		// Prepare your database INSERT statement to CREATE a new record (CRUD)
		$stmt = $dbh->prepare("INSERT INTO fruits (fruitname, fruitcolor, fruitimage) VALUES (:fruitname, :fruitcolor, :fruitimage);");

		// Bind the databse field names to the form values / varialbe collected earlier
		// Then, execute the SQL statement
		$stmt->bindParam(':fruitname', $fruitname);
		$stmt->bindParam(':fruitcolor', $fruitcolor);
		$stmt->bindParam(':fruitimage', $fruitimage);
		$stmt->execute();
		
	} // closes public function createrecord()
	
} // closes class CreateData

?>	