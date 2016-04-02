<?php
ini_set('session.gc_maxlifetime', 86400); //a user should be able to browse your application
// for 24 hours before needing to re-authenticate their session.
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Edit User</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="css/styles.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class = 'container'>
        <h2>Update User:</h2>
        

<?php

// Establish DB Connection

$user    = 'root';
$pass    = 'root';
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
    $stmt=$dbh->prepare("UPDATE users SET username='".$username."'WHERE userid='".$userid."';");
    $stmt->execute();
    //header('Location: dashboard.php');
    echo "<a href='logout.php'>Log Out</a>&nbsp;|&nbsp;";
    echo "<a href='dashboard.php'>Dashboard</a><br><br>";
    die();
}

?>


<form action='' id='add' method='POST'>
    Your Username is currently:
    <input type="text" name="user" value=<?php echo '"'.$result[0]['username'].'"';?> /></br>
    <input type='submit' name='submit' value='Save' />
</form>

</body>
</html>