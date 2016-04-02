<?
session_start();
?>
<!--  
Filename:  signupForm.php
Description:  This file takes user input and with addEmployeeAction from the controller
add a new employee to the database
A user can access this from home page and from the nav bar (not logged in)
-->


<div class=" form container">
    <h2>Sign Up</h2>

    <form action="?action=addEmployeeAction" method="POST">
        <input type="text" name="empFName" placeholder="First Name"/></br>
        <input type="text" name="empLName" placeholder="Last Name"/></br>
        <input type="text" name="empPhone" placeholder="Phone Number"/></br>
        <input type="text" name="empEmail" placeholder="Email"/></br>
        <input type="text" name="uName" placeholder="Username"/></br>
        <input type="password" name="password" placeholder="Password"/></br>
        <input type="submit"/>
    </form>

    <div id="spacer"></div>
</div><!-- closes container --> 
