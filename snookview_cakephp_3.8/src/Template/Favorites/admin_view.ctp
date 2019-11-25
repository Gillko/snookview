<?php $this->start('meta'); ?>
	<title>Snookview - View Favorite</title>
<?php $this->end(); ?>
<?php echo $this->element('viewActions', array(
	"list" 		=> ' List Favorites',
	"edit" 		=> ' Edit Favorite',
	"delete" 	=> ' Delete Favorite',
	"id" 		=> $favorite->favorite_id,
	"display" 	=> 'the favorite ' . $favorite->video->video_title
)); ?>
<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'		); ?></th>
			<th><?php echo __('User'	); ?></th>
			<th><?php echo __('Video'	); ?></th>
		</tr>
		<tr>
			<td><?php echo $favorite->favorite_id ?></td>
			<td>
				<?php 
					echo $this->Html->link(
						$favorite->user->user_username, [
							'controller' => 'users', 
							'action' => 'adminView', 
							$favorite->user->user_id]
						); 
					?>
			</td>
			<td>
				<?php 
					echo $this->Html->link(
						$favorite->video->video_title, [
							'controller' => 'videos', 
							'action' => 'adminView', 
							$favorite->video->video_id
						]
					); 
				?>
			</td>
		</tr>
	</table>
</div>