<?php $this->start('meta'); ?>
	<title>Snookview - Rounds</title>
<?php $this->end(); ?>
<div class="row">
	<?php 
		if(empty($rounds)){
			echo '<div id="flashMessage" class="message">' . 'No rounds have been added, please be the first to add a Round.' . '</div>';
		}
	?>
	<div class="col-md-2">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Html->link(__('New Round'), ['action' => 'adminAdd']); ?></li>
		</ul>
	</div>
	<div class="col-md-10">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<tr>
					<th>
						<?php echo $this->Paginator->sort('round_id', 'ID'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('round_name', 'Name'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('tournament_id', 'Tournament'); ?>
					</th>
					<th class="actions">
						<?php echo __('Actions'); ?>
					</th>
				</tr>
				<?php foreach ($rounds as $round): ?>
					<tr>
						<td>
							<?php echo $this->Html->link(
								$round->round_id, ['action' => 'view', $round->round_id]); 
							?>&nbsp;
						</td>
						<td>
							<?php echo h($round->round_name); ?>&nbsp;
						</td>
						<td>
							<a href="../../tournaments/<?php echo $round->tournament->tournament_id; ?>/<?php echo $round->tournament->tournament_slug; ?>">
								<?php echo $round->tournament->tournament_name . ' ' . $round->tournament->tournament_year ?>
							</a>
							<?php //echo $this->Html->link($round->tournament->tournament_name . ' ' . $round->tournament->tournament_year, ['controller' => 'tournaments', 'action' => 'view', $round->tournament->tournament_slug]); 
							?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link(
								$this->Html->tag('i', '', ['class' => 'glyphicon glyphicon-edit']) . "", ['action' => 'edit', $round->round_id], ['class' => 'btn btn-mini btn-noPadding', 'escape' => false]); 
							?>
							
							<?php echo $this->Form->postLink(
								$this->Html->tag('i', '', ['class' => 'glyphicon glyphicon-remove']). "", ['action' => 'delete', $round->round_id], ['escape' => false], __('Are you sure you want to delete %s?', $round->round_name), ['class' => 'btn btn-mini btn-noPadding']);
							?>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>
<?php echo $this->element('pagination'); ?>
