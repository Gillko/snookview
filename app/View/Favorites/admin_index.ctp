<?php $this->start('meta'); ?>
	<title>Snookview - Favorites</title>
<?php $this->end(); ?>
<div class="row">
	<?php 
	if(empty($favorites)){
		echo '<div id="flashMessage" class="message">' . 'No favorites have been added, please be the first to add a Favorite.' . '</div>';
	} ?>
	<div class="col-md-2">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Html->link(__('New Favorite'), array('action' => 'add')); ?></li>
		</ul>
	</div>
	<div class="col-md-10">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<tr>
					<th><?php echo $this->Paginator->sort('favorite_id', 'ID'); ?></th>
					<th><?php echo $this->Paginator->sort('user_id', 'User'); ?></th>
					<th><?php echo $this->Paginator->sort('video_id', 'Video'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
				<?php foreach ($favorites as $favorite): ?>
					<tr>
						<td><?php echo $this->Html->link($favorite['Favorite']['favorite_id'], array('action' => 'view', $favorite['Favorite']['favorite_id'])); ?></td>
						<td>
							<?php echo $this->Html->link($favorite['User']['user_username'], array('controller' => 'users', 'action' => 'view', $favorite['User']['user_id'])); ?>
						</td>
						<td>
							<?php echo $this->Html->link($favorite['Video']['video_title'], array('controller' => 'videos', 'action' => 'view', $favorite['Video']['video_id'])); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link(
							    $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-edit')) . "",
							    array('action' => 'edit', $favorite['Favorite']['favorite_id']),
							    array('class' => 'btn btn-mini btn-noPadding', 'escape' => false)
							); ?>
							<?php echo $this->Form->postLink(
							   $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove')). "",
							        array('action' => 'delete', $favorite['Favorite']['favorite_id']),
							        array('escape'=>false),
							    __('Are you sure you want to delete %s?', $favorite['Video']['video_title']),
							   array('class' => 'btn btn-mini btn-noPadding')
							); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>
<?php echo $this->element('pagination'); ?>

