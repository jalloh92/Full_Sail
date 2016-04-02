<?php

// Name:  Kelly Rhodes
// Server Side Languages
// June 15, 2015
//
// API (XML - JSON)
// Applicaiton programming interfaces.  This is how one application can talk to another.
// Facebook, Ebay, Amazon, Google, etc...

// The long way to create an XML file...


header("Content-type:text/xml"); 						// Tells browser contents of page is XML
$xmlfile = "<?xml version='1.0' encoding='UTF-8'?>"; 	// Tells browser which version of XML
$xmlfile .= "<feeds>"; 									// Start parent element called "feeds"
$xmlfile .= "<feed>";									// Start child element called "feed"
$xmlfile .= "<from>Joe</from>";
$xmlfile .= "<message>Hello</message>";
$xmlfile .= "</feed>";									// end child node called "feed"
$xmlfile .= "<feed>";									// Start child element called "feed"
$xmlfile .= "<from>Mike</from>";
$xmlfile .= "<message>Wuzzzzz Up!</message>";
$xmlfile .= "</feed>";
$xmlfile .= "</feeds>"; 								// end parent element called "feeds"

echo $xmlfile;

$dom = new DOMDocument("1.0");							// Instantiate / create a new object with DOMDocument; XML version
$dom->loadXML($xmlfile);								// Use PHP method called "loadXML" to load the current file results
$dom->save("myxml.xml");								// save the file under the current path and call it "myxml.xml"
?>