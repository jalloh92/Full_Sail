<?
session_start();
// var_dump($_SESSION);
?>
<!--
Filename:  profile.php
Once a user has sucessfully created an account or logged in,
they can access their profile page which will allow them
to update their info, see the full employee directory or log out
directed from:  $_GET["action"]=="directory" (#6 on controllers/Action_Controller.php)
-->
<? 
foreach($results as $employee){
?>

<div class="container">

    <h2>Profile Page</h2>
        
    <p>First Name:  <?=$employee["empFName"];?></p>
    <p>Last Name:  <?=$employee["empLName"];?></p>
    <p>Phone Number:  <?=$employee["empPhone"];?></p>
    <p>Email: <?=$employee["empEmail"];?></p>
    <p>Username: <?=$employee["username"];?></p>

    <a class='btn btn-primary' role='button' href='?action=update'>Update</a>
	<a class='btn btn-primary' role='button' href='?action=directory'>Directory</a> 
	<a class='btn btn-primary' role='button' href='?action=logout'>Log Out</a>  

	<a class='btn btn-primary' role='button' href='?action=delete'>Delete Account</a>  
       

</div><!-- closes contianer -->

<?

} // closes foreach

?>






</div>