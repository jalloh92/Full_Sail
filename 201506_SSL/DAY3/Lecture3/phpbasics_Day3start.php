<!--
* Course:  SSL-1506 DAY #3
           (MORE PHP Basics: Image Manipulation, Uploads, Passwords/Captcha, Database Sign-up, Database Login)
* Name:    Updated by Fia
* Date:    Summer 2015
-->


<!-- STARTING HTML -->

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
<h1><b>PHP Programming Basics<br>(DAY #3) - by Kelly</b></h1>

<!-- REPLACE MY PHOTO BELOW WITH YOUR PHOTO -->
<center><img src="images/kelly_photo.jpg" width=150 height=150></center><br><br>


<h2>*** UPLOADS, IMAGE MANIPULATION, PASSWORDS/CAPTCHA, DATABASE LOGIN ***</h2>

<h2>*** More PHP SYNTAX RULES & CONCEPTS ***</h2>

<H3>IMAGE MANIPULATION</H3>

<!--
- PHP is not limited to creating just HTML output, it can also be used to create and manipulate image files
  in a variety of different image formats, including GIF, PNG, JPEG, and more.
- You will need to learn to compile PHP with the GDlibrary of image functions for this to work.

What is the GD Library?
- The GD Library is a graphics and image manipulation library that is accessible through PHP.
- Image Resources (references to objects) are passed to/from PRE-BUILT PHP functions.
- The GD Graphics Library is a graphics software library which was developed by Thomas Boutell
  and other developers for dynamically manipulating images.
- GD supports numerous programming languages including C, PHP, Perl, Python, Ruby, and many more.
- In addition, the “Fly” command line interpreter allows for image creation (“on the fly“) using GD.
- GD scripts can be thus be written in potentially any language and run using this tool.


Some commonly-used image functions. -->

<?

# getimagesize();                             // retrieves image dimensions

# imagecreatetruecolor();                     // create blank canvas

# imagecreatefromjpeg($filename);             // reads jpg input file

# imagejpeg(); imagepng(); imagegif();        // outputs/saves as jpg, png, or gif

# imagecopyresampled();                       // copy image resource to another resource

# imagerectangle();                           // create rectangle inside resource

# imagedestroy();                             // release resources

# file_exists($target_file);                  // checks if file exists on server or not

# move_uploaded_file();                       // This function checks to ensure that the file
                                            // designated is a valid upload

?>

<? 
// MAKING A THUMBNAIL:
// STEP #1:  Copy the following code to your test_uploads.php script
// STEP #2:  Scroll down and grab the new code for the upload form

function makeThumbnail($newfile, $where, $username) {

    // Setup the new file name
    $filename = $newfile;
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES['fileToUplaod']["name"]);
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
        $image = imagecreatetruecolor($filename);
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
?>




<H3>FILE UPLOADS</H3>

<!---------------------------------------- FILE UPLOADS ------------------------------
- With PHP, it is easy to upload files to the server...
- However, with ease comes danger, so always be careful when allowing file uploads to your own server!

1.  Configure The "php.ini" File
- First, ensure that PHP is configured to allow file uploads.
- Click on your MAMP icon;
- Click on "Open Web Start Page";
- Once the page opens, click on "php info";  You will see the contents of your php.ini file.
- Now do CTRL-F to search for "file_upload"
- Make sure it set it to "On" | file_uploads = On
- If not, go to /Applications/MAMP/bin/php/php5.6.2/conf/php.ini and make the change;

2. Create The HTML Form for Uploads.
-  RE-USE your deletesession.php and SAVE-AS "upload_form.php";
-  Next, add an HTML form to upload_form.php that allow users to choose the image file they want to upload: -->


<form action="test_uploads.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>


<!-- Some rules to follow for the HTML form above:
- Make sure that the form uses method="post"
- The form also MUST HAVE the following attribute: enctype="multipart/form-data".
- This attribute specifies which content-type to use when submitting the form
- Without the requirements above, the file upload ** WILL NOT ** work.

Other things to notice:
- The type="file" attribute of the <input> tag shows the input field as a file-select control,
  with a "Browse" button next to the input control
- The form above sends data to a file called "test_uploads.php", which we will create in a bit. -->



<!---------------------------------------- PHP script explained

NOW, let's get started with the rest of our setup...
- FIRST, create a folder called "uploads" inside "Day2/Lecture2/Activity/"
- SECOND, RE-USE your upload_form.php file ("SAVE AS" to create The Upload File PHP Script)
  Call it "test_uploads.php", adding the following code:
- The completed Upload File PHP Script "test_uploads.php" file now looks like this: -->



<!-- CREATE the target directory:
- You will need to create a new directory called "uploads" in the directory where "upload.php" file resides.
- The uploaded files will be saved there.

Set Your Variables:
- $target_dir = "uploads/" - specifies the directory where the file is going to be placed
- $target_file specifies the "path of the file" to be uploaded
- $uploadOk is checking to see if the file is a real image, already exists in the "uploads" folder, or is too big.
- $imageFileType holds the file extension of the file
- Next, check if the image file is an actual image or a fake image
-->


<?php


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


// Setup Conditional to Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".<br><br>";
        $uploadOk = 1;
    } else {
        echo "File is not an image..<br><br>";
        $uploadOk = 0;
    }
}

