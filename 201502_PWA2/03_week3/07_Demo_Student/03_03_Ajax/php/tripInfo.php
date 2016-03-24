<?php
$TRIP_FILE = "../data/trips.json";
header('Content-type: application/json');
$file = fopen($TRIP_FILE, "r");
$jsonStr = fread($file, filesize($TRIP_FILE));
fclose($file);
$arr = json_decode($jsonStr);

if (array_key_exists("option", $_GET)){
  $params = $_GET; 
} else  if (array_key_exists("option", $_POST)){
  $params = $_POST; 
  $_POST["option"] = 99;
} else{
  $params = array("option"=>99); 
} 
switch($params["option"]){
  case "getList":
    $list = array();
    foreach ($arr as $trip){
      $list[] = $trip->title;
    }
    echo json_encode($list);
    break;
  case "getTrip":
    foreach ($arr as $trip){
      if ($trip->title == $params["title"]){
        echo json_encode( $trip );
        break;
      }
    }
    break;
  case "setRating":
    foreach ($arr as $trip){
      if ($trip->title == $params["title"]){
        $trip->rating = $params["rating"];
        $file = fopen($TRIP_FILE, "w");
        fwrite($file, json_encode($arr, JSON_PRETTY_PRINT));
        fclose($file);
        echo json_encode( $trip );
        break;
      }
    }
    break;
  default:
    print_r($params);
    foreach ($arr as $tripId=>$trip){
      echo json_encode( $trip );
      echo "<br>";
    }
}
?>
