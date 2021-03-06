<?php

// Name:  Kelly Rhodes
// Server Side Languages
// June 15, 2015
//
// API (XML - JSON)
// Applicaiton programming interfaces.  This is how one application can talk to another.
// Facebook, Ebay, Amazon, Google, etc...

// Create JSON file from MySQL

$dbh = new PDO("mysql:host=localhost;port=8889;dbname=ssl", "root", "root");
$sth = $dbh->prepare('SELECT username, password FROM users');
$sth->execute();

$result = $sth->fetchAll();

/*
foreach($result as $user){

	echo $user["username"]."</br>";
}
*/

header("Content-type:application/json");
echo json_encode($result);

?>