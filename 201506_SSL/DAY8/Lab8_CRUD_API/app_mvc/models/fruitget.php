<?php

// Filename:  fruitget.php
// Create JSON file for getting random daily fruit

// Create JSON file from MySQL
// Connect to the database
$dbh = new PDO("mysql:host=localhost;port=8889;dbname=ssl", "root", "root");
$sth = $dbh->prepare('SELECT fruitid, fruitname, fruitcolor, fruitimage FROM fruits ORDER BY RAND() LIMIT 1;');
$sth->execute();
$result = $sth->fetchAll();

// var_dump($result);

header("Content-type:application/json");
echo json_encode($result);

?>