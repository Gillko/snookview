<?php $this->start('meta'); ?>
	<title>Snookview - Items</title>
<?php $this->end(); ?>
<div class="row">
	<?php 
	if(empty($items)){
		echo '<div id="flashMessage" class="message">' . 'No items have been added, please be the first to add an Item.' . '</div>';
	} ?>
	<div class="col-md-2">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Html->link(__('New Item'), array('action' => 'add')); ?></li>
		</ul>
	</div>
	<div class="col-md-10">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
			<tr>
				<th><?php echo $this->Paginator->sort('item_id', 'ID'); ?></th>
				<th><?php echo $this->Paginator->sort('item_title', 'Title'); ?></th>
				<th><?php echo $this->Paginator->sort('item_hours_start', 'Start Hours'); ?></th>
				<th><?php echo $this->Paginator->sort('item_minutes_start', 'Start Minutes'); ?></th>
				<th><?php echo $this->Paginator->sort('item_seconds_start', 'Start Seconds'); ?></th>
				<th><?php echo $this->Paginator->sort('item_point_start', 'Start Point'); ?></th>
				<th><?php echo $this->Paginator->sort('item_hours_end', 'End Hours'); ?></th>
				<th><?php echo $this->Paginator->sort('item_minutes_end', 'End Minutes'); ?></th>
				<th><?php echo $this->Paginator->sort('item_seconds_end', 'End Seconds'); ?></th>
				<th><?php echo $this->Paginator->sort('item_point_start', 'End Point'); ?></th>
				<th><?php echo $this->Paginator->sort('item_description', 'Description'); ?></th>
				<th><?php echo $this->Paginator->sort('item_tags', 'Tags'); ?></th>
				<th><?php echo $this->Paginator->sort('item_part', 'Part'); ?></th>
				<th><?php echo $this->Paginator->sort('created', 'Created'); ?></th>
				<th><?php echo $this->Paginator->sort('modified', 'Modified'); ?></th>
				<th><?php echo $this->Paginator->sort('timeline_id', 'Timeline'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			<?php foreach ($items as $item): ?>
				<tr>
					<td><?php echo $this->Html->link($item['Item']['item_id'], array('action' => 'view', $item['Item']['item_id'])); ?></td>
					<td><?php echo h($item['Item']['item_title']); ?></td>
					<td><?php echo h($item['Item']['item_hours_start']); ?></td>
					<td><?php echo h($item['Item']['item_minutes_start']); ?></td>
					<td><?php echo h($item['Item']['item_seconds_start']); ?></td>
					<td><?php echo h($item['Item']['item_point_start']); ?></td>
					<td><?php echo h($item['Item']['item_hours_end']); ?></td>
					<td><?php echo h($item['Item']['item_minutes_end']); ?></td>
					<td><?php echo h($item['Item']['item_seconds_end']); ?></td>
					<td><?php echo h($item['Item']['item_point_end']); ?></td>
					<td><?php echo h($item['Item']['item_description']); ?></td>
					<td><?php echo h($item['Item']['item_tags']); ?></td>
					<td><?php echo h($item['Item']['item_part']); ?></td>
					<td><?php echo h(date("d-m-Y H:i:s", strtotime($item['Item']['created']))); ?></td>
					<td><?php echo h(date("d-m-Y H:i:s", strtotime($item['Item']['modified']))); ?></td>
					<td>
						<?php echo $this->Html->link($item['Timeline']['timeline_title'], array('controller' => 'timelines', 'action' => 'view', $item['Timeline']['timeline_id'])); ?>
					</td>
					<td class="actions">
						<?php echo $this->Html->link(
						    $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-edit')) . "",
						    array('action' => 'edit', $item['Item']['item_id']),
						    array('class' => 'btn btn-mini btn-noPadding', 'escape' => false)
						); ?>
						<?php echo $this->Form->postLink(
						   $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove')). "",
						        array('action' => 'delete', $item['Item']['item_id']),
						        array('escape'=>false),
						    __('Are you sure you want to delete %s?', $item['Item']['item_title']),
						   array('class' => 'btn btn-mini btn-noPadding')
						); ?>
					</td>
				</tr>
			<?php endforeach; ?>
			</table>
		</div>
		<?php echo $this->element('pagination'); ?>
	</div>
</div>
