<?

session_start();
//echo "Controller loaded";

// Controller "includes" & reads all of your database connections & business logic for this app
include("models/ViewsClass.php");
include("models/UserLoginClass.php");
include("models/SignupClass.php");

// Instantiate and make new copies of your Classes above (view, authorization, and users)
// Store in variables so taht we can work with them later
$views = new Views();
$userLogin = new UserLogin();
$signUp = new SignUp();

// Controller routes the users based on the form "action" from Views;
// If the action is not empty -- keep processing...
if(!empty($_GET['action'])){

	// If the action is specified:
	if($_GET["action"] == "signup"){
	
		// CREATE USER based on Form Inputs
		$username = $_POST['user'];
		$password = $_POST['password'];
		$captcha = $_POST['captcha'];

		$views->getView("views/header.php");
		$signUp->check_signup($_POST["user"], $_POST["password"], $_POST["captcha"]);
		$views->getView("views/footer.php");

	} else if ($_GET["action"] == "dashboard"){
		
		// DASHBOARD ADMIN

		$views->getView("views/header.php");
		$views->getView("views/dashboard.php");
		$views->getView("views/footer.php");

	} else if ($_GET["action"] == "updateusers"){

		// UPDATE USERS

		$views->getView("views/header.php");
		$views->getView("views/updateuser.php");
		$views->getView("views/footer.php");

	} else if ($_GET["action"] == "deleteusers"){

		// DELETE USERS

		$views->getView("views/header.php");
		$views->getView("views/deleteuser.php");
		$views->getView("views/footer.php");

	} else if ($_GET["action"] == "login"){

		// USER LOGIN

		$views->getView("views/header.php");
		$userLogin->check_login($_POST['username_li'], $_POST['password_li']);
		$views->getView("views/footer.php");

	} else if ($_GET["action"] == "logout"){

		// USER LOGOUT

		$userLogin->logout();

	}	// closes if($_GET["action"]...

} else {

	$views->getView("views/header.php");
	$views->getView("views/upload_form.php");
	$views->getView("views/footer.php");

} // if(!empty($_GET['action']...

?>	








