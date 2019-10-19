<?php $this->start('meta'); ?>
	<title>Snookview - Tournaments</title>
<?php $this->end(); ?>
<div class="row">
	<?php 
	if(empty($tournaments)){
		echo '<div id="flashMessage" class="message">' . 'No tournaments have been added, please be the first to add a Tournament.' . '</div>';
	} ?>
	<div class="col-md-2">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Html->link(__('New Tournament'), array('action' => 'add')); ?></li>
		</ul>
	</div>
	<div class="col-md-10">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<tr>
						<th><?php echo $this->Paginator->sort('tournament_id'); ?></th>
						<th><?php echo $this->Paginator->sort('tournament_year', 'Year'); ?></th>
						<th><?php echo $this->Paginator->sort('tournament_name', 'Name'); ?></th>
						<th><?php echo $this->Paginator->sort('tournament_vennue', 'Vennue'); ?></th>
						<th><?php echo $this->Paginator->sort('tournament_beginDate', 'Start'); ?></th>
						<th><?php echo $this->Paginator->sort('tournament_endDate', 'End'); ?></th>
						<th><?php echo $this->Paginator->sort('tournament_winner', 'Winner'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
				<?php foreach ($tournaments as $tournament): ?>
				<tr>
					<td>
						<?php echo $this->Html->link(
							$tournament['Tournament']['tournament_id'], array(
									'action' => 'view', 
									$tournament['Tournament']['tournament_id']
								)); 
						?>
					</td>
					<td><?php echo h($tournament['Tournament']['tournament_year']); ?></td>
					<td><?php echo h($tournament['Tournament']['tournament_name']); ?></td>
					<td><?php echo h($tournament['Tournament']['tournament_vennue']); ?></td>
					<td><?php echo h(date("d-m-Y", strtotime($tournament['Tournament']['tournament_beginDate']))); ?></td>
					<td><?php echo h(date("d-m-Y", strtotime($tournament['Tournament']['tournament_endDate']))); ?></td>
					<td><?php echo $this->Html->image(h($tournament['Tournament']['tournament_winner']), array('class' => 'thumb')); ?></td>
					<td class="actions">
						<?php echo $this->Html->link(
						    $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-edit')) . "",
						    array('action' => 'edit', $tournament['Tournament']['tournament_id']),
						    array('class' => 'btn btn-mini btn-noPadding', 'escape' => false)
						); ?>
						<?php echo $this->Form->postLink(
						   $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove')). "",
						        array('action' => 'delete', $tournament['Tournament']['tournament_id']),
						        array('escape'=>false),
						    __('Are you sure you want to delete %s?', $tournament['Tournament']['tournament_name']),
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