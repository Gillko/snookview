<?php $this->start('meta'); ?>
	<title>Snookview - Timelines</title>
<?php $this->end(); ?>
<div class="row">
	<?php 
	if(empty($timelines)){
		echo '<div id="flashMessage" class="message">' . 'No timelines have been added, please be the first to add a Timeline.' . '</div>';
	} ?>
	<div class="col-md-2">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Html->link(__('New Timeline'), array('action' => 'add')); ?></li>
		</ul>
	</div>

	<div class="col-md-10">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<tr>
					<th><?php echo $this->Paginator->sort('timeline_id', 'ID'); ?></th>
					<th><?php echo $this->Paginator->sort('timeline_title', 'Title'); ?></th>
					<th><?php echo $this->Paginator->sort('timeline_description', 'Description'); ?></th>
					<th><?php echo $this->Paginator->sort('video_id', 'Video'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
				<?php foreach ($timelines as $timeline): ?>
				<tr>
					<td><?php echo $this->Html->link($timeline['Timeline']['timeline_id'], array('action' => 'view', $timeline['Timeline']['timeline_id'])); ?></td>
					<td><?php echo h($timeline['Timeline']['timeline_title']); ?></td>
					<td><?php echo h($timeline['Timeline']['timeline_description']); ?></td>
					<td>
						<?php echo $this->Html->link($timeline['Video']['video_title'], array('controller' => 'videos', 'action' => 'view', $timeline['Video']['video_id'])); ?>
					</td>
					<td class="actions">
						<?php echo $this->Html->link(
						    $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-edit')) . "",
						    array('action' => 'edit', $timeline['Timeline']['timeline_id']),
						    array('class' => 'btn btn-mini btn-noPadding', 'escape' => false)
						); ?>
						<?php echo $this->Form->postLink(
						   $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove')). "",
						        array('action' => 'delete', $timeline['Timeline']['timeline_id']),
						        array('escape'=>false),
						    __('Are you sure you want to delete %s?', $timeline['Timeline']['timeline_title']),
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
