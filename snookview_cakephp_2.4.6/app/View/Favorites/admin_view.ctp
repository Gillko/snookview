<?php $this->start('meta'); ?>
	<title>Snookview - View Favorite</title>
<?php $this->end(); ?>
<?php echo $this->element('viewActions', array(
	"list" => ' List Favorites',
	"edit" => ' Edit Favorite',
	"delete" => ' Delete Favorite',
	"id" => $favorite['Favorite']['favorite_id'],
	"display" => $favorite['Video']['video_title']
)); ?>
<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('User'); ?></th>
			<th><?php echo __('Video'); ?></th>
		</tr>
		<tr>
			<td><?php echo h($favorite['Favorite']['favorite_id']); ?></td>
			<td>
				<?php echo $this->Html->link($favorite['User']['user_username'], array('controller' => 'users', 'action' => 'view', $favorite['User']['user_id'])); ?>
			</td>
			<td>
				<?php echo $this->Html->link($favorite['Video']['video_title'], array('controller' => 'videos', 'action' => 'view', $favorite['Video']['video_id'])); ?>
			</td>
		</tr>
	</table>
</div>