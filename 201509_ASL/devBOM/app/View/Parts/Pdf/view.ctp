<div class="parts view">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Part Information'); ?></h1>
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
							<li><li><?php echo $this->Html->link('Part Tree', '/parttypes/index')?></li></li>
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
								<?php echo $this->Html->link(__('Edit Part'), 
									array('action' => 'edit', $part['Part']['part_id'])); 
								?> 
							</li>
							<li>
								<?php echo $this->Form->postLink(__('Delete Part'), 
									array('action' => 'delete', $part['Part']['part_id']), null, __('Are you sure you want to delete # %s?', $part['Part']['part_id'])); 
								?> 
							</li>
							<li>
								<?php echo $this->Html->link(__('Print to PDF'), 
									array('action' => 'pdfprint', $part['Part']['part_id'])); 
								?> 
							</li>
							
						</ul>	
					</div>
				</div>
			</div>
		</div><!-- closes col md 3 -->
		
		<div class="col-md-9">

			<div class = "table-responsive">
				<table class="table table-striped" cellpadding="0" cellspacing="0">
					<tr>	
						<td><?php echo __('Serial Number'); ?></td>
						<td>
							<?php echo h($part['Part']['part_serialnum']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><?php echo __('Part Type'); ?></td>
						<td>
							<?php echo h($part['PartType']['part_type']); ?>
						&nbsp;
						</td>
					</tr>

					<?php $hideParents='';if(!$part['PartType']['parent_id']){$hideParents = 'hide';}?>
					<tr class='<?php echo $hideParents ?>'>
						<td><?php echo __('Parent Assembly'); ?></td>
						<td>
							<?php echo h($part['PartType']['parent_id']); ?>
						&nbsp;
						</td>
					</tr>	

					<?php $hideChildren='';if(count($children)==0){$hideChildren = 'hide';}?>
					<tr class='<?php echo $hideChildren ?>'>
						<td><?php echo __('Children'); ?></td>
						<td>
						<?php echo String::toList($children);?>
							&nbsp;
						</td>
					</tr>

					<tr>
						<td><?php echo __('Part Data'); ?></td>
						<td>

						<?php

						$partTestName = explode(',',$part['PartType']['part_testName']);
						$partTestData = explode(',',$part['Part']['part_data']);
						$partTestUnits = explode(',',$part['PartType']['part_testUnits']);

						for($i=0;$i<count($partTestName);$i++){
							echo $partTestName[$i];
							echo ':  ';
							echo $partTestData[$i];
							echo ' ';
							echo $partTestUnits[$i];
							echo '</br>';
						}

						?>




							<?php // echo h($part['Part']['part_data']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><?php echo __('Part Notes'); ?></td>
						<td>
							<?php echo h($part['Part']['part_notes']); ?>
							&nbsp;
						</td>
					</tr>
				</table>
			</div><!-- closes table responsive -->	

		</div><!-- closes col-md-9 -->
	</div><!-- closes row -->
</div><!-- closes parts view -->

