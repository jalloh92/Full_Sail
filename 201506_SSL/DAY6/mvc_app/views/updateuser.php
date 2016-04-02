<?
/*
 *	==================================
 *	PROJECT:	SSL - Lab 4 & 5 Prep
 *	FILE:		views/login updateuser.php (edit)
 *	AUTHOR: 	Fialishia O. (Updated 1504)
 *	CREATED:	12/03/2014
 *	==================================
 */
?>

<?

// Establish DB Connection

$user    = "root";
$pass    = "root";
$dbh     = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

// Grab Requested Client ID & record where ID equal; "Select All" PRE-populated all fields for updating
$userid = $_GET['id'];
$stmt=$dbh->prepare("SELECT * FROM users where userid = :userid");
$stmt->bindParam(':userid', $userid);
$stmt->execute();
$result = $stmt->fetchall(PDO::FETCH_ASSOC);

// Validate/filter the URL entered by User;  Execute Update & return to dashboard.php page
if(isset($_POST['submit'])){

    $userid = $_GET['id'];
    $username = $_POST['user'];
    $stmt=$dbh->prepare("UPDATE users SET username='".$username."' WHERE userid='".$userid."';");
    $stmt->execute();
    //header('Location: dashboard.php');
    echo "Hey - good job...it works! Your Update is Now Complete!!!&nbsp;<br><br>";
    echo "<a href='http://localhost:8888/DAY6/mvc_app/index.php/?action=logout'>Log Out?</a>&nbsp;|&nbsp;";
    echo "<a href='http://localhost:8888/DAY6/mvc_app/index.php/?action=dashboard'>Dashboard</a>&nbsp;|&nbsp;";
    die();
}

?>

<h1 id='header'><b>UPDATE User Name</b> ~ by Fia</h1>


<form action='' id='add' method='POST'>
    Your Username is currently:<input type="text" name="user" value=<?php echo '"'.$result[0]['username'].'"'; ?> /></br>
    <input type='submit' name='submit' value='Save' />
</form>
