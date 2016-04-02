
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
<h1><b>PHP Programming Basics<br>(DAY #4) - by Fia</b></h1>

<!-- REPLACE MY PHOTO BELOW WITH YOUR PHOTO -->
<center><img src="images/fiapic.jpg" width=150 height=150></center><br><br>


<h2>*** MySQL DATABASE LOGIN & CRUD Functionality ***</h2>

<h2>*** More PHP CONCEPTS ***</h2>

<?

// Setup DB Username & Password
$user = 'root';
$pass = 'root';
$salt = "SuperFIASaltHash";

// Establish PDO & DSN Connection to Database
$dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);


// Test if 2nd form has the empty fields; If not, grab the username & password & bind to DB parameters
if ($_POST['username_li'] != null && $_POST['password_li'] != null) {
    $usernameInput = $_POST['username_li'];
    $passwordInput = md5($_POST['password_li'] . $salt);

    $sth = $dbh->prepare('select profilePhoto, username, password, userid from users
                    where username = :username and password = :password');
    $sth->bindParam(':username', $usernameInput);
    $sth->bindParam(':password', $passwordInput);
    $sth->execute();
    $result = $sth->fetchAll();



// If the result of the 1st array item contains a 'userid', let the user know they have successfully logged in.
        if (isset($result[0]['userid'])) {

        $_SESSION['userid'] = $result;
        $passid = $_SESSION['userid'];
        echo "Congratulations!!! You have successfully logged in.  Enjoy :-)<br>";
        echo "<a href='logout.php'>Log Out?</a>&nbsp;|&nbsp;";
        echo "<a href='dashboard.php'>Dashboard</a>&nbsp;&nbsp;<br><br>";

        // Use userid to look up username & profile photo
        foreach ($_SESSION['userid'] as $row) {

            // Prepare/Bind/Execute and grab results to echo $row['userid']. "<br>";
            $sth = $dbh->prepare('select username, profilePhoto from users where userid = :userid');
            $sth->bindParam(':userid', $row['userid']);
            $sth->execute();
            $result = $sth->fetchAll();

            // Optional Analysis:
            // print_r($result[0]['username']);

            // Store each row found in the $results
            echo "<p>";
            $userid = $row['userid'];
            foreach ($result as $row) {
                $photo = $row['profilePhoto'];
                $username = $row['username'];
            };

            // echo out the profile photo and give user an option to logout.
            echo "<img src=\"uploads/".$photo."\" class=\"right userPhoto\"/><br>";
            echo "</p>";
            echo "<ul class=\"right userSection\">
                    <li>Your User ID is:  ".$userid."</li>
                    <li>Your Username is:  ".$username."</li>
                    <li><a href=\"logout.php\">Logout</a></li>
                    </ul>";


        };

    } else {
        // else let user know that their login failed!
        echo "So Sorry - Your Login Failed!  The User Name or Password is incorrect. Please try again...";
        echo "<a href='upload_form.php'>Go Back?</a><br><br>";

    }

} else {
    echo "Sorry, you must submit both LOGIN fields to proceed.<br><br>";
    echo "<a href='upload_form.php'>Try again?</a><br><br>";
}


?>

<!-- <a href="dashboard.php?id=<? echo $userid ?>">Dashboard</a><br><br><br> -->


</body>
</html>