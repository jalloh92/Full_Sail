<?php

// Name:  Kelly Rhodes
// Server Side Languages
// June 15, 2015
//
// API (XML - JSON)
// Applicaiton programming interfaces.  This is how one application can talk to another.
// Facebook, Ebay, Amazon, Google, etc...

// Nested Arrays to create a JSON file

header("Content-type:application/json");				// tells browser contents of page is JSON

/*
$jsonfile = '{';										// open file with curly brace
$jsonfile .= '"feeds":[';								// uses single and double quotes for Primary
$jsonfile .= '{"from":"joe","message":"hello"},';		// create 1st array member
$jsonfile .= '{"from":"mike","message":"hello"}';		// use comma at end of first array memeber
$jsonfile .= ']';										// close out elements
$jsonfile .= '}';										// close out file with curly brace
*/

$jsonfile = array("feeds"=>array(array("from"=>"joe", "messages"=>"hello"),
								 array("from"=>"mike","message"=>"hello")));

// echo $jsonfile;										// echo out the variable $jsonfile

$myjson = json_encode($jsonfile);						// store result in varialbe and create JSON

file_put_contents('myjson.json', $myjson);				// save the file "myjson.json" locally

?>