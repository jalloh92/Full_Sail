<? 
/*
 *	==================================
 *	PROJECT:	SSL - Lab 4 & 5 Prep
 *	FILE:		models/ViewsClass.php
 *	AUTHOR: 	Fialishia O. (Updated 1506)
 *	CREATED:	2015
 *	==================================
 */

// Create "Views" Class (aka object)

class Views{

    // Create a public method called "getViews"
    // Function/Method Parameters:  Pass the file name and data received from Controller
    public function getView($filename="", $results=array()){

        // include the filename being requested by Controller
        include $filename;
    }
}

?>