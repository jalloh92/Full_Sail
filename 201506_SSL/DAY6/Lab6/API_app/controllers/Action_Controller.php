<?
session_start(); //start the session;

include("models/views.php");
include("models/flickr_api.php");

$views = new Views();
$api = new flickrAPI();

if(!empty($_GET["action"])) {

	// If the "action" is specified as lookup:
	if($_GET["action"] == "lookup") {

		// If the search term has a value AND is not = to empty;
 		if(isset($_POST['searchTerm']) && $_POST['searchTerm'] != ''){

 			$search = $_POST['searchTerm']; // then, store the search term in a variable

 		}else{

 			$search = 'cat'; // then, store the search term in a variable

 		} // closes if(isset($_POST['searchTerm']) && $_POST['searchTerm'] != '')...

		$data = $api->get_photos_by_search($search);
		$views->getView("views/header.php");
		$views->getView("views/search.php", $data);
		$views->getView("views/footer.php");

	} else {
	// INVALID ACTION

 	header("Location: /ssl/Lab5/");

 	} // closes if($_GET["action"] == "lookup")...

} else {

	// If the "action" is not specified:
	$views->getView("views/header.php");
	$views->getView("views/home.php");
	$views->getView("views/footer.php"); 

} // closes if(!empty($_GET["action"]))

?>
