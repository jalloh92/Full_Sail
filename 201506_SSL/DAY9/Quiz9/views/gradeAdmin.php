<!--
filename:  gradeAdmin.php
directed from:  $_GET["action"]=="gradeList" (#1 on controllers/Action_Controller.php)
$data is passed in; $data = $grades->getgrades();

action ="?action=deletegrade" with gradeid (#4 on controllers/Action_Controller.php)
action ="?action=editgrade" with gradeid (#2 on controllers/Action_Controller.php)
-->

<div class="container">

	<h1>List of grades</h1>

	<div class="row">
	  
      
      
<?php

//var_dump($results);

foreach($results as $grade){

?>

	<div class="col-md-4">
	    <div class="thumbnail">
		    <div class="caption">
		    	<h3><? echo $grade['studentname'];?></h3>
		    	<p><? echo $grade['studentpercent'];?></p>
		    	<p><? echo $grade['studentlettergrade'];?></p>
		    
			    <a class='btn btn-primary' role='button' href='?action=deletegrade&studentid=<? echo $grade["studentid"];?>'>Delete </a>

		    </div><!-- closes caption -->
	    </div><!-- closes thumbnail -->
	  </div> <!-- closes col-sm-6 col-md-4 -->

<?php

} // close foreach

?>

	</div><!-- closes row -->
</div><!-- closes container -->
