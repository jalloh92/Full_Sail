<?

// create a class called Views that grabs each of the views (footer, header, home, weather)

class Views{

	//create a public method		
	public function getView($filename="", $data=array()){

		// include the file name that was passed
		include $filename;

		} // closes getView($filename="", $data=array())
} // class Views
?>