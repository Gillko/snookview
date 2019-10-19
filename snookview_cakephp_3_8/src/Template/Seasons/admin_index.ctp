<?php $this->start('meta'); ?>
	<title>Snookview - Seasons</title>
<?php $this->end(); ?>
<div class="row">
	<?php 
		if(empty($seasons)){
			echo '<div id="flashMessage" class="message">' . 'No seasons have been added, please be the first to add a Season.' . '</div>';
		}
	?>
	<div class="col-md-2">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<?php echo $this->Html->link(__('New Season'), ['action' => 'adminAdd']); ?>
			</li>
		</ul>
	</div>
	<div class="col-md-10">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<tr>
					<th>
						<?php echo $this->Paginator->sort('season_id', 'ID'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('season_beginYear', 'Begin Year'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('season_endYear', 'End Year'); ?>
					</th>
					<th class="actions">
						<?php echo __('Actions'); ?>
					</th>
				</tr>
				<?php foreach ($seasons as $season): ?>
					<tr>
						<td>
							<?php echo $this->Html->link($season->season_id, ['action' => 'view', $season->season_id]); ?>
						</td>
						<td>
							<?php echo h($season->season_beginYear); ?>
						</td>
						<td>
							<?php echo h($season->season_endYear); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link(
								$this->Html->tag('i', '', ['class' => 'glyphicon glyphicon-edit']),
									['action' => 'edit', $season->season_id],
									['class' => 'btn btn-mini btn-noPadding', 'escape' => false]
								); 
							?>
							<?php echo $this->Form->postLink(
								$this->Html->tag('i', '', ['class' => 'glyphicon glyphicon-remove']),
									['action' => 'delete', $season->season_id],
									['class' => 'btn btn-mini btn-noPadding', 'escape'=>false],
									__('Are you sure you want to delete %s?', $season->season_beginYear)
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