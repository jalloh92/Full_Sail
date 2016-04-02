<?php
// Start the session
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
    Username:<input type="text" name="user" value="" required /></br>
    Password:<input type="password" name="password" value="" required /></br>
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"></br>
    <input type="submit" value="Upload Image" name="submit">
</form>





</body>
</html>