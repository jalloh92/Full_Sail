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
    <h1><b>PHP Programming Basics<br>(DAY #4) - by Fia (Working)</b></h1>

    <!-- REPLACE MY PHOTO BELOW WITH YOUR PHOTO -->
    <center><img src="images/fiapic.jpg" width=150 height=150><br><br></center>



    <h2>*** MySQL DATABASE LOGIN & More ***</h2>

    <H3>CREATING CRUD DATABASE APPS with PDO</H3>


    <form enctype="multipart/form-data" action="signup.php" method="post" >
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload" /><br>
        Username <input type="text" name="user" value="" /><br>
        Password: <input type="password" name="password" value="" /><br>

        <label for="captcha">Captcha Verify:</label><input id="captcha" type="text" name="captcha" /><br>
        <img src="captcha.php" />

        <input type="submit" value="Upload Image" name="submit">
    </form>


    <form action="login.php" method="post">
        <fieldset>
            <legend>Ready to Login?</legend>

            <p>
                <label for="username_li">Username:</label><input id="username_li" type="text" name="username_li">
            </p>
            <p><label for="password_li">Password:</label><input id="password_li" type="password" name="password_li">			</p>
            <p class="rel">
                <button type="submit" class="right">Submit</button>
            </p>
        </fieldset>
    </form>

</body>
</html>