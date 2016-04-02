<?

// Name:  Kelly Rhodes
// Server Side Languages
// June 15, 2015
//
// API (XML - JSON)
// Applicaiton programming interfaces.  This is how one application can talk to another.
// Facebook, Ebay, Amazon, Google, etc...

// load external xml from a URL
// load xml file locaaly
// parse xml

$contents = simplexml_load_file("http://localhost:8888/DAY7/Lecture7/Activity/xml_feed.php");

foreach($contents->feed as $feed){		// loop through content of file above

	echo $feed->from."</br>";			// only echo out "from" node

}

?>