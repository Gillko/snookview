<?php $this->start('meta'); ?>
	<title>Snookview - View Round</title>
<?php $this->end(); ?>
<?php echo $this->element('viewActions', array(
	"list" => ' List Rounds',
	"edit" => ' Edit Round',
	"delete" => ' Delete Round',
	"id" => $round['Round']['round_id'],
	"display" => $round['Round']['round_name']
)); ?>
<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('ID'); ?></th>
			<th><?php echo __('Name'); ?></th>
			<th><?php echo __('Tournament'); ?></th>
		</tr>
		<tr>
			<td><?php echo h($round['Round']['round_id']); ?>&nbsp;</td>
			<td><?php echo h($round['Round']['round_name']); ?>&nbsp;</td>
			<td>
				<?php echo $this->Html->link($round['Tournament']['tournament_name'] . ' ' . $round['Tournament']['tournament_year'], array('controller' => 'tournaments', 'action' => 'view', $round['Tournament']['tournament_id'])); ?>
			</td>
		</tr>
	</table>
</div>