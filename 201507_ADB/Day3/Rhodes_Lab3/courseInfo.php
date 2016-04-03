<?php

/*
Description: 	Returns one document that matches the course abbreviation
Inputs:	Course Abbreviation (course)
URL:	/courseInfo.php
*/

// Set debug to show errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Pull the info from the GET request
$course = $_GET['course'];

// Connect to MongoDB
$username = 'adbOwner';
$password = 'adb';
$mongo = new MongoClient("mongodb://${username}:${password}@localhost", array("db" => "adb"));

// Connect to the ADB database, courses collection.
$mb = $mongo->selectDb("adb")->selectCollection("courses");

// Find the documents in the courses collection where the abbreviation matches the one from the GET request
$records = $mb->find(array('abbreviation'=>$course));

// var_dump(iterator_to_array($records));

// Create an array to be converted to JSON
$output = array();

// Loop through all documents returned from the find()
foreach ($records as $rec) {
	// Create an array and push values for record into array
	$p = array();
	$p['abbreviation'] 	= $rec['abbreviation'];
	$p['name'] 			= $rec['name'];
	$p['id'] 			= $rec["_id"];
	$p['degree'] 		= $rec["degree"];
	$p['creditHours']	= $rec["creditHours"];	
}

// assign values to output array from p array
$output = array(
  'courseInfo' => array(
		'_id' 			=> 	$p['id'],
		'name' 			=>	$p['name'],
		'degree' 		=>	$p['degree'], 
		'abbreviation' 	=>	$p['abbreviation'],
		'creditHours'	=>	$p['creditHours']
	),
  'success'	=> 1,
  'msg'		=> "Woohoo!"
);

	// John's way:
	// Don't need to do what I did below...
	// $output[$p] = $p
	// $output['success'] = 1;
	// $output['msg'] = "";


// json_encode converts an array to JSON format
echo json_encode($output);
?>