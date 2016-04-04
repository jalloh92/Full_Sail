<!--
filename:  fruitAdmin.php
directed from:  $_GET["action"]=="fruitList" (#1 on controllers/Action_Controller.php)
$data is passed in; $data = $fruits->getFruits();

action ="?action=deleteFruit" with fruitid (#4 on controllers/Action_Controller.php)
action ="?action=editFruit" with fruitid (#2 on controllers/Action_Controller.php)
-->

<div class="container">

	<h1>List of Fruits</h1>

	<div class="row">
	  
      
      
<?php

//var_dump($results);

foreach($results as $fruit){

?>

	<div class="col-md-4">
	    <div class="thumbnail">
		    <img src="<? echo $fruit['fruitimage'];?>"/>
		    <div class="caption">
		    	<h3><? echo $fruit['fruitname'];?></h3>
		    	<p><? echo $fruit['fruitcolor'];?></p>
		    
			    <a class='btn btn-primary' role='button' href='?action=editFruit&fruitid=<? echo $fruit["fruitid"];?>'>Edit</a>
			    <a class='btn btn-primary' role='button' href='?action=deleteFruit&fruitid=<? echo $fruit["fruitid"];?>'>Delete </a>

		    </div><!-- closes caption -->
	    </div><!-- closes thumbnail -->
	  </div> <!-- closes col-sm-6 col-md-4 -->

<?php

} // close foreach

?>

	</div><!-- closes row -->
</div><!-- closes container -->
