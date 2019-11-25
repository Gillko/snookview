<?php $this->start('meta'); ?>
	<title>Snookview - View Season</title>
<?php $this->end(); ?>
<?php echo $this->element('viewActions', array(
	"list" 		=> ' List Seasons',
	"edit" 		=> ' Edit Season',
	"delete" 	=> ' Delete Season',
	"id"		=> $season->season_id,
	"display" 	=> $season->season_beginYear . '-' . $season->season_endYear
)); ?>

<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'			); ?></th>
			<th><?php echo __('BeginYear'	); ?></th>
			<th><?php echo __('EndYear'		); ?></th>
		</tr>
		<tr>
			<td><?php echo $season->season_id 			?></td>
			<td><?php echo $season->season_beginYear 	?></td>
			<td><?php echo $season->season_endYear 		?></td>
		</tr>
	</table>
</div>
<div class="related">
	<h3><?php echo __('Related Ranking'); ?></h3>
	<?php if (!empty($season->rankings)): ?>
	<div class="table-responsive">
		<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'		); ?></th>
			<th><?php echo __('Rank'	); ?></th>
			<th><?php echo __('Points'	); ?></th>
			<th><?php echo __('Player'	); ?></th>
		</tr>
		<?php foreach ($season->rankings as $ranking): ?>
			<tr>
				<td>
					<?php 
						echo $this->Html->link(
							$ranking->ranking_id, [
								'controller' => 'rankings', 
								'action' => 'adminView', 
								$ranking->ranking_id
								]
							)
						; 
					?>
				</td>
				<td><?php echo $ranking->ranking_rank ?></td>
				<td><?php echo $ranking->ranking_points ?></td>
				<td>
					<?php 
						echo $this->Html->link(
							$ranking->player->player_firstname . ' ' . $ranking->player->player_surname, [
								'controller' => 'players', 
								'action' => 'adminView', 
								$ranking->player->player_id
								]
							)
						; 
					?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	</div>
	<?php endif; ?>
</div>