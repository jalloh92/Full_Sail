<?

// How to parse XML using a url

// Load the file usersxml.xml and save into var $contents
$contents = simplexml_load_file("http://localhost:8888/DAY7/Lab7_XML_API/Sample_App/usersxml.php");

// loop through elements in local XML file
foreach($contents->user as $user){		

	echo "<ul>User Information:";
	echo "<li>User ID:" . $user->uid."</li>";			// echo out "user id" node
	echo "<li>User Name:" . $user->uname."</li>";		// echo out "user name" node
	echo "<li>User Photo:" . $user->uphoto."</li>";		// echo out "user photo" node
	echo "</ul>";

}

?>