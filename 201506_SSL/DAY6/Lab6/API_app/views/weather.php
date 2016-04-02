<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="well profile">

<? if(is_string($data)) {
?>
				<h1>Error!</h1>
				<p><? echo $data ?> <a href="/../../">Go Back</a></p>

<?

} else {

?>
				<h1><medium>Weather for <? echo $data['location'][0]["city"] ?>, <? echo $data['location'][0]['region'] ?></medium></h1>
				<small>Current Date: <? echo $data['current']['date'] ?></small>
				<hr />
				<div class="left">
				<p class="temp">Temperature: <? echo $data['current']['temp'] ?>&deg;F</p>
			</div>
			<div class="center">
				<center><img src="http://l.yimg.com/a/i/us/we/52/<? echo $data['current']['code'] ?>.gif" width="200" height="200" />
				<p><? echo $data['current']['text'] ?></p></center>
			</div>

			<div class="clear"></div>
				<p><b>Forecast:</b></p>
				<p><? echo $data['forecast'][0]['day'] ?> - <? echo $data['forecast'][0]['text'] ?>. High: <? echo $data['forecast'][0]['high'] ?>
Low: <? echo $data['forecast'][0]['low'] ?></p>

<?

}

?>

			</div>
		</div>
	</div>
</div>