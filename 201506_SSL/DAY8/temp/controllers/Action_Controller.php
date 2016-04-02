<?

//echo "Controller loaded";

// Controller "includes" & reads all of your database connections & business logic for this app
include("models/CreateData.Class.php");
include("models/DeleteData.Class.php");
include("models/ReadDisplay.Class.php");
include("models/UpdateData.Class.php");
include("models/Views.Class.php");

// Instantiate and make new copies of your Classes above (view, authorization, and users)
// Store in variables so that we can work with them later
$views = new Views();
$create = new CreateData();
$readdisplay = new ReadDisplay();
$delete = new DeleteData();
$update = new UpdateData();

// Controller routes the users based on the form "action" from Views;
// If the action is not empty -- keep processing...
if(!empty($_GET['action'])){

	// If the action is specified:

	// ************ CREATE ********************
	if($_GET["action"] == "create"){
	
		// Show Header, Create a new record
		$views->getView("views/header.php");
		$create->createrecord($_POST["fruitname"], $_POST["fruitcolor"], $_POST["fruitimage"]);

		// Then... Show form; Read & Dislay new fruit results; Then show footer
		$views->getView("views/form.php");
		$readdisplay->readrecords();

		$views->getView("views/footer.php");

	// ************ UPDATE ********************	
	} else if ($_GET["action"] == "update"){

		$views->getView("views/header.php");
		$views->getView("views/update_form.php");
		$update->updaterecord();
		$views->getView("views/footer.php");

	// ************ DELETE ********************
	} else if ($_GET["action"] == "delete"){

		// Delete record
		$delete->deleterecord();

		// Show Header
		$views->getView("views/header.php");

		// Then... Show form; Read & Dislay new fruit results; Then show footer
		$views->getView("views/form.php");
		$readdisplay->readrecords();
		$views->getView("views/footer.php");

	}	// closes if($_GET["action"]...

} else {

	// Otherwise...Show Header & Form, Read & Display fruit results, then show footer
	$views->getView("views/header.php");
	$views->getView("views/form.php");
	$readdisplay->readrecords();
	$views->getView("views/footer.php");

} // closes if(!empty($_GET['action']...

?>	








