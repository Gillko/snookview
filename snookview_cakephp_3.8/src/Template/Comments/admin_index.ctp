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
			<li><?php echo $this->Html->link(__('New Comment'), ['action' => 'adminAdd']); ?></li>
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
						<td><?php echo $this->Html->link($comment->comment_id, ['action' => 'adminView', $comment->comment_id]); ?>&nbsp;</td>
						<td><?php echo h($comment->comment_body); ?>&nbsp;</td>
						<td><?php echo h(date("d-m-Y H:i:s", strtotime($comment->created))); ?></td>
						<td><?php echo h(date("d-m-Y H:i:s", strtotime($comment->modified))); ?></td>
						<td>
							<?php echo $this->Html->link($comment->user->user_username, ['controller' => 'users', 'action' => 'view', $comment->user->user_id]); ?>
						</td>
						<td>
							<a href="../../videos/<?php echo $comment->video->video_id; ?>/<?php echo $comment->video->video_slug; ?>">
								<?php echo $comment->video->video_title ?>
							</a>
							<?php //echo $this->Html->link($comment->video->video_title, ['controller' => 'videos', 'action' => 'view', $comment->video->video_slug]); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link(
							    $this->Html->tag('i', '', ['class' => 'glyphicon glyphicon-edit']) . "",
							    ['action' => 'adminEdit', $comment->comment_id],
							    ['class' => 'btn btn-mini btn-noPadding', 'escape' => false]
							); ?>

							<?php echo $this->element('deleteAction', array(
								"idDeleteAction" 		=> $comment->comment_id,
								"displayDeleteAction" 	=> $comment->comment_body
							)); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>
<?php echo $this->element('pagination'); ?>