<?
session_start();
?>
<!--
// filename:  update_form.php
// directed from: ($_GET["action"]=="update") (#8 on controllers/Action_Controller.php)
// $data = $employees->getEmployee($_SESSION["empId"]);
// method="POST"
// action ="?action=editAction" with empId (#9 on controllers/Action_Controller.php)
-->

<div class="form container">
    <h3>Update Profile Information</h3>

<?php

    //var_dump($results);
    foreach($results as $emp){

?>
    

    
    <form action="?action=editAction" method="POST" >
        
        <input type="text" name ="empFName" value="<?=$emp["empFName"];?>"/></br>
        <input type="text" name ="empLName" value="<?=$emp["empLName"];?>"/></br>
        <input type="text" name ="empPhone" value="<?=$emp["empPhone"];?>"/></br>
        <input type="text" name ="empEmail" value="<?=$emp["empEmail"];?>"/></br>
        <input type="hidden" name="empId" value="<?=$emp["empId"];?>"/>
    	<input type = "submit"/>
    </form>
       
<?

} // closes foreach statement

?>

</div><!-- closes contianer -->