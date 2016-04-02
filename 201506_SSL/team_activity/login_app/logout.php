<?php
ini_set('session.gc_maxlifetime', 86400);
session_start();
session_destroy();
header("Location: index.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Registration</title>

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

        <pre> <!-- add HTML formatting to your analysis -->
            <?

            // Use print_r to get all currently defined variables include $_GET and $_POST;
            echo "<hr>My print_r analysis report: <br><br><hr>";
                 print_r($_FILES);

            // LATER:  Use var_dump(debug_backtrace() to report the number of 'function calls' up to this point.
            echo "<hr>My var_dump of debug_backtrace <br><br><hr>";
                 var_dump(debug_backtrace());

            ?>
        </pre> <!-- end of Uploads Section -->


    </body>
</html>