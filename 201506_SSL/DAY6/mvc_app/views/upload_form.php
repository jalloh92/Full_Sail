<?
/*
 *	==================================
 *	PROJECT:	SSL - Lab 4 & 5 Prep
 *	FILE:		views/uploadform.php
 *	AUTHOR: 	Fialishia O. (Updated 1504)
 *	CREATED:	12/03/2014
 *	==================================
 */
?>

<form id="registerForm" enctype="multipart/form-data" action="index.php/?action=signup" method="post" >
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload" /><br>
    Username <input type="text" name="user" value="" /><br>
    Password: <input type="password" name="password" value="" /><br>

    <label for="captcha">Captcha Verify:</label><input id="captcha" type="text" name="captcha" /><br>
    <img src="captcha.php" />

    <input type="submit" value="Upload Image" name="submit">
</form>
<form id="loginForm" action="index.php/?action=login" method="post">
    <fieldset>
        <legend>Ready to Login?</legend>

        <p>
            <label for="username_li">Username:</label><input id="username_li" type="text" name="username_li">
        </p>
        <p><label for="password_li">Password:</label><input id="password_li" type="password" name="password_li"></p>
        <p class="rel">
            <button type="submit" class="right">Submit</button>
        </p>
    </fieldset>
</form>
