<?php $this->start('meta'); ?>
	<title>Snookview - View Round</title>
<?php $this->end(); ?>
<?php echo $this->element('viewActions', array(
	"list" 		=> ' List Rounds',
	"edit" 		=> ' Edit Round',
	"delete" 	=> ' Delete Round',
	"id" 		=> $round->round_id,
	"display" 	=> $round->round_name
)); ?>
<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('ID'			); ?></th>
			<th><?php echo __('Name'		); ?></th>
			<th><?php echo __('Tournament'	); ?></th>
		</tr>
		<tr>
			<td><?php echo $round->round_id 	?></td>
			<td><?php echo $round->round_name 	?></td>
			<td>
				<?php echo $this->Html->link($round->tournament->tournament_name . ' ' . $round->tournament->tournament_year, ['controller' => 'tournaments', 'action' => 'adminView', $round->tournament->tournament_id]); ?>
			</td>
		</tr>
	</table>
</div>