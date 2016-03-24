<div class="parts form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Add Part'); ?></h1>
			</div>
		</div>
	</div><!-- closes row -->


	<div class="row">
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
					<div class="panel-body">
						<ul class="nav nav-pills nav-stacked">
							<li><?php echo $this->Html->link('Part Tree', '/parttypes/index')?></li></li>
							<li><?php echo $this->Html->link(__('Parts List'), array('action' => 'index')); ?></li>
						</ul>	
					</div>
				</div>
			</div>
		</div><!-- closes col md 3 -->
		
		<div class="col-md-9">
			<div class="form-horizontal">
				<div class="form-group">
					<form method="post" action="/devBOM/parts/add">

						<!-- ******* Serial Number Input ******* -->
						<div class="form-group">
							<label for="serial_num" class='control-label'>Serial Number:</label>
							<input id ="serial_num" class = "form-control" type="text" name="part_serialnum">
						</div>	
					

						<!-- ******* Part Type Input ** Links to Part Type Table ******* -->
						<div class="form-group">
							<label class = "control-label">Part Type:</label>
							<select class="form-control">
								<?php
									for($i=0;$i<count($partType);$i++){

										echo '<option value=' . $part_type_id[$i] . '>' . $partType[$i] . '</option>';

									}
								?>
							</select>
						</div>	
					

					<!-- ******* Parent Input ** Show & Hide based on level in assy ******* -->
					<div class="row" id="parent">
						<div class="form-group">
							<label class = "control-label">Parent Assembly:</label>
							<select class="form-control">					
								<?php
									for($j=0;$j<count($available_parents);$j++){

										echo '<option value=' . $available_parents[$j] . '>' . $available_parents[$j] . '</option>';

									}
								?>
							</select>
						</div>	
					</div>

					<!-- ******* Test Data ** Show & Hide different fields based on part type ******* -->	
					<?php 
					foreach($partTypeInfo as $partTypes){

						// creating a div with the id of partTypeID
						// div will show & hide via jquery based on drop down selection
						echo '<div class = "row partData" id="partType';
						echo $partTypes['PartType']['part_typeid'];
						echo '">';

						// take the $partTypes data passed by controller (comma delimited string)
						// and exploding into an array
						$partTestName = explode(",", $partTypes['PartType']['part_testName']);
						$partTestUnits = explode(",", $partTypes['PartType']['part_testUnits']);

						// looping over array to hide / show appropriate tests and units for each part
						for($a=0;$a<count($partTestName);$a++){

							echo "<label class='control-label col-md-4'>";
							echo $partTestName[$a];
							echo "</label>";

							echo '<input class = "form-control col-md-4" type="text" name="';
							echo $part_data[$a];
							echo ">";

						} // end for loop

						// take the array data and break into comma delimited string
						// push into new var $data_string

						//$data_string = implode(",", $part_data);


						echo '</div>'; // end div #partTypeID / class row

					} // end foreach


					?> 
						<!-- ******* Notes Input ******* -->
						<div class="form-group">
							<label class="control-label">Notes:</label>
							<input class = "form-control" type="text" name="part_notes">
						</div>	
						
						<!-- ******* Submit Button ******* 	-->
						<div class="row">
							<div class="col-md-4">
								<input class='btn btn-primary' type="submit"></input>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div><!-- closes col md 9 -->

	</div><!-- closes row -->
</div><!-- closes parts form -->



<script>
$(document).ready(function(){

    $("select").change(function(){
    	console.log("I was selected");

        $(this).find("option:selected").each(function(){
        	// hide all the divs with class partData
    		$(".partData").hide();

        	// Set the selected value from the drop down to $id
        	var $id = $(this).attr("value");

        	// Logic to hide / show Parent div
            if($id=="1"){ // Value of Arm Part Type is "1"
            	console.log("Arm was selected");
                $("#parent").hide();
            }
            else{
            	console.log("Arm was NOT selected");
                $("#parent").show();
            }

            for($i=0;$i<12;$i++){
            	if($i == $id){
            		console.log("i is this: " + $i);
            		$divName = '#partType' + $id.toString();
            		console.log($divName);
            		$($divName).show();
            	}
            }


        });
    }).change();
});
</script>

