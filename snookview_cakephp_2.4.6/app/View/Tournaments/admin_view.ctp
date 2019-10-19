<?php $this->start('meta'); ?>
	<title>Snookview - View Tournament</title>
<?php $this->end(); ?>
<?php echo $this->element('viewActions', array(
	"list" => ' List Tournaments',
	"edit" => ' Edit Tournament',
	"delete" => ' Delete Tournament',
	"id" => $tournament['Tournament']['tournament_id'],
	"display" => $tournament['Tournament']['tournament_name']
)); ?>
<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('year'); ?></th>
			<th><?php echo __('Name'); ?></th>
			<th><?php echo __('Vennue'); ?></th>
			<th><?php echo __('Begin Date'); ?></th>
			<th><?php echo __('End Date'); ?></th>
			<th><?php echo __('Winner'); ?></th>
		</tr>
		<tr>
			<td><?php echo h($tournament['Tournament']['tournament_id']); ?></td>
			<td><?php echo h($tournament['Tournament']['tournament_year']); ?></td>
			<td><?php echo h($tournament['Tournament']['tournament_name']); ?></td>
			<td><?php echo h($tournament['Tournament']['tournament_vennue']); ?></td>
			<td><?php echo h(date("d-m-Y", strtotime($tournament['Tournament']['tournament_beginDate']))); ?></td>
			<td><?php echo h(date("d-m-Y", strtotime($tournament['Tournament']['tournament_endDate']))); ?></td>
			<td><?php echo $this->Html->image(h($tournament['Tournament']['tournament_winner']), array('class' => 'thumb')); ?></td>
		</tr>
	</table>
</div>
<div class="related">
	<h3><?php echo __('Related Rounds'); ?></h3>
	<?php if (!empty($tournament['Round'])): ?>
	<div class="table-responsive">
		<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('Name'); ?></th>
		</tr>
		<?php foreach ($tournament['Round'] as $round): ?>
			<tr>
				<td><?php echo $this->Html->link($round['round_id'], array('controller' => 'rounds', 'action' => 'view', $round['round_id'])); ?></td>
				<td><?php echo $round['round_name']; ?></td>
			</tr>
		<?php endforeach; ?>
		</table>
	</div>
<?php endif; ?>

<h3><?php echo __('Related Videos'); ?></h3>
<?php if (!empty($tournament['Video'])): ?>
	<div class="table-responsive">
		<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('Name'); ?></th>
		</tr>
		<?php foreach ($tournament['Video'] as $video): ?>
			<tr>
				<td><?php echo $this->Html->link($video['video_id'], array('controller' => 'videos', 'action' => 'view', $video['video_id'])); ?></td>
				<td><?php echo $video['video_title']; ?></td>
			</tr>
		<?php endforeach; ?>
		</table>
	</div>
<?php endif; ?>
</div>