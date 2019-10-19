<?php $this->start('meta'); ?>
	<title>Snookview - Sessions</title>
<?php $this->end(); ?>
<div class="row">
	<?php 
		if(empty($sessions)){
			echo '<div id="flashMessage" class="message">' . 'No sessions have been added, please be the first to add a Session.' . '</div>';
		}
	?>
	<div class="col-md-2">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<?php echo $this->Html->link(__('New Session'), array('action' => 'adminAdd')); ?>
			</li>
		</ul>
	</div>
	<div class="col-md-10">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<tr>
					<th>
						<?php echo $this->Paginator->sort('session_id', 'ID'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('session_title', 'Title'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('session_description', 'Description'); ?>
					</th>
					<th class="actions">
						<?php echo __('Actions'); ?>	
					</th>
				</tr>
				<?php foreach ($sessions as $session): ?>
					<tr>
						<td>
							<?php echo $this->Html->link($session->session_id, ['action' => 'view', $session->session_id]); ?>
							</td>
						<td>
							<?php echo h($session->session_title); ?>
						</td>
						<td>
							<?php echo h($session->session_description); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'glyphicon glyphicon-edit']) . "", 
								['action' => 'edit', $session->session_id], 
								['class' => 'btn btn-mini btn-noPadding', 'escape' => false]
							); ?>
							<?php echo $this->Form->postLink(
								$this->Html->tag('i', '', ['class' => 'glyphicon glyphicon-remove']). "",
									['action' => 'delete', $session->session_id],
									['escape'=>false],
									__('Are you sure you want to delete %s?',$session->session_title),
									['class' => 'btn btn-mini btn-noPadding']
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
