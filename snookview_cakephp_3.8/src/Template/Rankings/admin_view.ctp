<?php $this->start('meta'); ?>
	<title>Snookview - View Ranking</title>
<?php $this->end(); ?>
<?php echo $this->element('viewActions', array(
	"list" 		=> ' List Rankings',
	"edit" 		=> ' Edit Ranking',
	"delete" 	=> ' Delete Ranking',
	"id" 		=> $ranking->ranking_id,
	"display" 	=> $ranking->player->player_firstname . ' ' . $ranking->player->player_surname . ' with the points of ' . $ranking->ranking_points
)); ?>

<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'			); ?></th>
			<th><?php echo __('Rank'		); ?></th>
			<th><?php echo __('Points'		); ?></th>
			<th><?php echo __('Player'		); ?></th>
			<th><?php echo __('Season'		); ?></th>
		</tr>
		<tr>
			<td><?php echo $ranking->ranking_id 		?></td>
			<td><?php echo $ranking->ranking_rank 		?></td>
			<td><?php echo $ranking->ranking_points 	?></td>
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
			<td>
				<?php 
					echo $this->Html->link(
						$ranking->season->season_beginYear . ' - ' . $ranking->season->season_endYear, [
							'controller' => 'seasons', 
							'action' => 'adminView', 
							$ranking->season->season_id
							]
						)
					; 
				?>		
			</td>
		</tr>
	</table>
</div>