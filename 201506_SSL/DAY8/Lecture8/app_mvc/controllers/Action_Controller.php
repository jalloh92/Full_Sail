<?

//echo "Controller loaded";

// Includes for Controller:
include("models/fruits.php");
include("models/views.php");

// Instantiate and make new copies of your Classes above
// Store in variables
$views = new Views();
$fruits = new Fruits();

// Controller routes the users based on the form "action" from Views;
// If the action is not empty -- keep processing...
if(!empty($_GET['action'])){

	// *********** 1. ENTIRE FRUIT LIST *********************
    if ($_GET["action"]=="fruitList"){
        // fruitList is from the Nav Bar in header.php
        // run the function getFruits, pass result into $data
        // pass $data into the view fruitAdmin.php
        $data = $fruits->getFruits();
        $views->getViews("views/head.php");
        $views->getViews("views/header.php");
        $views->getViews("views/fruitAdmin.php",$data);
        //var_dump($data);
        $views->getViews("views/footer.php");

    // *********** 2. EDIT FRUIT *********************    
    } else if ($_GET["action"]=="editFruit"){
        // run function getUser by using the userid, pass results into $data
        // pass $data into the view update_form.php
        $data = $fruits->getFruit($_GET["fruitid"]);
        //var_dump($data);
        $views->getViews("views/head.php");
        $views->getViews("views/header.php");
        $views->getViews("views/update_form.php",$data);
        $views->getViews("views/footer.php");

    // *********** 3. EDIT ACTION *********************
    } else if ($_GET["action"]=="editAction"){
        // editAction is from update_form.php
        // run function updateFruit, pass in the fruitname & fruitid
        // redirect to the fruitList
        $fruits->updateFruit($_POST["fruitname"],$_POST["fruitcolor"], $_POST["fruitid"]);
        header("location:?action=fruitList");

    // *********** 4. DELETE FRUIT *********************
    } else if ($_GET["action"]=="deleteFruit"){
        // run the function deleteFruit, pass in the fruitid
        // redirect to the fruitList
        $fruits->deleteFruit($_GET["fruitid"]);
        header("location:?action=fruitList");

    // *********** 5. ADD FRUIT ACTION *********************
    } else if($_GET["action"]=="addFruitAction"){
        // addFruitAction is from the signup.php file
        // run the function addFruit, pass in fruitname, fruitcolor, fruitimage
        // redirect to the fruitList
        $fruits->addFruit($_POST["fruitname"],$_POST["fruitcolor"],$_POST["fruitimage"]);
        //$views->getViews("views/header.php");
        //views->getViews("views/head.php");
        header("location:?action=fruitList");   
    }    

} else {

	// ************ 6. DEFAULT VIEW is form plus daily fruit ********************
	$views->getViews("views/head.php");
	$views->getViews("views/header.php");
	$views->getViews("views/form.php");
	// $dailyFruit = $fruits->getDailyFruit();
	// $views->getViews("views/dailyFruit.php", $dailyFruit);
    $views->getViews("views/fruitsinclass.php");
	$views->getViews("views/footer.php");

} // closes if(!empty($_GET['action']...

?>	








