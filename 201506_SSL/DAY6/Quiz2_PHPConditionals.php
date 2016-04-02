<?php 

echo "PHP loaded</br>";

echo "Quiz 2:  PHP Conditionals</br>";
echo "Kelly Rhodes</br></br>";

function getGrade($grade){
	//echo "getGrade loaded</br>";

	if ($grade>100){
		echo "Error:  grades above 100 are not allowed";
	} else if ($grade >= 90){
		echo "You earned an A!</br>";
	} else if ($grade >= 80){
		echo "You earned a B.</br>";
	} else if ($grade >= 70){
		echo "You earned a C.</br>";
	} else if ($grade >= 60){
		echo "You earned a D.</br>";
	} else {
		echo "You earned an F.</br>";
	}
	
}



getGrade(94);
getGrade(54);
getGrade(89.9);
getGrade(60.01);
getGrade(102.1);


?>