/* Now we can add some restrictions:
- First, we will check if the file already exists in the "uploads" folder.
- If it does, an error message is displayed, and $uploadOk is set to 0: */

if (file_exists($target_file)) {
    echo "Sorry, file already exists. Please try another one.<br><br>";
    echo "<a href='http://localhost:8888/SSL-1506_MyClassActivities/Day2/Lecture2/Activity/upload_form.php'>Try again?</a><br><br>";
    $uploadOk = 0;
}


/* Check the File Size (To Limit File Size)
- The file input field in our HTML form above is named "fileToUpload".
- Now, we want to check the size of the file.
- If the file is larger than 500kb, an error message is displayed, and $uploadOk is set to 0: */


if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.<br><br>";
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


// ---------------------------------------------UPLOAD CHECK:
// If $uploadOk is set to 0, there was an error during one of the earlier restriction checks;
// If there was an error (uploadOK = 0), let the user know their file was NOT uploaded!!!
// Otherwise, go ahead and move the target file to the right upload location & let the user know it worked :-)
// If the file is valid, it will be moved to the filename given by destination.


/* OLD VERSION of "UPLOAD CHECK"
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.<br><br>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br><br>";
        echo "<div class=imageDiv><p><b>Avatar:</b><br><img src='".$target_file."' /></p></div>";
        echo $target_file;
    } else {
        echo "Sorry, there was an error uploading your file.<br><br>";
    }
}
?>
*/



