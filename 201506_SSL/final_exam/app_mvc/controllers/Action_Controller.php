<?

//echo "Controller loaded";

// Includes for Controller:
include("models/clients.php");
include("models/views.php");

// Instantiate and make new copies of your Classes above
// Store in variables
$views = new Views();
$clients = new clients();

// Controller routes the users based on the form "action" from Views;
// If the action is not empty -- keep processing...
if(!empty($_GET['action'])){

    // *********** 1. EDIT client *********************    
    if ($_GET["action"]=="editClient"){
        // run function getUser by using the userid, pass results into $data
        // pass $data into the view update_form.php
        $data = $clients->getClient($_GET["id"]);
        // var_dump($data);
        $views->getViews("views/head.php");
        $views->getViews("views/header.php");
        $views->getViews("views/update_form.php",$data);
        $views->getViews("views/footer.php");

    // *********** 2. EDIT ACTION *********************
    } else if ($_GET["action"]=="editAction"){
        // editAction is from update_form.php
        // run function updateClient, pass in the id, name, phone, email and website
        // redirect to the clientList
        $clients->updateClient($_POST["id"], $_POST["name"],$_POST["phone"], $_POST["email"], $_POST["website"]);
        
        $success = "You successfully edited a client";
        $data = $clients->getClients();
        $views->getViews("views/head.php");
        $views->getViews("views/header.php");
        $views->getViews("views/msg.php", $success);
        $views->getViews("views/clientAdmin.php",$data);
        //var_dump($data);
        $views->getViews("views/footer.php");

    // *********** 3. DELETE client *********************
    } else if ($_GET["action"]=="deleteClient"){
        // run the function deleteClient, pass in the clientid
        // redirect to the clientList
        $clients->deleteClient($_GET["id"]);

        $success = "You successfully deleted a client";
        $data = $clients->getClients();
        $views->getViews("views/head.php");
        $views->getViews("views/header.php");
        $views->getViews("views/msg.php", $success);
        $views->getViews("views/clientAdmin.php",$data);
        //var_dump($data);
        $views->getViews("views/footer.php");  

    // *********** 4. ADD CLIENT *********************
    } else if($_GET["action"]=="addClient"){
        // addClient is from the link in the header
        // this is the form to add a new client
        $views->getViews("views/head.php");
        $views->getViews("views/header.php");
        $views->getViews("views/form.php");
        $views->getViews("views/footer.php");  

    // *********** 5. ADD client ACTION *********************
    } else if($_GET["action"]=="addClientAction"){
        // addClientAction is from the form.php file
        // run the function addClient, pass in name, phone, email, website
        // if either fields are blank or email / website are not valide, then error message will be printed
        // else redirect to the clientList
        $error = $clients->addClient($_POST["name"],$_POST["phone"],$_POST["email"],$_POST["website"]);
        // var_dump($error);

        if ($error != ""){
            $views->getViews("views/head.php");
            $views->getViews("views/header.php");
            $views->getViews("views/msg.php",$error);
            $views->getViews("views/form.php");
            $views->getViews("views/footer.php");
        } else {
            $success = "You successfully added a new client";
            $data = $clients->getClients();
            $views->getViews("views/head.php");
            $views->getViews("views/header.php");
            $views->getViews("views/msg.php", $success);
            $views->getViews("views/clientAdmin.php",$data);
            //var_dump($data);
            $views->getViews("views/footer.php");
        }
          
    }    

} else {

	// ************ 6. DEFAULT VIEW is the ENTIRE CLIENT LIST ********************
	// run the function getclients, pass result into $data
    // pass $data into the view clientAdmin.php
    $data = $clients->getClients();
    $views->getViews("views/head.php");
    $views->getViews("views/header.php");
    $views->getViews("views/clientAdmin.php",$data);
    //var_dump($data);
    $views->getViews("views/footer.php");

} // closes if(!empty($_GET['action']...

?>	








