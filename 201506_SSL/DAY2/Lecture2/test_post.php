

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



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { // useful test when using multiple form on same page/application
    // collect value of input field
    $sname2 = $_POST['sname2'];
    $subject2 = $_POST['subject2'];
    $web2 = $_POST['web2'];

    if (empty($sname2) || empty($subject2) || empty($web2)) {
        echo "Some fields are missing!";
        echo "<br>";
    } else {
        echo "Study " . $_POST['subject2'] . " at " . $_POST['sname2'];
        echo "<br>";
    }
}
?>

<!-- REPLACE MY NAME IN THE TITLE BELOW WITH YOUR NAME -->
<h1><b>PHP Programming Basics && More!<br>(DAY #2) - by Kelly</b></h1>

<!-- REPLACE MY PHOTO BELOW WITH YOUR PHOTO -->
<center><img src="images/kelly_photo.jpg" width=150 height=150></center><br><br>

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