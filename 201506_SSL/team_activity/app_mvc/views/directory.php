<?
session_start();
?>

<!--
filename:  employeeDirectory.php
can access once logged in either from logged in nav bar or profile page
directed from:  $_GET["action"]=="directory" (#7 on controllers/Action_Controller.php)
$data is passed in: $data = $employees->getEmployees();
-->

<div class="container">

	<h1>Employee Directory</h1>

	<table class="table">
		<thead>
			<tr>
				<th>First Name<a href="?action=sortfnameasc"><span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></a><a href="?action=sortfnamedesc"><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span></a></th>
				<th>Last Name<a href="?action=sortlnameasc"><span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></a><a href="?action=sortlnamedesc"><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span></a></th>
				<th>Phone Number<a href="?action=sortphoneasc"><span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></a><a href="?action=sortphonedesc"><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span></a></th>
				<th>Email<a href="?action=sortemailasc"><span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></a><a href="?action=sortemaildesc"><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span></a></th>
			</tr>
		</thead>
		<tbody>	
			

<?php

foreach($results as $employee){

?>
		<tr>
			<td><?=$employee["empFName"];?></td>
			<td><?=$employee["empLName"];?></td>
			<td><?=$employee["empPhone"];?></td>
			<td><?=$employee["empEmail"];?></td>
		</tr>
	


<?php

} // close foreach

?>
		</tbody>
	</table>
</div><!-- closes container -->
