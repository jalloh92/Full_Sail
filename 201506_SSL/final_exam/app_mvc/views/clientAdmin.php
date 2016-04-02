<!--
filename:  clientAdmin.php
directed from:  $_GET["action"]=="clientList" (#1 on controllers/Action_Controller.php)
$data is passed in; $data = $clients->getclients();

action ="?action=deleteclient" with clientid (#4 on controllers/Action_Controller.php)
action ="?action=editclient" with clientid (#2 on controllers/Action_Controller.php)
-->

<div class="container">

	<h1>Client Directory</h1>

	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Phone Number</th>
				<th>Email</th>
				<th>Website</th>
			</tr>
		</thead>
		<tbody>	
			

<?php

foreach($results as $client){

?>
		<tr>
			<td><?=$client["name"];?></td>
			<td><?=$client["phone"];?></td>
			<td><?=$client["email"];?></td>
			<td><?=$client["website"];?></td>
			<td><a class='btn btn-primary' role='button' href='?action=editClient&id=<? echo $client["id"];?>'>Edit</a></td>
			<td><a class='btn btn-primary' role='button' href='?action=deleteClient&id=<? echo $client["id"];?>'>Delete</a></td>
		</tr>
	


<?php

} // close foreach

?>
		</tbody>
	</table>
</div><!-- closes container -->
