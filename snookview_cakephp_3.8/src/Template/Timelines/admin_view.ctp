<?php $this->start('meta'); ?>
	<title>Snookview - View Timeline</title>
<?php $this->end(); ?>
<?php echo $this->element('viewActions', array(
	"list" 		=> ' List Timelines',
	"edit" 		=> ' Edit Timeline',
	"delete" 	=> ' Delete Timeline',
	"id" 		=> $timeline->timeline_id,
	"display" 	=> $timeline->timeline_title
)); ?>
<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'			); ?></th>
			<th><?php echo __('Title'		); ?></th>
			<th><?php echo __('Description'	); ?></th>
			<th><?php echo __('Video'		); ?></th>
		</tr>
		<tr>
			<td><?php echo $timeline->timeline_id ?></td>
			<td><?php echo $timeline->timeline_title ?></td>
			<td><?php echo $timeline->timeline_description ?></td>
			<td><?php echo $this->Html->link($timeline->video->video_title, ['controller' => 'videos', 'action' => 'adminView', $timeline->video->video_id]); ?></td>
		</tr>
	</table>
</div>