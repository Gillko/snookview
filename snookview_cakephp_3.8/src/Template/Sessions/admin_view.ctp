<?php $this->start('meta'); ?>
	<title>Snookview - View Session</title>
<?php $this->end(); ?>
<?php echo $this->element('viewActions', array(
	"list" 		=> ' List Sessions',
	"edit" 		=> ' Edit Session',
	"delete" 	=> ' Delete Session',
	"id" 		=> $session->session_id,
	"display" 	=> $session->session_title
)); ?>
<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'			); ?></th>
			<th><?php echo __('Title'		); ?></th>
			<th><?php echo __('Description'	); ?></th>
		</tr>
		<tr>
			<td><?php echo $session->session_id; 			?></td>
			<td><?php echo $session->session_title 			?></td>
			<td><?php echo $session->session_description	?></td>
		</tr>
	</table>
</div>