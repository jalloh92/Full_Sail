<?php
ini_set('session.gc_maxlifetime', 86400); //a user should be able to browse your application
// for 24 hours before needing to re-authenticate their session.
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

    <div class = 'container'>
        <h2>Your Information:</h2>
        



<?php
    // collect value of input field
        if ($_SERVER["REQUEST_METHOD"] == "POST") { 

        // verify that captcha was sent with session variables
        if(array_key_exists('captcha',$_SESSION)) {
        //echo "Yes, captcha exist!";
        };
        $captchaVerify = $_SESSION['captcha'];
        $captchaInput = $_POST['captcha'];
        // end Captcha Overview; //

        // DON'T DO ANYTHING UNLESS THE CAPTCHA WORKS!
        if ($captchaInput == $captchaVerify) {

            // function get_data() to store the form data from the $_POST superglobal into an associative array, and return that array back 
            function get_data(){

                $data = array();
                
                // ****************** Hash Password via md5 & Add Salt ************************
                // Read in all form fields into an "associate" array & return the array for processing output
            
                $salt = "kellyssalthash";
                $epass = md5($_POST['Password'].$salt);
                foreach ($_POST as $key => $value) {
                    $data[$key]= "$value";
                }
                $data["Hashed PASSWORD with Dash of Salt"]  = $epass;
                return $data;            

            } // closes get_data()
            
        
            // invoke the function get_data(), store results into my_data
            $my_data = get_data();

            // ****************** Image Upload Code ************************
            // variables for image uplaod
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

            /* Restrictions on image uploads:
            - Check if the file already exists in the "uploads" folder.
            - If it does, an error message is displayed, and $uploadOk is set to 0: */
            if (file_exists($target_file)) {
                echo "Sorry, file already exist.  Please try another one.<br><br>";
                echo "<a href='http://localhost:8888/DAY2/Lab2/rhodes_app/'>Try Again?</a><br><br>";
                $uploadOk = 0;
            }

            /* Check the File Size (To Limit File Size)
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
            
            function makeThumbnail($newfile, $where, $username) {
                // Setup the new file name
                $filename = $newfile;
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES['fileToUpload']["name"]);
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                // Set a maximum height and width
                $width = 200;
                $height = 200;

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

            } // closes function makeThumbnail


            // ****************** Display Data ************************
            // set up the table display the data
            echo    "<div class='row' class='col-md-6'>
                        <table class='table'>";
                            
            // loop through array my_data and populate table
            foreach ($my_data as $key => $value) {
                
                // see if field was left empty; alert user
                if (empty($my_data[$key])){
                    
                    // message to alert user that the field is missing
                    echo "<tr class='alert alert-danger' role='alert'><td colspan='2'>" . $key . " is missing!<td></tr>";

                } else {

                    // each bit of data gets it's own row; key in 1st column, value in 2nd column
                    echo    "<tr>
                                <td class='left_data'>" . $key . ":</td>
                                <td>" . $value . "</td>
                            </tr>";

                } // closes else statement
            } // close foreach loop    

            // close the table
            echo        "</table>
                    </div>"; 

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.<br><br>";
                // if everything is ok, try to resize to thumbnail & upload file
            } else {
                // removed directory cause its above
                $username = $_POST['Username'];   // use the username to customize thumbnail later..
                $target_file = $target_dir . basename($_FILES['fileToUpload']['name']);

                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $profilePhoto = makeThumbnail($target_file, $target_dir, $username);

                    echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.<br><br>";
                    echo "<a href='http://localhost:8888/DAY2/Lab2/rhodes_app/'>Try again?</a><br><br>";
                    //echo "<div class=imageDiv><p><b>Avatar:</b><br><img src='" . $target_file . "' /></p></div>";

                    if ($imageFileType == "jpg") {
                        $thumbnail = $target_dir . $username . 'thumbnail.jpg';
                    } else if ($imageFileType == "png") {
                        $thumbnail = $target_dir . $username . 'thumbnail.png';
                    } else if ($imageFileType == "gif") {
                        $thumbnail = $target_dir . $username . 'thumbnail.gif';
                    };

                    echo "<div class=imageDiv><p><b>Avatar:</b></p><img src='" . $thumbnail . "' /><br></div>";
                    //echo $target_file;

                } else {

                    echo "Sorry, there was an error uploading your file.<br><br>";
                } // closes if-else move_uploaded_file
            } // closes if $uploadOk == 0
     
            // Check to see if user is from FL or NY, give alert
            if ($my_data['State'] == "FL") {
                echo "<div class='alert alert-info' role='alert'><h2>You're from the Sunshine State!<h2></div>";
            } else if ($my_data['State'] == "NY"){
                echo "<div class='alert alert-info' role='alert'><h2>You're from the Empire State!<h2></div>";
            }
        } else {

            echo "Sorry, there was an error... there was a problem with your captcha input.<br><br>";
            echo "You may have entered the wrong word... or you did not pass the Human Check (Captcha).  Please try again...<br><br>";
            echo "<a href='http://localhost:8888/DAY3/Lecture3/upload_form.php'>Try again?</a><br><br>";

        } // closes if-else ($captchaInput == $captchaVerify)

    } // closes if ($_SERVER["REQUEST_METHOD"] == "POST") 
?>

    </div><!-- closes container -->

</body>
</html>