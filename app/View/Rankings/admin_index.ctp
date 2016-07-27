<?php $this->start('meta'); ?>
	<title>Snookview - Ranking</title>
<?php $this->end(); ?>
<div class="row">
	<?php 
	if(empty($rankings)){
		echo '<div id="flashMessage" class="message">' . 'No rankings have been added, please be the first to add a Ranking.' . '</div>';
	} ?>
	<div class="col-md-2">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Html->link(__('New Ranking'), array('action' => 'add')); ?></li>
		</ul>
	</div>
	<div class="col-md-10">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
			<tr>
					<th><?php echo $this->Paginator->sort('ranking_id', 'ID'); ?></th>
					<th><?php echo $this->Paginator->sort('ranking_rank', 'Rank'); ?></th>
					<th><?php echo $this->Paginator->sort('ranking_points', 'Points'); ?></th>
					<th><?php echo $this->Paginator->sort('player_id', 'Player'); ?></th>
					<th><?php echo $this->Paginator->sort('season_id', 'Season'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			<?php foreach ($rankings as $ranking): ?>
				<tr>
					<td><?php echo $this->Html->link($ranking['Ranking']['ranking_id'], array('action' => 'view', $ranking['Ranking']['ranking_id'])); ?>&nbsp;</td>
					<td><?php echo h($ranking['Ranking']['ranking_rank']); ?>&nbsp;</td>
					<td><?php echo h($ranking['Ranking']['ranking_points']); ?>&nbsp;</td>
					<td>
					<?php echo $this->Html->link($ranking['Player']['player_firstname'] . ' ' . $ranking['Player']['player_surname'] , array('controller' => 'players', 'action' => 'view', $ranking['Player']['player_id'])); ?>
					</td>
					<td>
					<?php echo $this->Html->link($ranking['Season']['season_beginYear'] . '-' . $ranking['Season']['season_endYear'], array('controller' => 'seasons', 'action' => 'view', $ranking['Season']['season_id'])); ?>
					</td>
					<td class="actions">
						<?php echo $this->Html->link(
						    $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-edit')) . "",
						    array('action' => 'edit', $ranking['Ranking']['ranking_id']),
						    array('class' => 'btn btn-mini btn-noPadding', 'escape' => false)
						); ?>
						<?php echo $this->Form->postLink(
						   $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove')). "",
						        array('action' => 'delete', $ranking['Ranking']['ranking_id']),
						        array('escape'=>false),
						    __('Are you sure you want to delete %s?', $ranking['Ranking']['ranking_points']),
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