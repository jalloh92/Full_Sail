<?

//echo "Controller loaded";

// Includes for Controller:
include("models/grades.php");
include("models/views.php");

// Instantiate and make new copies of your Classes above
// Store in variables
$views = new Views();
$grades = new grades();

// Controller routes the users based on the form "action" from Views;
// If the action is not empty -- keep processing...
if(!empty($_GET['action'])){

    // *********** 1. DELETE grade *********************
    if ($_GET["action"]=="deletegrade"){
        // run the function deletegrade, pass in the gradeid
        // redirect to the gradeList
        $grades->deletegrade($_GET["studentid"]);
        header("location:?");

    // *********** 2. ADD grade ACTION *********************
    } else if($_GET["action"]=="addGradeAction"){
        // addgradeAction is from the signup.php file
        // run the function addgrade, pass in studentname, studentpercent, studentlettergrade
        // redirect to the gradeList
        $grades->addgrade($_POST["studentname"],$_POST["studentpercent"]);
        //views->getViews("views/head.php");
        header("location:?");   
    }    

} else {

	// ************ 3. DEFAULT VIEW is form plus all grades ********************
	$data = $grades->getgrades();
    $views->getViews("views/head.php");
	$views->getViews("views/form.php");
    $views->getViews("views/gradeAdmin.php",$data);
	$views->getViews("views/footer.php");

} // closes if(!empty($_GET['action']...

?>	








