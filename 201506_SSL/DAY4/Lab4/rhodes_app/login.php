<?php
ini_set('session.gc_maxlifetime', 86400); //controls the max amount of time for sessions
//Set at 86,400 seconds, a user should be able to browse your application for 24 hours before
// needing to re-authenticate their session.
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Profile</title>

    <!-- Attribution for background image: -->
    <!-- https://www.flickr.com/photos/shoeboxpics27/14849067572/in/photolist-oCamsq-8e3825-HkWR2-oXoWEy-8UiefT-4wWgUx-ak4Q9y-am19Jf-n6wDiJ-5D7ZKf-9LSrWv-2peENU-nZcGxt-pJXp8r-a9cLA8-dzqYtm-jXTRL-rj53D4-cDogzA-6xqBLU-maqYz4-og6k3A-5MFEZJ-PcqK3-qGMQER-p7HJav-pWZz8b-ajrodi-oVoDJF-4JE2Te-mcoRwZ-4X6hRA-4ZwmbH-7wkAcT-69724c-7EZAs9-4VxdKu-iNgvCj-rJ4y2B-arjUzz-4LRdSo-n7mjaZ-p3ppjT-cMbcfm-pQhKKP-o6Dxb1-nkTkeH-p4LxGG-9A9ifq-boFe76 -->

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

    <div class = 'container profile'>
        <h2>Your Information:</h2>

    <?php

    // Setup DB Username & Password
    $user = 'root';
    $pass = 'root';
    $salt = "kellyssalthash";

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

            $_SESSION['userid'] = $result;;
            echo "<a href='http://localhost:8888/DAY3/Lab3/rhodes_app/'>Return to LogIn Page</a><br><br>";

            // Use userid to look up username & profile photo
            foreach ($_SESSION['userid'] as $row) {

                // Prepare/Bind/Execute and grab results to echo $row['userid']. "<br>";
                $sth = $dbh->prepare('select username, profilePhoto from users where userid = :userid');
                $sth->bindParam(':userid', $row['userid']);
                $sth->execute();
                $result = $sth->fetchAll();


                // Store each row found in the $results
                echo "<p>";
                $userid = $row['userid'];
                foreach ($result as $row) {
                    $photo = $row['profilePhoto'];
                    $username = $row['username'];
                };

                // echo out the profile photo and give user an option to logout.
                echo "<a href=\"profile.php\"><img src=\"uploads/".$photo."\" /></a><br>";
                echo "</p>";
                echo "
                        <p>Your Username is:  ".$username."</p>";        
                echo "<a href='logout.php'>Log Out?</a>&nbsp;|&nbsp;";
                echo "<a href='dashboard.php'>Dashboard</a>&nbsp;|&nbsp;<br><br>";
                
            };

        } else {
            // else let user know that their login failed!
            echo "<div class='col-md-6'>";
            echo "LogIn Failed.  Please try again...";
            echo "<a href='index.php'>Return to LogIn Page</a><br><br>";
            echo "</div>";
        }

    }


    ?>

<!-- 
<pre> 
    <?

    // Use print_r to get all currently defined variables include $_GET and $_POST;
    #echo "<hr>My print_r analysis report: <br><br><hr>";
         #print_r($_FILES);

    // LATER:  Use var_dump(debug_backtrace() to report the number of 'function calls' up to this point.
    #echo "<hr>My var_dump of debug_backtrace <br><br><hr>";
         #var_dump(debug_backtrace());

    ?>
</pre> 
-->

    </div><!-- closes container -->

</body>
</html>