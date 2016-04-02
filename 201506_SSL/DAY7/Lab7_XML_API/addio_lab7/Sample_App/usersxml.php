<?php

// Name:  Kelly Rhodes
// Server Side Languages
// June 15, 2015
//
// API (XML - JSON)
// Applicaiton programming interfaces.  This is how one application can talk to another.
// Facebook, Ebay, Amazon, Google, etc...

// Make an XML Feed with MySQL using PHP

$dbh = new PDO("mysql:host=localhost;port=8889;dbname=ssl", "root", "root");
$sth = $dbh->prepare('SELECT userid, username, profilePhoto FROM users');
$sth->execute();

$result = $sth->fetchAll();

header("Content-type:application/xml");
$xmlfile = '<?xml version="1.0" encoding="UTF-8"?>';

$xmlfile .= '<users>'; 												// Start Element


foreach($result as $user){

	$xmlfile .= '<user>';											// Open child element
	$xmlfile .= "<uid>" . $user["userid"] . "</uid>"; 				// Value of the child node
	$xmlfile .= "<uname>" . $user["username"] . "</uname>"; 		// Value of the child node
	$xmlfile .= "<uphoto>" . $user["profilePhoto"] . "</uphoto>"; 	// Value of the child node
	$xmlfile .= '</user>';											// close child node

};

$xmlfile .= '</users>';												// End parent element

echo $xmlfile;														// Display to browser

$dom = new DOMDocument("1.0");							// Instantiate / create a new object with DOMDocument; XML version
$dom->loadXML($xmlfile);								// Use PHP method called "loadXML" to load the current file results
$dom->save("usersxml.xml");								// save the file under the current path and call it "myxml.xml"

?>