<?php $this->start('meta'); ?>
	<title>Snookview - Comments</title>
<?php $this->end(); ?>
<div class="row padding-top">
	<div class="col-md-1">
	</div>
	<div class="col-md-10 favorites noPaddingTablet noPaddingMobile">
		<h3>My Comments</h3>
		<?php foreach ($comments as $comment) if ($comment['Comment']['user_id'] == $current_user['user_id']): ?>
			<div class="box text-center">
				<a href='/videos/<?php echo $comment['Video']['video_slug']; ?>'>
					<p><?php echo $comment['Comment']['comment_body']; ?></p>
				</a>
				<div class="text-right">
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $comment['Comment']['comment_id']), null, __('Are you sure you want to delete %s?', $comment['Comment']['comment_body'])); ?>
					<?php echo $this->Html->link(
					    $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-edit')) . "",
					    array('action' => 'edit', $comment['Comment']['comment_id']),
					    array('class' => 'btn btn-mini', 'escape' => false)
					); ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
	<div class="col-md-1">
	</div>
</div>