// NEW VERSION of "UPLOAD CHECK" (----with ADDED Thumbnail enhancement)

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.<br><br>";
    // if everything is ok, try to resize to thumbnail & upload file
} else {
    // removed directory cause its above
    $username = $_POST['user'];                   // use the username to customize thumbnail later..
    $target_file = $target_dir . basename($_FILES['fileToUpload']['name']);

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $profilePhoto = makeThumbnail($target_fil, $target_dir, $username);

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

<!--Complete PHP Filesystem Reference:
For a complete reference of filesystem functions, go to PHP.net. -->




<H3>PASSWORD ENCRYPTION - HASHING & SALTING</H3>

<!---------------------------------------- PASSWORD SECURITY & ENCRYPTION  -------------------------
- Hashing is the term for the process of taking a string of data and apply a mathematical function to it to
  produce a unique string of output.  Hashing is often used for encryption or password hashing.
- A hash is a one-way cryptographic algorithm to mathematically compute an input to a fixed-length result.
- This means you can not use the result from the hash to recreate the data.
- In PHP 5.1.2, we got a new function called hash, which allows us to tell hash what algorithm you want to use to
   encrypt passwords; This way we don't have to have a function for every single one under the sun.
- Hashes are quickly computed with minimal processing resources (making them fast), and are often used as a
  checksum to compare two larger values.

We will apply a hash algorithm to a password, to generate an encrypted string:
- Knowing an encrypting hash won't give away the password and the original password can't be reverse engineered
  even with lots of computing power.
- The hash that it generates for each password will be unique, so that it can only be recreated by using the
  same password with the same hashing algorithm.
- The only way to have a password match will be to know the original password and that's what we want.
- The MOST important rule about passwords is never ever, ever store passwords in the database as plain text
- Always encrypt them. If they're in plain text, then anyone who gains access to your database will have every
  user's password. And its not just hackers on the outside that you have to be concerned about.


**** WE WILL FOCUS ON 2 HASHING ALGORITHMS IN THIS CLASS.  Quick Comparisons... ****
-- SHA1 returns a larger result than MD5, so its more secure, but much slower processing, which is GOOD because it
pauses to compare and slows down any hackers trying multiple passwords at one time.

-- MD5 is relatively secure, but older and there are some security flaws.
Overall, its faster & better for applications that don't need extreme security.

MD5 - 32 character hexadecimal number (0-9, A-F)
- MD5 stands for "Message-Digest algorithm 5" and is one of the algorithms we will use to encrypt passwords
http://us1.php.net/manual/en/function.md5.php
http://www.faqs.org/rfcs/rfc1321.html

SHA1 - 40 character hexadecimal number (0-9, A-F)
- SHA1 stands for Secure Hash Algorithm 1
http://us1.php.net/manual/en/function.sha1.php

-Blowfish (using Crypt) is another highly secure algorithm, but you will need to research this one on your own.


Therefore, a string of “apple” could be hashed using MD5 to generate a checksum of
“1f3870be274f6c49b3e31a0c6728957f”

Notice the result is a value with hexadecimal numbers (0-9, A-F)

**** SYNTAX for both md5 and sha1 is similar, as follows -->

<?
$str = 'apple';
if (md5($str) === '1f3870be274f6c49b3e31a0c6728957f') {
    echo "Would you like a green or red apple?<br><br>";
}

if (sha1($str) === 'd0be2dc421be4fcd0172e5afceea3970e2f3d940') {
    echo "Would you like a green or red apple?";
}
?>

<!----------------------------------------  HACKING HASHED PASSWORDS

While hashing is a one-way encryption method (---meaning it cannot be reversed or “unencrypted” just by
reversing the algorithm), it is possible to guess combinations until you find a match with the following method...

The easiest way to guess a hashed password is to take the following steps:
1.  Use a pre-built dictionary,
2.  Hash the words and store them in a database,
3.  Search by hashed value for a match.  (These are often called Rainbow Tables.)

For example, try going to https://crackstation.net/.  How long does it take to find these hashed values? 

md5 - '1f3870be274f6c49b3e31a0c6728957f'
sha1 - 'd0be2dc421be4fcd0172e5afceea3970e2f3d940'

- Because hash values can be guessed by hackers (---imagine looping through all possible combinations until you
  find one that works), they are generally considered insecure (when used alone) for storing passwords.


---------------------------------------- SALTING for ADDED SECURITY
- Salting adds an additional value to the hashed password that is harder for a attempted hack, which
  ultimately makes hashes more secure.
- Basically, we concatenate the SALT to a string we need to HASH. -->

<?
$str = 'apple';
$salt = 'FIAsecretepassword';

//without salting
if (md5($str) === '1f3870be274f6c49b3e31a0c6728957f') { echo "valid user";}

//with salting
if (md5($salt.$str)==='asda3870be2345kf431a0c6728957f') {echo "valid user";}
?>

<!--------------------------------------- Password Hashing API for PHP 5.5 +
* With PHP v5.5, we got an even stronger hash method with password_hash()
* password_hash() creates a new password hash using a stronger one-way hashing algorithm.
* For this class, we just want to hash our password using the current DEFAULT algorithm.
* This is presently BCRYPT, which will produce a 60 character result.
*
* Beware that DEFAULT may change over time, so you would want to prepare ahead of time
* by allowing your database storage to expand past 60 characters (---255 would be good).

SYNTAX:
echo password_hash("rasmuslerdorf", PASSWORD_DEFAULT) . "\n";

The above example will output something similar to:
$2y$10$.vGA1O9wmRjrwAVXD98HNOgsNpDczlqm3Jq7KnEd1rVAGv3Fykk1a


************ LAB 1 & 2 PREP *********
-  We won't use MySQL DB to store passwords until Lab #3;
-  However, for Lab 2 just be sure to show that you need to at least display the hashed/salted password.
-  Let's step thru a simple EXAMPLE of how to use hashed/salted passwords:


STEP #1:  Go back to your upload_form.php and add an input
          field for "password" as follows: -->


Username <input type="text" name="user" value="" required /></br>
Password: <input type="password" name="password" value='' required /></br>



<!--STEP #2:  NEXT, add this code below the HTML formatting,
              but at the top of your 2nd PHP Script tag in TEST_UPLOADS.php -->

<?

// ADD this to the top of your test_uploads.php processing script -->
// Read in all form fields into an "associate" array & return the array for processing output
function makeArray(){
    $salt = "SuperFIASaltHash";
    $epass = md5($_POST['password'].$salt);
    $euser = $_POST['user'];
    return array("USER NAME" => $euser, "Hashed PASSWORD with Dash of Salt" => $epass);
}

?>


<!-- STEP 3:
In TEST_UPLOADS.php, ADD this code RIGHT BEFORE the conditional that "Checks if $uploadOk is set to 0" -->

<?

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


?>



<H3>CAPTCHA VERIFICATION</H3>

<!-------------------------------------------------- WHAT IS CAPTCHA?
- The term CAPTCHA (stands for "Completely Automated Public Turing Test To Tell Computers and Humans Apart") was
  coined in 2000 by Luis von Ahn, Manuel Blum, Nicholas Hopper and John Langford of Carnegie Mellon University.
- CAPTCHA is a method used to verify that a human is interacting with your website, and to avoid automated “bot”
  submissions from scripts or attempts to SPAM.

Let's create an example:


<!------ STEP #1:  Add a Captcha field to your upload_Form.php
                   Make sure you point to captcha.php (----see below)
                   Make sure captcha.php points to your /file/dictionary.txt -->


<label for="captcha">Captcha Verify:</label><input id="captcha" /><br>
<img src="captcha.php" />


<!----- STEP #2:  Go to your PHP form processor - upload_form.php
               Add a session_start() at the top of upload_form.php
               Copy the code below -->

<?php
ini_set('session.gc_maxlifetime', 86400); //controls the max amount of time for sessions
//Set at 86,400 seconds, a user should be able to browse your application for 24 hours before
// needing to re-authenticate their session.
session_start();
?>



<!------ STEP #3: Create a new file called: captcha.php -->


<?php

ini_set('session.gc_maxlifetime', 86400); //controls the max amount of time for sessions
//Set at 86,400 seconds, a user should be able to browse your application for 24 hours before
// needing to re-authenticate their session.
session_start();
session_regenerate_id();

$file =

// $fileArray = preg_split('/\s+/', $file);
// echo $fileArray[0];
$length =
$random =
// echo $file[$random];
$_SESSION['captcha'] =
session_write_close();


function msg($msg){
    $container =
    $black =
    $white =
    $font = '/Library/Fonts/Arial.ttf';
    imagefilledrectangle($container, 0, 0, 250, 170, $black);

    $px  = (imagesx($container) / (strlen($msg)/1.15));
    $py  = (imagesy($container) / 3.5);


    imagefttext($container, 28, -27, $px, $py, $white, $font, $msg);
    header("Content-type: image/png");
    imagepng($container, null);
    imagedestroy($container);
}

msg($file[$random]);


?>


<!----- STEP #4:  Go to your PHP form processor - test_uploads.php
                  Add a session_start() at the top of test_uploads.php
                  Copy the code below  -->

<?php
ini_set('session.gc_maxlifetime', 86400); //controls the max amount of time for sessions
//Set at 86,400 seconds, a user should be able to browse your application for 24 hours before
// needing to re-authenticate their session.
session_start();
?>


<!----- STEP #5:  Go to your PHP form processor - test_uploads.php
                  Place the code below at the TOP of the script -->

<?

// Store Captcha input in Session Variable for Verification Later;
if(!array_key_exists('captcha',$_SESSION)) {
    echo "Yes, captcha exist!";
};
$captchaVerify = $_SESSION['captcha'];
$captchaInput = $_POST['captcha'];
// end Captcha Overview; //

?>


<!----- STEP #6:  Stop your form from processing if CAPTCHA is incorrect - Update test_uploads.php
                  ADD the following conditional to the AFTER the "FUNCTION makeArray" in your script test_upload.php
                    Be sure to add a extra closed } at the bottom of the current script -->

