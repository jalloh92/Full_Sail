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

<?php
// Store Captcha input in Session Variable for Verification Later;
if(array_key_exists('captcha',$_SESSION)) {
    echo "Yes, captcha exist!";
};
$captchaVerify = $_SESSION['captcha'];
$captchaInput = $_POST['captcha'];
// end Captcha Overview; //


// DON'T DO ANYTHING UNLESS THE CAPTCHA WORKS!
if ($captchaInput == $captchaVerify) {

// ADD this to the top of your test_uploads.php processing script -->
// Read in all form fields into an "associate" array & return the array for processing output
function makeArray(){
    $salt = "SuperFIASaltHash";
    $epass = md5($_POST['password'].$salt);
    $euser = $_POST['user'];
    return array("USER NAME" => $euser, "Hashed PASSWORD with Dash of Salt" => $epass);
}



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


// MAKING A THUMBNAIL:
// STEP #1:  Copy the following code to your test_uploads.php script
// STEP #2:  Scroll down and grab the new code for the upload form

function makeThumbnail($newfile, $where, $username) {

    // Setup the new file name
    $filename = $newfile;
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES['fileToUpload']["name"]);
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    // Set a maximum height and width
    $width = 200;
    $height = 200;

    // Content type
    //header('Content-Type: image/jpeg');

    // Get new dimensions using the width and height from above
    list($width_orig, $height_orig) = getimagesize($filename);

    $ratio_orig = $width_orig/$height_orig;

    if ($width/$height > $ratio_orig) {
        $width = $height*$ratio_orig;
    } else {
        $height = $width/$ratio_orig;
    }

    // Resample & Resize the Images (JPGs, PNG, GIF)

    if($imageFileType == "jpg" || $imageFileType == "jpeg") {
        //header('Content-Type: image/jpeg');
        $image_p = imagecreatetruecolor($width, $height);
        $image = imagecreatefromjpeg($filename);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
        imagejpeg($image_p, $where.$username.'thumbnail.jpg');

        // Combine & return the username with the word 'thumbnail.jpg' at the end.
        return $username.'thumbnail.jpg';
    }

    if($imageFileType == "png") {
        //header('Content-Type: image/png');
        $image_p = imagecreatetruecolor($width, $height);
        $image = imagecreatefrompng($filename);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
        imagepng($image_p, $where.$username.'thumbnail.png');

        // Combine & return the username with the word 'thumbnail.png' at the end.
        return $username.'thumbnail.png';
    }

    if($imageFileType == "gif") {
        //header('Content-Type: image/gif');
        $image_p = imagecreatetruecolor($width, $height);
        $image = imagecreatefromgif($filename);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
        imagegif($image_p, $where.$username.'thumbnail.gif');

        // Combine & return the username with the word 'thumbnail.png' at the end.
        return $username.'thumbnail.gif';
    }

    //var_dump(debug_backtrace());
    return $username.'thumbnail.png';

} 


// Output Array Login Details to User
if (isset($_POST['submit'])) {
    echo "<h2>YES!! CONGRATULATIONS!</h2><h3>Your user account has been successfully created!</h3>";
    echo "<h3>Your registration details are listed below.</h3>";
    echo "<table width=550 align=center border=0><tr><td>";

    // CONVERT array into a variable
    $data = makeArray();

        // FOREACH for displaying Array Contents created in makeArray Function
        foreach ($data as $attribute => $data) {
            echo "<p align=left><font color = #FF4136>{$attribute}</font>: {$data}";
        }
            echo "</td></tr></table>";
    }


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.<br><br>";
    // if everything is ok, try to resize to thumbnail & upload file
} else {

    // Connect to database
    $user = 'root';
    $pass = 'root';
    $dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

    $salt = "SuperFIASaltHash";
    $epass = md5($_POST['password'] . $salt);

    // removed directory cause its above
    $username = $_POST['user'];                   // use the username to customize thumbnail later..
    $target_file = $target_dir . basename($_FILES['fileToUpload']['name']);

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $profilePhoto = makeThumbnail($target_file, $target_dir, $username);

        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.<br><br>";
        echo "<a href='http://localhost:8888/SSL-1506_MyClassActivities/Day3/Lecture3/Activity/upload_form.php'>Try again?</a><br><br>";
        echo "<div class=imageDiv><p><b>Avatar:</b><br><img src='" . $target_file . "' /></p></div>";

        if ($imageFileType == "jpg") {
            $thumbnail = $target_dir . $username . 'thumbnail.jpg';
        } else if ($imageFileType == "png") {
            $thumbnail = $target_dir . $username . 'thumbnail.png';
        } else if ($imageFileType == "gif") {
            $thumbnail = $target_dir . $username . 'thumbnail.gif';
        };

        echo "<div class=imageDiv><p><b>Avatar:</b><br><img src='" . $thumbnail . "' /></p></div>";
        echo $target_file;

        $stmt = $dbh->prepare("insert into users (username, password, profilePhoto)
        values(:username, :password, :profilePhoto)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $epass);
        $stmt->bindParam(':profilePhoto', $profilePhoto);
        $stmt->execute();

    } else {

        echo "Sorry, there was an error uploading your file.<br><br>";
    }
}

} else {
    echo "Sorry, there was an error... there was a problem with your captcha input.<br><br>";
    echo "You may have entered the wrong word... or you did not pass the Human Check (Captcha).  Please try again...<br><br>";
    echo "<a href='http://localhost:8888/DAY3/Lecture3/upload_form.php'>Try again?</a><br><br>";
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