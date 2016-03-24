<div class="parts index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Parts List'); ?></h1>
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
							<li><?php echo $this->Html->link(__('Add Part'), array('action' => 'add')); ?></li>
						</ul>	
					</div>
				</div>
			</div>
		</div><!-- closes col md 3 -->
		
		<div class="col-md-9">
			<div class = "table-responsive">

				<table class="table table-striped" cellpadding="0" cellspacing="0">
					<tr>
						<th>
							<?php echo $this->Paginator->sort('part_serialnum', __('Serial #')); ?>
						</th>
						<th>
							<?php echo $this->Paginator->sort('part_typeid', __('Part Type')); ?>
						</th>
						<th>
							<?php echo $this->Paginator->sort('part_parentid', __('Parent')); ?>
						</th>
						<!-- Not going to show part data or notes on index page
						<th>
							<?php echo $this->Paginator->sort('part_data', __('Data')); ?>
						</th>
						<th>
							<?php echo $this->Paginator->sort('part_notes', __('Notes')); ?>
						</th>
						-->
						<th class="actions">
							<?php echo __('Actions'); ?>
						</th>
					</tr>
					<?php foreach ($parts as $part): ?>
					<tr>
						<td><?php echo h($part['Part']['part_serialnum']); ?>&nbsp;</td>
						<td><?php echo h($part['PartType']['part_type']); ?>&nbsp;</td>
						<td><?php echo h($part['Part']['parent_id']); ?>&nbsp;</td>
						<!-- Not going to show part data or notes on index page
						<td><?php echo h($part['Part']['part_data']); ?>&nbsp;</td>
						<td><?php echo h($part['Part']['part_notes']); ?>&nbsp;</td>
						-->
						<td class="actions">
							<?php echo $this->Html->link(__('View'), 
									array('action' => 'view', $part['Part']['part_id']),
									array(	'class' =>"btn btn-default",
											'role' 	=> 'button')
								); 
							?>
							<?php echo $this->Html->link(__('Edit'), 
									array('action' => 'edit', $part['Part']['part_id']),
									array(	'class' =>"btn btn-default",
											'role' 	=> 'button')
								); 
							?>
							<?php echo $this->Form->postLink(__('Delete'), 
									array('action' => 'delete', $part['Part']['part_id']), 
									array('class'=>'btn btn-default', 'escape' => false),
									__('Are you sure you want to delete # %s?', $part['Part']['part_id'])
								); 
							?>
						</td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div><!-- closes table-responsive -->	

			<p>
			<?php
			echo $this->Paginator->counter(array(
			'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
			));
			?>	
			</p>

			<div class="paging">
			<!-- Can uncomment pagination if the table gets to be too big 
			<?php
				echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ''));
				echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
			?>
			-->
			</div>


		</div><!-- closes col-md-9 -->
	</div><!-- closes row -->
</div><!-- closes parts index -->

