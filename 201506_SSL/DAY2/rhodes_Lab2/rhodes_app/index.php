<?php
ini_set('session.gc_maxlifetime', 86400); 
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

    
      <form class="form-signin" enctype="multipart/form-data" action="registered.php" method="post" enctype="multipart/form-data">
        <h2 class="form-signin-heading">Register to win a Beach Getaway!</h2>
        <input type="text" class="form-control" placeholder="First Name" name="First Name">
        <input type="text" class="form-control" placeholder="Last Name" name="Last Name">
        <input type="text" class="form-control" placeholder="Address" name="Address">
        <input type="text" class="form-control" placeholder="City" name="City">
        <input type="text" class="form-control" placeholder="State" name="State">
        <input type="text" class="form-control" placeholder="Zip Code" name="Zip">
        <input type="text" class="form-control" placeholder="Email" name="Email">
        <input type="text" class="form-control" placeholder="Phone Number" name="Phone Number">
        <input type="text" class="form-control" placeholder="Website" name="Website">
        <input type="text" class="form-control" placeholder="Username" name="Username">
        <input type="password" class="form-control" placeholder="Password" name="Password">
        <input type="file" class="form-control" name="fileToUpload" id="fileToUpload"></br>
        <input class="form-control" name="captcha" id="captcha" placeholder="Captcha Verify"/><br>
        <img class="form-control" src="captcha.php" />

        <!-- include captcha -->
        
        <!-- include reset button -->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
      </form>
  

  </body>
</html>