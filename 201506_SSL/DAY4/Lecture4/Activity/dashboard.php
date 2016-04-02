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
    // Setup DB Username & Password
    $user = 'root';
    $pass = 'root';
    $salt = "SuperFIASaltHash";

    // Establish PDO & DSN Connection to Database
    $dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

    echo "<a href='logout.php'>Log Out?</a>&nbsp;|&nbsp;";
    echo "<a href='dashboard.php'>Dashboard</a><br><br>";
    ?>

    <table width="80%" align="center">
    <tr>
        <th>User ID</th>
        <th>User Name</th>
        <th>Password</th>
        <th>Profile Photo</th>
        <th>Action</th>
    </tr>

    <?


    $stmt = $dbh->prepare('SELECT * FROM users order by userid ASC;');

    $stmt->execute();

    $result = $stmt->fetchall(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        echo '<tr><td>' . $row['userid'] . '</td><td>' . $row['username'] . '</td><td>' . $row['password'] .  '</td><td>' . $row['profilePhoto'] . ' </td><td><a href="deleteuser.php?id=' . $row['userid'] . '">Delete</a></td><td><a href="updateuser.php?id=' . $row['userid'] . '">Update</a></td></tr>';
    }




    ?>

    </table>

</body>
</html>