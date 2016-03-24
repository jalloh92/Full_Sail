<div class="parts form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Edit Part'); ?></h1>
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
							<li>
								<?php echo $this->Html->link(__('Parts List'), 
									array('action' => 'index')); 
								?> 
							</li>
							<li>
								<?php echo $this->Html->link(__('Add Part'), 
									array('action' => 'add')); 
								?> 
							</li>
							<hr>
							<li>
								<?php echo $this->Form->postLink(__('Delete Part'), 
									array('action' => 'delete', $this->Form->value('Part.part_id')), 
									null,
									 __('Are you sure you want to delete # %s?', $this->Form->value('Part.part_id'))
								);?>
							</li>
						</ul>	
					</div>
				</div>
			</div>
		</div><!-- closes col md 3 -->

		<div class="col-md-9">
			<div class="form-horizontal">
				<div class="form-group form-group-lg">

				<?php echo $this->Form->create('Part', array(
					'role'			=> 'form',
					'inputDefaults' => array(
				        'format' 	=> array('before', 'label', 'between', 'input', 'error', 'after'),
				        'div' 		=> array('class' => 'form-group'),
				        'class'		=> array('form-control'),
				        'label' 	=> array('class' => 'control-label col-lg-2'),
				        'between' 	=> '<div class="col-lg-5">',
				        'after' 	=> '</div>',
				        'error' 	=> array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
				    )));
    
					echo $this->Form->input('part_id');
    
					echo $this->Form->input('part_serialnum',
						array('label' => array(
								'class' => 'control-label col-lg-2',
								'text' => 'Serial Number:'))
					);

					echo $this->Form->input('part_type_id',
						array('label' => array(
								'class' => 'control-label col-lg-2',
								'text' => 'Part Type:'))
					);

					echo $this->Form->input('parent_id',
						array('label' => array(
								'class' => 'control-label col-lg-2',
								'text' => 'Parent Assembly:'))
					);
					echo $this->Form->input('part_data',
						array('label' => array(
								'class' => 'control-label col-lg-2',
								'text' => 'Part Data:'))
					);

					echo $this->Form->input('part_notes',
						array('label' => array(
								'class' => 'control-label col-lg-2',
								'text' => 'Notes:'))
					);

					echo '<div class="row">';
						echo '<div class="col-lg-2">';

						// $options are specified for the Submit button
							$options = array(
			    				'label' => 'Update',
			    				'class' => 'btn btn-primary',
			    				'div' 		=> array('class' => 'col-lg-5'),
							);

					echo '</div>';

					echo $this->Form->end($options);
				?>

				</div>
			</div>
		</div><!-- closes col md 9 -->

	</div><!-- closes row -->

</div><!-- closes parts form -->
