<?
session_start();
?>
<!--  
Filename:  signinForm.php
Description:  This file takes user input to verify username & password against database
A user can access this from home page and from the nav bar (not logged in)
-->


<div class=" form container">
    <h2>Sign In</h2>

    <form action="?action=signinAction" method="POST">
        <input type="text" name="uName" placeholder="Username"/></br>
        <input type="password" name="password" placeholder="Password"/></br>
        <input type="submit"/>
    </form>

    <div id="spacer"></div>
</div><!-- closes container --> 