<?

// DON'T DO ANYTHING UNLESS THE CAPTCHA WORKS!
if ($captchaInput == $captchaVerify) {

?>

<!-- NEXT, ADD ANOTHER ELSE AT THE BOTTOM OF THE NEW "IF" CONDITIONAL (we just added above); -->
<?

echo "Sorry, there was an error... there was a problem with your captcha input.<br><br>";
echo "You may have entered the wrong word... or you did not pass the Human Check (Captcha).  Please try again...<br><br>";
echo "<a href='http://localhost:8888/SSL-1506_MyClassActivities/Day3/Lecture3/Activity/upload_form.php'>Try again?</a><br><br>";

?>



<!--
For more on CAPTCHA, check out http://www.captcha.net/ or
For more on image creation, see PHP reference: http://us3.php.net/manual/en/book.image.php-->



<!--****************************** LAB 3 PREP *************************** -->

<H3>CREATING DATABASE APPS with PDO</H3>

<!--
PHP 5 and later can work with a MySQL database using either:

   1.  MySQLi extension (the "i" stands for improved)
   2.  PDO (PHP Data Objects)

Comparing MySQLi or PDO?
- Both MySQLi and PDO have their advantages
- PDO will work on 12 different database systems, where as MySQLi will only work with MySQL databases.
- So, if you have to switch your project to use another database, PDO makes the process easy. You only have to
  change the connection string and a few queries. With MySQLi, you will need to rewrite the entire code -
  queries included.
- Both are object-oriented, but MySQLi also offers a procedural API.
- Both support Prepared Statements. Prepared Statements protect from SQL injection, and are very important
  for web application security.

PDO is what we will use in SSL.  So what is PDO?
- The PHP Data Objects (PDO) extension defines a lightweight, consistent interface for accessing databases in PHP.
- PDO provides a data-access abstraction layer, which means that, regardless of which database you're using, you use
   the same functions to issue queries and fetch data. PDO does not provide a database abstraction; it doesn't rewrite
   SQL or emulate missing features.
- A data-access abstraction layer makes it easier to connect to multiple types of databases regardless of their
  specific requirements - PDO is a “wedge” to provide unified access. -->



<!-- PDO & DSN
- How do we communicate with the database?  Through PDO & DSN (Data Source Name)
- connection string that tells PDO the type of database to access, where to access it, and other parameters.

Here are the MAIN steps for setting up PDO & DSN:

-----  STEP #1.  CONNECT:  Establish your database connection using the steps above;

<?
$user="root";
$pass="root";
$dbh = new PDO ('mysql:host=localhost;dbname=SSL;port=8889', $user, $pass);
?>

- Once $dbh is instantiated, we can the pass data to/from the database.
- When you’re finished with the database connection, release the object to free resources on the server side.
- Besides making unified references to a database through PDO, it also uses parameters for increased security
  against things such as SQL injection.
- It also allows for making multiple SQL calls but with different values (for instance, inserting
  multiple rows at a time).
- Once we're done establishing & using the connect, we can close it using: $dbh = null;

-----  STEP #2:  PREPARE & BIND:
                 Write your regular SQL statement, then replace the values with parameters.
                 This can be done either as ordered positioned placeholders (using a “?” as a placeholder),
                 or as named placeholders (using “:placeholdername”). It is recommended to use named placeholders.
                 The prepare() method prepares a SQL statement for use by the PDO object.

                - Use placeholders in the SQL statement itself, in the example :calories
                - Bind EACH placeholder parameter to a variable, in the example $calories -->

                <?
                        $calories = 150;
                        $color = 'red';

                        $sth = $dbh->prepare('SELECT name, color, calories
                                              FROM fruit
                                              WHERE calories < :calories AND color = :color');

                        $sth->bindParam(':calories', $calories, PDO::PARAM_INT);


// STEP #3:  EXECUTE - Execute runs the SQL statement.
                       // Parameters can passed as a single array at time of execution.
                       // Execute a prepared statement by passing an array of insert values -->

                        $sth->execute(array(':calories' =>$calories, ':color' => $color));


//  STEP #4:  FETCH - fetchAll retrieves the records as an key/value array and stores in $result -->

                        $result = $sth->fetchAll();
                        print_r($result)


?>



<!------------------------- DATABASE LOGIN SETUP

Going back to our upload_form.php and test_uploads.php, we will now create 3 php files for testing our code.

1. First, let's make sure we can add users to the "users" database

   Update your table "users" with the following fields:
   userid
   username
   password
   profilePhoto

2. Update your test_uploads.php code with the following code. --->


<!--- NOW, update your test_uploads.php with the the following database PDO connection
      This goes inside the conditional     if ($uploadOk == 0) {
      Under the "ELSE" -->

<?

// Connect to database
$user = 'root';
$pass = 'root';
$dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

$salt = "SuperFIASaltHash";
$epass = md5($_POST['password'] . $salt);

?>

<!-- In the same block of code, but Right before the LAST "else", copy/paste the following...
     This should be the last thing under the conditional that looks like this....
     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {   -->
<?

$stmt = $dbh->prepare("insert into users (username, password, profilePhoto)
    values(:username, :password, :profilePhoto)");
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $epass);
$stmt->bindParam(':profilePhoto', $profilePhoto);
$stmt->execute();

?>



<!--  3. Add a 2nd form to upload_form.php with username & password; Point the action of the 2nd form to login.php

<!----NOW, add 2nd form inside upload_form.php ----------->

<form action="login.php" method="post">
    <fieldset>
        <legend>Ready to Login?</legend>

        <p>
            <label for="username_li">Username:</label><input id="username_li">
        </p>
        <p><label for="password_li">Password:</label><input id="password_li">			</p>
        <p class="rel">
            <button type="submit" class="right">Submit</button>
        </p>
    </fieldset>
</form>


<!-- 4. Create new file called login.php with processing code for username & password -->

<!----------- Login.php ; Authentication Login Username & Password
              Let's see if we can process the 2nd form ----------->

<?
/*

// Setup DB Username & Password
$user =
$pass =
$salt =

// Establish PDO & DSN Connection to Database
$dbh =


// Test if 2nd form has the empty fields; If not, grab the username & password & bind to DB parameters
if ($_POST['username_li'] != null && $_POST['password_li'] != null) {
    $usernameInput =
    $passwordInput =

    $sth = $dbh->prepare('select profilePhoto, username, password, userid from users
                    where username = :username and password = :password');
    $sth->bindParam(':username', $usernameInput);
    $sth->bindParam(':password', $passwordInput);
    $sth->execute();
    $result = $sth->fetchAll();

    // If the result of the 1st array item contains a 'userid', let the user know they have successfully logged in.
    if (isset($result[0]['userid'])) {

        $_SESSION['userid']
        echo "Congratulations!!! You have successfully logged in.  Enjoy :-)";
        echo "<a href='http://localhost:8888/SSL-1506_MyClassActivities/Day3/Lecture3/Activity/upload_form.php'>Go Back?</a><br><br>";

        // Use userid to look up username & profile photo
        foreach ($_SESSION['userid'] as $row) {

            // Prepare/Bind/Execute and grab results to echo $row['userid']. "<br>";
            $sth = $dbh->prepare('select username, profilePhoto from users where userid = :userid');
            $sth->bindParam(':userid', $row['userid']);
            $sth->execute();
            $result = $sth->fetchAll();

            // Optional Analysis:
            // print_r($result[0]['username']);

            // Store each row found in the $results
            echo "<p>";
            $userid =
            foreach ($result as $row) {
                $photo = $row['profilePhoto'];
                $username = $row['username'];
            };

            // echo out the profile photo and give user an option to logout.
            echo "<a href=\"profile.php\"><img src=\"uploads/".$photo."\" class=\"right userPhoto\"/></a><br>";
            echo "</p>";
            echo "<ul class=\"right userSection\">
                    <li>Your Username is:  ".$username."</li>
                    <li><a href=\"logout.php\">logout</a></li>
                    </ul>";
        };

    } else {
        // else let user know that their login failed!
        echo "So Sorry - NO Login Success.  Please try again...";
        echo "<a href='http://localhost:8888/SSL-1506_MyClassActivities/Day3/Lecture3/Activity/upload_form.php'>Go Back?</a><br><br>";

    }

}
*/

?>


<!----------- Step 5. Logout.php ----------->

<?php

ini_set('session.gc_maxlifetime', 86400);

session_start();

session_destroy();

header("Location: upload_form.php");

?>




<!--
For more on how PDO, MySQL, and PHP work together + other Database Concepts,
check out http://php.net/manual/en/book.pdo.php-->


</body>
</html>