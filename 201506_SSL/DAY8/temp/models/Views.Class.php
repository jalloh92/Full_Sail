<?

// Create "Views" Class (aka object)

class Views{

	// Create a public method call "getViews"
	// Function / Method Parameters:
	// Pass the file name and data recieved from Controller
	public function getView($filename="", $results=array()){

		// include the filename being requested by Controller
		include $filename;

	}

}

?>