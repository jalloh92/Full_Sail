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
    // function get_data() to store the form data from the $_POST superglobal into an associative array, and return that array back 
    function get_data(){
        
        // initialize empty array
        $data = array();

        // foreach loop goes through the name of the field ("$key") and gets the user input ("$value")
        // stores the data into the associative array data
        foreach ($_POST as $key => $value) {
                $data[$key]= "$value";
        }

        return $data;
    } // closes get_data()

    // collect value of input field
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    
        // invoke the function get_data(), store results into my_data
        $my_data = get_data();
        
        // set up the table
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
 
        // Check to see if user is from FL or NY
        if ($my_data['State'] == "FL") {
            echo "<div class='alert alert-info' role='alert'><h2>You're from the Sunshine State!<h2></div>";
        } else if ($my_data['State'] == "NY"){
            echo "<div class='alert alert-info' role='alert'><h2>You're from the Empire State!<h2></div>";
        }

} // closes if ($_SERVER["REQUEST_METHOD"] == "POST") 
?>

    </div><!-- closes container -->

</body>
</html>