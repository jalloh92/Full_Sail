<?php

/*
Filename:  	lab4.php
Author:  	Kelly Rhodes
Date:  		July 15, 2015

This file will transfer (grade) records between MongoDB and MySQL
using the _id (Mongo) and gradeId (MySQL) to link the files
*/

// **************************************************************************
echo "Lab4 PHP Loaded";

// Turn off memory limit
ini_set('memory_limit', '-1');

// Turn errors on
error_reporting(E_ALL);
ini_set('display_errors', 1);

// **************************************************************************

// Connect to MySQL
$dbh = new PDO("mysql:host=localhost;port=3306;dbname=adb", "adb", "adb");

// Connect to MongoDB
$username = 'adbOwner';
$password = 'adb';
$mongo = new MongoClient("mongodb://${username}:${password}@localhost", array("db" => "adb"));

// Connect to the Mongo ADB database, grades collection.
$mb = $mongo->selectDb("adb")->selectCollection("grades");

// **************************************************************************

// Find all of the documents in the grades collection, order by id
$mongoRecords = $mb->find()->sort(array('_id'=>1));

// var_dump(iterator_to_array($mongoRecords));

// create an object to hold info from Mongo documents
$mongoObj = new StdClass;

// Loop through all documents returned from the find()
foreach ($mongoRecords as $rec) {

	// Pull the info from MongoDB and place into mongoObj
	$mongoObj->gradeId 		= $rec["_id"];
	$mongoObj->classAbbr 	= $rec["classAbbr"];
	$mongoObj->studentId 	= $rec["studentId"];
	$mongoObj->semester 	= $rec["semester"];	
	$mongoObj->grade 		= $rec["grade"];
	
	// check MySQL that a record with the same gradeId exists in MongoDB
	$sth = $dbh->prepare('SELECT * FROM grades WHERE gradeId = :gi;');
	$sth->execute(array(':gi'=>$mongoObj->gradeId));
	$sqlMatch = $sth->fetchAll();

	// if a $sqlMatch exists...
	if($sqlMatch) {

		// echo "There was a match!";
		// var_dump($sqlMatch);

		// Need to check to see if any values need updating & if so, update the values
	            
            if (($mongoObj->classAbbr != $sqlMatch[0]['classAbbr']) || ($mongoObj->studentId != $sqlMatch[0]['studentId']) || ($mongoObj->semester != $sqlMatch[0]['semester']) || ($mongoObj->grade != $sqlMatch[0]['grade'])){

            	echo "****** NOT ALL FIELDS MATCH! *******";
                
                // Update the record into the MySQL table
				$sth = $dbh->prepare('UPDATE grades set classAbbr = :ca, studentId = :si, semester = :s, grade = :g WHERE gradeId = :gi');
				$sth->execute(array(":gi"=>$mongoObj->gradeId, ":ca"=>$mongoObj->classAbbr, ":si"=>$mongoObj->studentId, ":s"=>$mongoObj->semester, ":g"=>$mongoObj->grade));

            } // closes if statement
            
        
	} else {

		echo "****** SQL MATCH TO MONGO DOES NOT EXIST! *******";

		// Insert the record into the MySQL table
		$sth = $dbh->prepare('INSERT INTO grades (gradeId, classAbbr, studentId, semester, grade) values (:gi, :ca, :si, :s, :g)');
		$sth->execute(array(":gi"=>$mongoObj->gradeId, ":ca"=>$mongoObj->classAbbr, ":si"=>$mongoObj->studentId, ":s"=>$mongoObj->semester, ":g"=>$mongoObj->grade));
		
	} // close if / else statement


} // close foreach loop

// **************************************************************************

// Pull ALL the records in the mySQL grades database
$sth = $dbh->prepare('SELECT * FROM grades;');
$sth->execute();
$allSqlResults = $sth->fetchAll();

// Loop through all the sql records
foreach($allSqlResults as $singleSqlResult){

	$sqlGradeId = (int)$singleSqlResult['gradeId'];
	$sqlClassAbbr = $singleSqlResult['classAbbr'];
	$sqlStudentId = $singleSqlResult['studentId'];
	$sqlSemester = $singleSqlResult['semester'];
	$sqlGrade = $singleSqlResult['grade'];

	$mongoMatch = "";
	$mongoQuery = array('_id' => $sqlGradeId);

	// check to see if any SQL records do not exist in Mongo DB
	$mongoMatch = $mb->find($mongoQuery);
	
	// var_dump(iterator_to_array($mongoMatch));
	// var_dump($mongoMatch->count());

	$mongoMatchTrue = $mongoMatch->count();
	// echo $mongoMatchTrue;

    if(!$mongoMatchTrue){

		echo "****** MONGO MATCH TO SQL DOES NOT EXIST! *******";
		// echo $sqlGradeId;

		// insert record into Mongo database
		$document = array( "_id" => $sqlGradeId, "classAbbr" => $sqlClassAbbr, "studentId" => $sqlStudentId, "semester" => $sqlSemester, "grade" => $sqlGrade );
		$mb->insert($document);

	} // closes if / else statement 
	
	
} // closes foreach loop

?>