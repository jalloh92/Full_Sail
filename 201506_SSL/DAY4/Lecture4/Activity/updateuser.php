<?php
//ini_set('session.gc_maxlifetime', 5 * 60);
session_start();
//if (isset($_SESSION['userid'])) {
//    header('Location: profile.php');
//}
?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">

        <title>SSL Basics - by Fia</title>
        <meta name="description" content="">
        <meta name="author" content="">

    </head>


    <!-- CSS File -->

    <link rel="stylesheet" type="text/css" href="css/basics.css">


    <body>

    <!-- REPLACE MY NAME IN THE TITLE BELOW WITH YOUR NAME -->
    <h1><b>PHP Programming Basics<br>(DAY #4) - by Kelly</b></h1>

    <!-- REPLACE MY PHOTO BELOW WITH YOUR PHOTO -->
    <center><img src="images/kelly_photo.jpg" width=150 height=150><br><br></center>



    <h2>*** UPLOADS, IMAGE MANIPULATION, PASSWORDS/CAPTCHA, DATABASE LOGIN ***</h2>

    <H3>UPLOADS</H3>

<?

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
    echo "<a href='logout.php'>Log Out?</a>&nbsp;|&nbsp;";
    echo "<a href='dashboard.php'>Update More?</a><br><br>";
    die();
}

?>


<h1 id='header'><b>UPDATE User Name</b> ~ by Fia</h1>


<form action='' id='add' method='POST'>
    Your Username is currently:
    <input type="text" name="user" value=<?php echo '"'.$result[0]['username'].'"';?> /></br>
    <input type='submit' name='submit' value='Save' />
</form>

</body>
</html>