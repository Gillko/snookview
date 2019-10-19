<?php $this->start('meta'); ?>
	<title>Snookview - Tournaments</title>
<?php $this->end(); ?>
<div class="row">
	<?php 
		if(empty($tournaments)){
			echo '<div id="flashMessage" class="message">' . 'No tournaments have been added, please be the first to add a Tournament.' . '</div>';
		}
	?>
	<div class="col-md-2">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Html->link(__('New Tournament'), ['action' => 'adminAdd']); ?></li>
		</ul>
	</div>
	<div class="col-md-10">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<tr>
					<th>
						<?php echo $this->Paginator->sort('tournament_id'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('tournament_year', 'Year'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('tournament_name', 'Name'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('tournament_vennue', 'Vennue'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('tournament_beginDate', 'Start'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('tournament_endDate', 'End'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('tournament_winner', 'Winner'); ?>
					</th>
					<th class="actions">
						<?php echo __('Actions'); ?>
					</th>
				</tr>
				<?php foreach ($tournaments as $tournament): ?>
				<tr>
					<td>
						<?php echo $this->Html->link(
							$tournament->tournament_id, ['action' => 'view', $tournament->tournament_id]); 
						?>
					</td>
					<td>
						<?php echo h($tournament->tournament_year); ?>
					</td>
					<td>
						<?php echo h($tournament->tournament_name); ?>
					</td>
					<td>
						<?php echo h($tournament->tournament_vennue); ?>
					</td>
					<td>
						<?php echo h(date("d-m-Y", strtotime($tournament->tournament_beginDate))); ?>
					</td>
					<td>
						<?php echo h(date("d-m-Y", strtotime($tournament->tournament_endDate))); ?>
					</td>
					<td>
						<?php echo $this->Html->image(h($tournament->tournament_winner), ['class' => 'thumb']); ?>
					</td>
					<td class="actions">
						<?php echo $this->Html->link(
							$this->Html->tag('i', '', ['class' => 'glyphicon glyphicon-edit']) . "",
								['action' => 'edit', $tournament->tournament_id],
								['class' => 'btn btn-mini btn-noPadding', 'escape' => false]
							);
						?>
						<?php echo $this->Form->postLink(
							$this->Html->tag('i', '', ['class' => 'glyphicon glyphicon-remove']). "",
								['action' => 'delete', $tournament->tournament_id],
								['escape'=>false],
								__('Are you sure you want to delete %s?', $tournament->tournament_name), ['class' => 'btn btn-mini btn-noPadding']
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