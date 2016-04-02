<?
// filename:  fruitsinclass.php

// How to parse JSON using a URL
// Call the API
// Store results of API call into $contents
$url = "http://localhost:8888/DAY8/Lecture8/app_mvc/models/fruitget.php";
$content = file_get_contents($url);
$json = json_decode($content, true);
		
?>

<div class='container'>

	<div class="thumbnail col-md-4 col-md-offset-4">
	<h3>Daily Fruit</h3>

<?	

foreach($json as $fruit){
	echo "<p>Fruit: " . $fruit["fruitname"] . "</p>";
    echo "<p>Color: " . $fruit["fruitcolor"] . "</p>";
    echo '<img src="' . $fruit["fruitimage"] . '"/>';
    echo"</br>";
} // close foreach

?>
	</div><!-- closes thumbnail -->


</div><!-- closes container -->
