<div class="parts form">

<?php echo $this->Form->create('Part', array(
	'role'			=> 'form',
	'inputDefaults' => array(
        'format' 	=> array('before', 'label', 'between', 'input', 'error', 'after'),
        'div' 		=> array('class' => 'form-group'),
        'class'		=> array('form-control'),
        'label' 	=> array('class' => 'control-label col-md-4'),
        'between' 	=> '<div class="col-md-4">',
        'after' 	=> '</div>',
        'error' 	=> array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
    )));
    
?>

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

					<?php

					// ******* Serial Number Input ******* 
						echo $this->Form->input('part_serialnum', 
							array('label' => array(
									'class' => 'control-label col-md-4',
									'text' => 'Serial Number:'))
						);

					// ******* Part Type Input -- Links to Part Type Table ******* 
						echo '<label class = "control-label col-md-4" for="PartPartTypeid">Part Type:</label>';

						echo $this->Form->input('part_type_id', 
							array(	'options' 	=> $partType,
									'label'		=> false),
							array('id' => array(
									'class' => 'control-label col-md-4',
									'text' => 'Part Type:')
							)				
						);

					// ******* Parent Input -- Show & Hide based on level in assy ******* 
					echo '<div class="row" id="parent">';

						echo '<label class = "control-label col-md-4" for="PartPartTypeid">Parent:</label>';					
						// This option is for ALL available parents...how to reduce list based on selection above?
						echo $this->Form->input('parent_id', 
							array(	'options' 	=> $available_parents,
									'label'		=> false),
							array('id' => array(
									'class' => 'control-label col-md-4',
									'text' => 'Parent Assembly:')
							)				
						);

					echo '</div>';

					// ******* Test Data -- Show & Hide different fields based on part type ******* 	
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

						// $data = array();

						// looping over array to hide / show appropriate tests and units for each part
						for($a=0;$a<count($partTestName);$a++){
							//$data = array();

							// echo '<div class="row">';

							echo $this->Form->input('part_data', 
							array('class' => "col-md-4 form-control", 
								'name' => 'input'.$a,
								'label' => array(
									'class' => 'control-label col-md-4',
									'text' => $partTestName[$a]))

							);

							// NEED TO FIGURE OUT HOW TO DISPLAY UNITS
							// echo '<div class="col-md-2">AFTER</div>';

							// echo '</div>';

							// Push each bit of data from the 3 fields into the data array
							// $data[$a]=$this->Part->part_data;


						} // end for loop

						// take the array data and break into comma delimited string
						// push into new var $data_string

						//$data_string = implode(",", $data);


						echo '</div>'; // end div #partTypeID / class row

					} // end foreach

					// create hidden div to actually put the resultant comma delimited string into
					/*echo $this->Form->input('part_data', 
						array('class' => "col-md-4 form-control", 
							'default' => $data_string,
							'label' => array(
								'class' => 'control-label col-md-4',
								'text' => 'You cannot see me'))

					);*/


					// ******* Notes Input ******* 
						echo $this->Form->input('part_notes', 
							array('label' => array(
									'class' => 'control-label col-md-4',
									'text' => 'Notes:'))
						);
					// ******* Submit Button ******* 	
						echo '<div class="col-md-4">';

						// $options are specified for the Submit button
						$options = array(
		    				'label' => 'Submit',
		    				'class' => 'btn btn-primary',
		    				'div' 		=> array('class' => 'col-lg-5'),
						); 

					
					echo $this->Form->end($options); 

					//echo $this->Js->writeBuffer(); // Write cached scripts
					?>

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

