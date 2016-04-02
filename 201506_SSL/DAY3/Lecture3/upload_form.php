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

    <title>SSL Basics - by Fia</title>
    <meta name="description" content="">
    <meta name="author" content="">

</head>


<!-- CSS File -->

<link rel="stylesheet" type="text/css" href="css/basics.css">


<body>
<!-- REPLACE MY NAME IN THE TITLE BELOW WITH YOUR NAME -->
<h1><b>PHP Programming Basics && More!<br>(DAY #2) - by Kelly</b></h1>

<!-- REPLACE MY PHOTO BELOW WITH YOUR PHOTO -->
<center><img src="images/kelly_photo.jpg" width=150 height=150></center><br><br>

<form enctype="multipart/form-data" action="test_uploads.php" method="post" enctype="multipart/form-data">
	Username <input type="text" name="user" value="" required /></br>
	Password: <input type="password" name="password" value='' required /></br>
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"></br>
	<label for="captcha">Captcha Verify:</label><input name="captcha" id="captcha" /><br>
	<img src="captcha.php" />
    <input type="submit" value="Upload Image" name="submit">
</form>

<form action="login.php" method="post">
    <fieldset>
        <legend>Ready to Login?</legend>

        <p>
            <label for="username_li">Username:</label><input name="username_li" id="username_li">
        </p>
        <p><label for="password_li">Password:</label><input name="password_li" id="password_li">           </p>
        <p class="rel">
            <button type="submit" class="right">Submit</button>
        </p>
    </fieldset>
</form>



</body>
</html>