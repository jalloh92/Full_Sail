<?php
$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 SECONDS = 1 day

$cookie_name2 = "user2";
$cookie_value2 = "user2";
setcookie($cookie_name2, $cookie_value2, time() + (86400 * 30), "/"); // 86400 SECONDS = 1 day
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

<?php

if(!isset($_COOKIE[$cookie_name]) && !isset($_COOKIE[$cookie_name2])) {
    echo "Cookie is currently named '" .  $cookie_name . "' is not set yet!";
    echo "Cookie is currently named '" .  $cookie_name2 . "' is not set yet!";
} else {
    echo "Cookie '" . $cookie_name . "' is already set!<br>";
    echo "The value of this Cookie is: " . $_COOKIE[$cookie_name] . "<br>";
    echo "Cookie '" . $cookie_name2 . "' is already set!<br>";
    echo "The value of this Cookie is: " . $_COOKIE[$cookie_name2];
}

?>

</body>
</html>