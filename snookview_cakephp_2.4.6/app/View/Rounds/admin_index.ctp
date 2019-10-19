<?php $this->start('meta'); ?>
	<title>Snookview - Rounds</title>
<?php $this->end(); ?>
<div class="row">
	<?php 
	if(empty($rounds)){
		echo '<div id="flashMessage" class="message">' . 'No rounds have been added, please be the first to add a Round.' . '</div>';
	} ?>
	<div class="col-md-2">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Html->link(__('New Round'), array('action' => 'add')); ?></li>
		</ul>
	</div>
	<div class="col-md-10">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<tr>
						<th><?php echo $this->Paginator->sort('round_id', 'ID'); ?></th>
						<th><?php echo $this->Paginator->sort('round_name', 'Name'); ?></th>
						<th><?php echo $this->Paginator->sort('tournament_id', 'Tournament'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
				<?php foreach ($rounds as $round): ?>
				<tr>
					<td><?php echo $this->Html->link($round['Round']['round_id'], array('action' => 'view', $round['Round']['round_id'])); ?>&nbsp;</td>
					<td><?php echo h($round['Round']['round_name']); ?>&nbsp;</td>
					<td>
						<?php echo $this->Html->link($round['Tournament']['tournament_name'] . ' ' . $round['Tournament']['tournament_year'], array('controller' => 'tournaments', 'action' => 'view', $round['Tournament']['tournament_id'])); ?>
					</td>
					<td class="actions">
						<?php echo $this->Html->link(
						    $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-edit')) . "",
						    array('action' => 'edit', $round['Round']['round_id']),
						    array('class' => 'btn btn-mini btn-noPadding', 'escape' => false)
						); ?>
						<?php echo $this->Form->postLink(
						   $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove')). "",
						        array('action' => 'delete', $round['Round']['round_id']),
						        array('escape'=>false),
						    __('Are you sure you want to delete %s?', $round['Round']['round_name']),
						   array('class' => 'btn btn-mini btn-noPadding')
						);
						?>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>
<?php echo $this->element('pagination'); ?>
