<div class="partTypes view">
<h2><?php echo __('Part Type'); ?></h2>
	<dl>
		<dt><?php echo __('Part Type'); ?></dt>
		<dd>
			<?php echo h($partType['PartType']['part_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Typeid'); ?></dt>
		<dd>
			<?php echo h($partType['PartType']['parent_typeid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Part Level'); ?></dt>
		<dd>
			<?php echo h($partType['PartType']['part_level']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Part Tests'); ?></dt>
		<dd>
			<?php echo h($partType['PartType']['part_tests']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Part Typeid'); ?></dt>
		<dd>
			<?php echo h($partType['PartType']['part_typeid']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Part Type'), array('action' => 'edit', $partType['PartType']['part_typeid'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Part Type'), array('action' => 'delete', $partType['PartType']['part_typeid']), null, __('Are you sure you want to delete # %s?', $partType['PartType']['part_typeid'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Part Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Part Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parts'), array('controller' => 'parts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Part'), array('controller' => 'parts', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Parts'); ?></h3>
	<?php if (!empty($partType['Part'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Part Type Id'); ?></th>
		<th><?php echo __('Part Serialnum'); ?></th>
		<th><?php echo __('Part Parentid'); ?></th>
		<th><?php echo __('Part Data'); ?></th>
		<th><?php echo __('Part Notes'); ?></th>
		<th><?php echo __('Part Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($partType['Part'] as $part): ?>
		<tr>
			<td><?php echo $part['part_type_id']; ?></td>
			<td><?php echo $part['part_serialnum']; ?></td>
			<td><?php echo $part['part_parentid']; ?></td>
			<td><?php echo $part['part_data']; ?></td>
			<td><?php echo $part['part_notes']; ?></td>
			<td><?php echo $part['part_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'parts', 'action' => 'view', $part['part_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'parts', 'action' => 'edit', $part['part_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'parts', 'action' => 'delete', $part['part_id']), null, __('Are you sure you want to delete # %s?', $part['part_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Part'), array('controller' => 'parts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
