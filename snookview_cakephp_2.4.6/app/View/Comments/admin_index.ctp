<?php $this->start('meta'); ?>
	<title>Snookview - Comments</title>
<?php $this->end(); ?>
<div class="row">
	<?php 
	if(empty($comments)){
		echo '<div id="flashMessage" class="message">' . 'No comments have been added, please be the first to add a Comment.' . '</div>';
	} ?>
	<div class="col-md-2">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Html->link(__('New Comment'), array('action' => 'add')); ?></li>
		</ul>
	</div>
	<div class="col-md-10">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<tr>
					<th><?php echo $this->Paginator->sort('comment_id', 'ID'); ?></th>
					<th><?php echo $this->Paginator->sort('comment_body', 'Body'); ?></th>
					<th><?php echo $this->Paginator->sort('created', 'Created'); ?></th>
					<th><?php echo $this->Paginator->sort('modified', 'Modified'); ?></th>
					<th><?php echo $this->Paginator->sort('user_id', 'User'); ?></th>
					<th><?php echo $this->Paginator->sort('video_id', 'Video'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
				<?php foreach ($comments as $comment): ?>
					<tr>
						<td><?php echo $this->Html->link($comment['Comment']['comment_id'], array('action' => 'view', $comment['Comment']['comment_id'])); ?>&nbsp;</td>
						<td><?php echo h($comment['Comment']['comment_body']); ?>&nbsp;</td>
						<td><?php echo h(date("d-m-Y H:i:s", strtotime($comment['Comment']['created']))); ?></td>
						<td><?php echo h(date("d-m-Y H:i:s", strtotime($comment['Comment']['modified']))); ?></td>
						<td>
							<?php echo $this->Html->link($comment['User']['user_username'], array('controller' => 'users', 'action' => 'view', $comment['User']['user_id'])); ?>
						</td>
						<td>
							<?php echo $this->Html->link($comment['Video']['video_title'], array('controller' => 'videos', 'action' => 'view', $comment['Video']['video_id'])); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link(
							    $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-edit')) . "",
							    array('action' => 'edit', $comment['Comment']['comment_id']),
							    array('class' => 'btn btn-mini btn-noPadding', 'escape' => false)
							); ?>
							<?php echo $this->Form->postLink(
							   $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove')). "",
							        array('action' => 'delete', $comment['Comment']['comment_id']),
							        array('escape'=>false),
							    __('Are you sure you want to delete %s?', $comment['Comment']['comment_body']),
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