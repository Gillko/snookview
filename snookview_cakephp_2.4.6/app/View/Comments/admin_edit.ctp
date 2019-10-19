<?php $this->start('meta'); ?>
	<title>Snookview - Edit Comment</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Comment.comment_id')), null, __('Are you sure you want to delete %s?', $this->Form->value('Comment.comment_body'))); ?></li>
		</ul>
	</div>
	<div class="col-md-9">
		<?php echo $this->Form->create('Comment', array(
			'inputDefaults' => array(
			'div' => 'form-group',
			'wrapInput' => false,
			'class' => 'form-control'
		),
			'class' => 'well'
		)); ?>
	<fieldset>
		<legend><?php echo __('Edit Comment'); ?></legend>
	<?php
		echo $this->Form->input('comment_id');
		echo $this->Form->input('comment_body', array(
			'label' => 'Body',
			'placeholder' => 'Body',
		));
		/*echo $this->Form->input('modified', array(
			'type' => 'hidden',
			'label' => 'Modified',
			'class' => 'form-control date',
		));*/
		echo $this->Form->input('user_id');
		echo $this->Form->input('video_id');
	?>
	</fieldset>
	<?php echo $this->Form->end(array('label' => __('Edit', true), 'class' => 'btn btn-default btn-success btn-lg')); ?>
	</div>
</div>
