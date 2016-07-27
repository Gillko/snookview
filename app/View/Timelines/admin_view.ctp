<?php $this->start('meta'); ?>
	<title>Snookview - View Timeline</title>
<?php $this->end(); ?>
<?php echo $this->element('viewActions', array(
	"list" => ' List Timelines',
	"edit" => ' Edit Timeline',
	"delete" => ' Delete Timeline',
	"id" => $timeline['Timeline']['timeline_id'],
	"display" => $timeline['Timeline']['timeline_title']
)); ?>
<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('Title'); ?></th>
			<th><?php echo __('Description'); ?></th>
			<th><?php echo __('Video'); ?></th>
		</tr>
		<tr>
			<td><?php echo h($timeline['Timeline']['timeline_id']); ?></td>
			<td><?php echo h($timeline['Timeline']['timeline_title']); ?></td>
			<td><?php echo h($timeline['Timeline']['timeline_description']); ?></td>
			<td><?php echo $this->Html->link($timeline['Video']['video_title'], array('controller' => 'videos', 'action' => 'view', $timeline['Video']['video_id'])); ?></td>
		</tr>
	</table>
</div>