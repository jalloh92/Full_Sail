<?php

// Name:  Kelly Rhodes
// Server Side Languages
// June 15, 2015
//
// API (XML - JSON)
// Application programming interfaces.  This is how one application can talk to another.
// Facebook, Ebay, Amazon, Google, etc...

// Make an XML Feed with MySQL using PHP

// Connect to database, grab userid, username, & profilePhoto for each individual user
$dbh = new PDO("mysql:host=localhost;port=8889;dbname=ssl", "root", "root");
$sth = $dbh->prepare('SELECT userid, username, profilePhoto FROM users');
$sth->execute();

// Put results from database into var called $results
$result = $sth->fetchAll();

// Create an xml document, $xmlfile
header("Content-type:application/xml");
$xmlfile = '<?xml version="1.0" encoding="UTF-8"?>';

// Open parent element <users>
$xmlfile .= '<users>'; 

// Loop over each user in the database; put userid, username & profilePhoto into child elements
foreach($result as $user){

	$xmlfile .= '<user>';											// Open child element
	$xmlfile .= "<uid>" . $user["userid"] . "</uid>"; 				// Value of the child node
	$xmlfile .= "<uname>" . $user["username"] . "</uname>"; 		// Value of the child node
	$xmlfile .= "<uphoto>" . $user["profilePhoto"] . "</uphoto>"; 	// Value of the child node
	$xmlfile .= '</user>';											// close child node

};

// Close parent element <users>
$xmlfile .= '</users>';												// End parent element

// Echo the results of $xmlfile to browser
echo $xmlfile;														// Display to browser

// Instantiate / create a new object with DOMDocument; XML version
$dom = new DOMDocument("1.0");										
$dom->loadXML($xmlfile);											// Use PHP method called "loadXML" to load the current file results
$dom->save("usersxml.xml");											// save the file under the current path and call it "usersxml.xml"

?>