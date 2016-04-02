<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Form</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
<!-- ********* Start Wrapper *********** -->	
	<div id="wrapper">
		<a href="/">Go back</a>
		<?php 
		#creating function to store & display data
		function storeData()
		{	
			#storing user information into formData array
			$formData =  array();
			#using for each loop to populate formData array
			foreach ($_POST as $k => $y_value) {
				$formData[$k]= "$y_value";
			}
			#looping through formData array and echoing out the values into HTML paragraphs
			foreach ($formData as $key => $x_value) {
				echo "<p>Your  " . $key . ": " . $x_value . "</p>";
			}
			#conditionals to check if the user lives in Florida or New York 
			if ($formData['state'] =="FL"){
				echo "<p>You are from the Sunshine State :)</p>";
			}

			else if($formData['state'] =="NY"){
				echo "<p>you are from the Empire state</p>";
			}
		}
		#checking to see if the user left any inputs blank
		if ($_SERVER['REQUEST_METHOD']== "POST"){
			if(empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['address']) || empty($_POST['city']) || empty($_POST['state'])|| empty($_POST['zip_code']) || empty($_POST['website'])){
				echo "alert please input the values I asked for!";
			}
			#if the user filled out everything run the storeData function
			else{
				storeData();
			}
		}
		?>
	</div><!-- ******** End Wrapper ************* -->	
</body>
</html>
