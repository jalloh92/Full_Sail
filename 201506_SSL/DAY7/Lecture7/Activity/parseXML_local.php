<?

// Name:  Kelly Rhodes
// Server Side Languages
// June 15, 2015
//
// API (XML - JSON)
// Applicaiton programming interfaces.  This is how one application can talk to another.
// Facebook, Ebay, Amazon, Google, etc...

// How to parse XML using a local file

$contents = simplexml_load_file("myxml.xml");

foreach($contents->feed as $feed){		// loop through elements in local XML file

	echo $feed->from."</br>";			// only echo out "from" node

}

?>