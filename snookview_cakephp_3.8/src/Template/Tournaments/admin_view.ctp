<?php $this->start('meta'); ?>
	<title>Snookview - View Tournament</title>
<?php $this->end(); ?>
<?php echo $this->element('viewActions', array(
	"list" 		=> ' List Tournaments',
	"edit" 		=> ' Edit Tournament',
	"delete" 	=> ' Delete Tournament',
	"id" 		=> $tournament->tournament_id,
	"display" 	=> $tournament->tournament_name . ' ' . $tournament->tournament_year
)); ?>
<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'			); ?></th>
			<th><?php echo __('year'		); ?></th>
			<th><?php echo __('Name'		); ?></th>
			<th><?php echo __('Vennue'		); ?></th>
			<th><?php echo __('Begin Date'	); ?></th>
			<th><?php echo __('End Date'	); ?></th>
			<th><?php echo __('Winner'		); ?></th>
		</tr>
		<tr>
			<td><?php echo $tournament->tournament_id 		?></td>
			<td><?php echo $tournament->tournament_year 	?></td>
			<td><?php echo $tournament->tournament_name 	?></td>
			<td><?php echo $tournament->tournament_vennue 	?></td>
			<td><?php echo date("d-m-Y", strtotime($tournament->tournament_beginDate)); ?></td>
			<td><?php echo date("d-m-Y", strtotime($tournament->tournament_endDate)); ?></td>
			<td><?php echo $this->Html->image('/img/winners/' . $tournament->tournament_winner, ['class' => 'thumb']); ?></td>
		</tr>
	</table>
</div>
<div class="related">
	<h3><?php echo __('Related Rounds'); ?></h3>
	<?php if (!empty($tournament->rounds)): ?>
	<div class="table-responsive">
		<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'		); ?></th>
			<th><?php echo __('Name'	); ?></th>
		</tr>
		<?php foreach ($tournament->rounds as $round): ?>
			<tr>
				<td><?php echo $this->Html->link($round->round_id, ['controller' => 'rounds', 'action' => 'adminView', $round->round_id]); ?></td>
				<td><?php echo $round->round_name; ?></td>
			</tr>
		<?php endforeach; ?>
		</table>
	</div>
<?php endif; ?>

<h3><?php echo __('Related Videos'); ?></h3>
<?php if (!empty($tournament->videos)): ?>
	<div class="table-responsive">
		<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'			); ?></th>
			<th><?php echo __('Name'		); ?></th>
			<th><?php echo __('Date'		); ?></th>
			<th><?php echo __('URL'			); ?></th>
			<th><?php echo __('Session'		); ?></th>
			<th><?php echo __('Timeline'	); ?></th>
			<th><?php echo __('Round'		); ?></th>
		</tr>
		<?php foreach ($tournament->videos as $video): ?>
			<tr>
				<td><?php echo $this->Html->link($video->video_id, ['controller' => 'videos', 'action' => 'adminView', $video->video_id]); ?></td>
				<td><?php echo $video->video_title 							?></td>
				<td><?php echo date("d-m-Y", strtotime($video->video_date)) ?></td>
				<td><?php echo $video->video_url 							?></td>
				<td><?php echo $video->session->session_title 				?></td>
				<td><?php echo $video->timeline->timeline_title 			?></td>
				<td><?php echo $video->round->round_name 					?></td>
			</tr>
		<?php endforeach; ?>
		</table>
	</div>
<?php endif; ?>
</div>