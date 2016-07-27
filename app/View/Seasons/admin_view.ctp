<?php $this->start('meta'); ?>
	<title>Snookview - View Season</title>
<?php $this->end(); ?>
<?php echo $this->element('viewActions', array(
	"list" => ' List Seasons',
	"edit" => ' Edit Season',
	"delete" => ' Delete Season',
	"id" => $season['Season']['season_id'],
	"display" => $season['Season']['season_beginYear']
)); ?>

<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('BeginYear'); ?></th>
			<th><?php echo __('EndYear'); ?></th>
		</tr>
		<tr>
			<td><?php echo h($season['Season']['season_id']); ?></td>
			<td><?php echo h($season['Season']['season_beginYear']); ?></td>
			<td><?php echo h($season['Season']['season_endYear']); ?></td>
		</tr>
	</table>
</div>