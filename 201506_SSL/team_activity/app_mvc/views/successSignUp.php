<?
session_start();
?>
<!--
// filename:  successSignUp.php
// After succesful registration, the user will be redirected to a success page
// directed from: $_GET["action"]=="addEmployeeAction" (#2 on controllers/Action_Controller.php)
// $data is passed in:  $data = $employees->getEmployee($_SESSION["empId"]);
// users can then go to their profile, go to the employee directory or log out
-->
<? 

foreach($results as $employee){

?>

<div class="container">

    <h2>You have successfully signed up!</h2>
    <h3>Below are your account details:</h3>
        
    <p>First Name:  <?=$employee["empFName"];?></p>
    <p>Last Name:  <?=$employee["empLName"];?></p>
    <p>Phone Number:  <?=$employee["empPhone"];?></p>
    <p>Email: <?=$employee["empEmail"];?></p>
    <p>Username: <?=$employee["username"];?></p>

    <a class='btn btn-primary' role='button' href='?action=profile'>Profile</a>
	<a class='btn btn-primary' role='button' href='?action=directory'>Directory</a> 
	<a class='btn btn-primary' role='button' href='?action=logout'>Log Out</a>  
       

</div><!-- closes contianer -->

<?

} // closes foreach

?>