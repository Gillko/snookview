<?php $this->start('meta'); ?>
	<title>Snookview - View Comment</title>
<?php $this->end(); ?>
<?php echo $this->element('viewActions', array(
	"list" => ' List Comments',
	"edit" => ' Edit Comment',
	"delete" => ' Delete Comment',
	"id" => $comment['Comment']['comment_id'],
	"display" => $comment['Comment']['comment_body']
)); ?>
<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('Body'); ?></th>
			<th><?php echo __('Created'); ?></th>
			<th><?php echo __('Modified'); ?></th>
			<th><?php echo __('User'); ?></th>
			<th><?php echo __('Video'); ?></th>
		</tr>
		<tr>
			<td><?php echo h($comment['Comment']['comment_id']); ?></td>
			<td><?php echo h($comment['Comment']['comment_body']); ?></td>
			<td><?php echo h(date("d-m-Y H:i:s", strtotime($comment['Comment']['created']))); ?></td>
			<td><?php echo h(date("d-m-Y H:i:s", strtotime($comment['Comment']['modified']))); ?></td>
			<td>
				<?php echo $this->Html->link($comment['User']['user_username'], array('controller' => 'users', 'action' => 'view', $comment['User']['user_id'])); ?>
			</td>
			<td>
				<?php echo $this->Html->link($comment['Video']['video_title'], array('controller' => 'videos', 'action' => 'view', $comment['Video']['video_id'])); ?>
			</td>
		</tr>
	</table>
</div>