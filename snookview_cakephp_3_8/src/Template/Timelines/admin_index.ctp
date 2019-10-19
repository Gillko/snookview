<?php $this->start('meta'); ?>
	<title>Snookview - Timelines</title>
<?php $this->end(); ?>
<div class="row">
	<?php 
		if(empty($timelines)){
			echo '<div id="flashMessage" class="message">' . 'No timelines have been added, please be the first to add a Timeline.' . '</div>';
		}
	?>
	<div class="col-md-2">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<?php echo $this->Html->link(__('New Timeline'), array('action' => 'adminAdd')); ?>
			</li>
		</ul>
	</div>

	<div class="col-md-10">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<tr>
					<th>
						<?php echo $this->Paginator->sort('timeline_id', 'ID'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('timeline_title', 'Title'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('timeline_description', 'Description'); ?>	
					</th>
					<th>
						<?php echo $this->Paginator->sort('video_id', 'Video'); ?>	
					</th>
					<th class="actions">
						<?php echo __('Actions'); ?>
					</th>
				</tr>
				<?php foreach ($timelines as $timeline): ?>
					<tr>
						<td>
							<?php echo $this->Html->link($timeline->timeline_id, ['action' => 'view', $timeline->timeline_id]); ?>
						</td>
						<td>
							<?php echo h($timeline->timeline_title); ?>
						</td>
						<td>
							<?php echo h($timeline->timeline_description); ?>
						</td>
						<td>
							<a href="../../videos/<?php echo $timeline->video->video_id; ?>/<?php echo $timeline->video->video_slug; ?>">
								<?php echo $timeline->video->video_title ?>
							</a>
							<?php //echo $this->Html->link($timeline->video->video_title, ['controller' => 'videos', 'action' => 'view', $timeline->video->video_slug]); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link(
								$this->Html->tag('i', '', ['class' => 'glyphicon glyphicon-edit']) . "",
									['action' => 'edit', $timeline->timeline_id],
									['class' => 'btn btn-mini btn-noPadding', 'escape' => false]
								); 
							?>
							<?php echo $this->Form->postLink(
								$this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove')). "",
									['action' => 'delete', $timeline->timeline_id],
									['escape'=>false],
									__('Are you sure you want to delete %s?', $timeline['Timeline']['timeline_title']), ['class' => 'btn btn-mini btn-noPadding']
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
