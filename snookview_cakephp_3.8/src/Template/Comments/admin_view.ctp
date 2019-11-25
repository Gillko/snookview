<?php $this->start('meta'); ?>
	<title>Snookview - View Comment</title>
<?php $this->end(); ?>
<?php echo $this->element('viewActions', array(
	"list" 		=> ' List Comments',
	"edit" 		=> ' Edit Comment',
	"delete" 	=> ' Delete Comment',
	"id" 		=> $comment->comment_id,
	"display" 	=> $comment->comment_body
)); ?>
<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'			); ?></th>
			<th><?php echo __('Body'		); ?></th>
			<th><?php echo __('Created'		); ?></th>
			<th><?php echo __('Modified'	); ?></th>
			<th><?php echo __('User'		); ?></th>
			<th><?php echo __('Video'		); ?></th>
		</tr>
		<tr>
			<td><?php echo $comment->comment_id 		?></td>
			<td><?php echo $comment->comment_body 	 	?></td>
			<td>
				<?php 
					echo date(
						"d-m-Y H:i:s", 
						strtotime(
							$comment->created
						)
					); 
				?>
			</td>
			<td>
				<?php 
					echo date(
						"d-m-Y H:i:s", 
						strtotime(
							$comment->modified
						)
					); 
				?>
			</td>
			<td>
				<?php 
					echo $this->Html->link(
						$comment->user->user_username, [
							'controller' => 'users', 
							'action' => 'adminView', 
							$comment->user->user_id
						]
					); 
				?>
			</td>
			<td>
				<?php 
					echo $this->Html->link(
						$comment->video->video_title, [
							'controller' => 'videos', 
							'action' => 'adminView', 
							$comment->video->video_id
						]
					); 
				?>
			</td>
		</tr>
	</table>
</div>