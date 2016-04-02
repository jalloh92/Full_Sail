<?
/*
 *	==================================
 *	PROJECT:	SSL - Lab 4 & 5 Prep
 *	FILE:		models/AuthClass.php
 *	AUTHOR: 	Fialishia O. (Updated 1506)
 *	CREATED:	2015
 *	==================================
 */

// Create an "LoginUser" class (aka object)

class UserLogin {


    // Create public method for checking users login;
    // Function/Method Parameters:  Pass in the username and password

    public function check_login($username="", $password=""){


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
                echo "<a href='http://localhost:8888/DAY6/mvc_app/index.php?action=logout'>Log Out?</a>&nbsp;|&nbsp;";
                echo "<a href='http://localhost:8888/DAY6/mvc_app/index.php?action=dashboard'>Dashboard</a>&nbsp;&nbsp;<br><br>";

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
                    echo "<img src=\"http://localhost:8888/DAY6/mvc_app/uploads/".$photo."\" class=\"right userPhoto\"/><br>";
                    echo "</p>";
                    echo "<ul class=\"right userSection\">
                            <li>Your User ID is:  ".$userid."</li>
                            <li>Your Username is:  ".$username."</li>
                            <li><a href=\"http://localhost:8888/DAY6/mvc_app/index.php/?action=logout\">Logout</a></li>
                            </ul>";


                };

            } else {
                // else let user know that their login failed!
                echo "So Sorry - Your Login Failed!  The User Name or Password is incorrect. Please try again...";
                echo "<a href='" . "http://localhost:8888/DAY6/mvc_app/'" . ">Try again?</a><br><br>";

            }

        } else {
            echo "Sorry, you must submit both LOGIN fields to proceed.<br><br>";
            echo "<a href='" . "http://localhost:8888/DAY6/mvc_app/'" . ">Try again?</a><br><br>";
        }

}


    // Create 2nd public method to logout user and re-route to index.php at root level

    public function logout() {

        session_destroy();
        header("Location: http://localhost:8888/DAY6/mvc_app/");

        /* unset the session
	    unset($_SESSION['current_user']);
	    unset($_SESSION['login_success']);
	    $_SESSION['fade_in'] = TRUE;
	    $_SESSION['logged_out'] = TRUE;
	    header("Location: /PHPBasics_MVCChallengeFIXEDv0/");
        */
    }
}
?>