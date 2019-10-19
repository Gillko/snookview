<?php $this->start('meta'); ?>
	<title>Snookview - View Ranking</title>
<?php $this->end(); ?>
<?php echo $this->element('viewActions', array(
	"list" => ' List Rankings',
	"edit" => ' Edit Ranking',
	"delete" => ' Delete Ranking',
	"id" => $ranking['Ranking']['ranking_id'],
	"display" => $ranking['Ranking']['ranking_points']
)); ?>

<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('Rank'); ?></th>
			<th><?php echo __('Points'); ?></th>
			<th><?php echo __('Player'); ?></th>
			<th><?php echo __('Season'); ?></th>
		</tr>
		<tr>
			<td><?php echo h($ranking['Ranking']['ranking_id']); ?></td>
			<td><?php echo h($ranking['Ranking']['ranking_rank']); ?></td>
			<td><?php echo h($ranking['Ranking']['ranking_points']); ?></td>
			<td><?php echo $this->Html->link($ranking['Player']['player_surname'], array('controller' => 'players', 'action' => 'view', $ranking['Player']['player_id'])); ?></td>
			<td>
				<?php echo $this->Html->link($ranking['Season']['season_beginYear'], array('controller' => 'seasons', 'action' => 'view', $ranking['Season']['season_id'])); ?></td>
		</tr>
	</table>
</div>