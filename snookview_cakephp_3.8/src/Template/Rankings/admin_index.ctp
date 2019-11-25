<?php $this->start('meta'); ?>
	<title>Snookview - Ranking</title>
<?php $this->end(); ?>
<div class="row">
	<?php 
		if(empty($rankings)){
			echo '<div id="flashMessage" class="message">' . 'No rankings have been added, please be the first to add a Ranking.' . '</div>';
		}
	?>
	<div class="col-md-2">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<?php echo $this->Html->link(__('New Ranking'), ['action' => 'adminAdd']); ?>
			</li>
		</ul>
	</div>
	<div class="col-md-10">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<tr>
					<th>
						<?php echo $this->Paginator->sort('ranking_id', 'ID'); ?>	
					</th>
					<th>
						<?php echo $this->Paginator->sort('ranking_rank', 'Rank'); ?>	
					</th>
					<th>
						<?php echo $this->Paginator->sort('ranking_points', 'Points'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('player_id', 'Player'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('season_id', 'Season'); ?>	
					</th>
					<th class="actions">
						<?php echo __('Actions'); ?>
					</th>
				</tr>
				<?php foreach ($rankings as $ranking): ?>
					<tr>
						<td>
							<?php echo $this->Html->link($ranking->ranking_id, ['action' => 'adminView', $ranking->ranking_id]); ?>
						</td>
						<td>
							<?php echo h($ranking->ranking_rank); ?>
						</td>
						<td>
							<?php echo h($ranking->ranking_points); ?>
						</td>
						<td>
							<?php echo $this->Html->link($ranking->player->player_firstname . ' ' . $ranking->player->player_surname , ['controller' => 'players', 'action' => 'adminView', $ranking->player->player_id]); ?>
						</td>
						<td>
							<?php echo $this->Html->link($ranking->season->season_beginYear . '-' . $ranking->season->season_endYear, ['controller' => 'seasons', 'action' => 'view', $ranking->season->season_id]); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link(
								$this->Html->tag('i', '', ['class' => 'glyphicon glyphicon-edit']) . "",
									['action' => 'adminEdit', $ranking->ranking_id],
									['class' => 'btn btn-mini btn-noPadding', 'escape' => false]
								); 
							?>
							<?php echo $this->element('deleteAction', array(
								"idDeleteAction" 		=> $ranking->ranking_id,
								"displayDeleteAction" 	=> $ranking->player->player_firstname . ' ' . $ranking->player->player_surname . ' with the points of ' . $ranking->ranking_points
							)); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>
<?php echo $this->element('pagination'); ?>