<?php
header('Content-type: text/html');
if ($_GET["user"] === "user" && $_GET["pw"] === "password" ){
  echo "Welcome To Ajax!";
  return;
}
header("HTTP/1.0 400 Login Failed");
echo "Invalid Credentials.";
?>