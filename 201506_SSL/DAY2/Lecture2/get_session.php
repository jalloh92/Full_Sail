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

<?php
// Set session variables
$_SESSION["name"] = $_GET['namestring'];
$_SESSION["state"] = $_GET['statestring'];
echo "Your session variables are set.<br><br>";

// Get Sessions - Echo out the value of each $_SESSION variable
echo "One of my favorite colors is "  . $_SESSION["favcolor"] . ".<br>";
echo "My Favorite animal is a "  . $_SESSION["favanimal"] . ".<br>";
echo "My name is " . $_SESSION["name"] . ".<br>";
echo "I Live in  " . $_SESSION["state"] . ".<br>";
?>

<pre>
<!-- NOTE on the <pre> HTML tag
- Add the the <pre> tag to define pre-formatted PHP text.
- Text in a <pre> element is displayed in a fixed-width font (usually Courier),
  and it preserves both spaces and line breaks to give it a cleaner look. -->

    <?php

    // Use print_r to get all currently defined variables (BOTH LOCAL & GLOBAL);
    echo "<hr>My print_r analysis report: <br><br><hr>";
    print_r(get_defined_vars());

    // LATER:  Use var_dump(debug_backtrace() to report the number of 'function calls' up to this point.
    echo "<hr>My var_dump of debug_backtrace <br><br><hr>";
    var_dump(debug_backtrace());

    ?>

</pre> <!-- end HTML formatting -->



</body>
</html>