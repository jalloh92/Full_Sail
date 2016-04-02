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


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);


// Setup Conditional to Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
   if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".<br><br>";
        $uploadOk = 1;
    } else {
        echo "File is not an image.<br><br>";
        $uploadOk = 0;
    }
}

/* Now we can add some restrictions:
- First, we will check if the file already exists in the "uploads" folder.
- If it does, an error message is displayed, and $uploadOk is set to 0: */

if (file_exists($target_file)) {
    echo "Sorry, file already exist.  Please try another one.<br><br>";
    echo "<a href='http://localhost:8888/DAY2/Lecture2/upload_form.php'>Try Again?</a><br><br>";
    $uploadOk = 0;
}


/* Check the File Size (To Limit File Size)
- The file input field in our HTML form above is named "fileToUpload".
- Now, we want to check the size of the file.
- If the file is larger than 500kb, an error message is displayed, and $uploadOk is set to 0: */


if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry your file is too large.<br><br>";
    $uploadOk = 0;
}


/* Allow only certain file formats...
- The code below only allows users to upload JPG, JPEG, PNG, and GIF files.
- All other file types gives an error message before setting $uploadOk to 0: */

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br><br>";
    $uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.<br><br>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . "has been uploaded.<br><br>";
        echo "<div class=imageDiv><p><b>Avatar:</b><br><img src='" . $target_file. "' /></p></div>";
        echo $target_file;
    } else {
        echo "Sorry, there was an error uploading your file.<br><br>";
    }
}
?>


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