<?php $this->start('meta'); ?>
	<title>Snookview - Add Comment</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-12">
		<?php echo $this->Form->create('Comment', array(
			'inputDefaults' => array(
			'div' => 'form-group',
			'wrapInput' => false,
			'class' => 'form-control'
		),
			'class' => 'well'
		)); ?>
	<fieldset>
		<legend><?php echo __('Add Comment'); ?></legend>
		<?php
			echo $this->Form->input('comment_body', array(
				'label' => 'Body',
				'placeholder' => 'Body',
			));
			echo $this->Form->input('comment_created', array(
				'type' => 'hidden'
			));
			/*echo $this->Form->input('comment_modified');
			echo $this->Form->input('comment_deleted');*/
			echo $this->Form->input('user_id');
			echo $this->Form->input('video_id');
		?>
	</fieldset>
	<?php echo $this->Form->end(array('label' => __('Add', true), 'class' => 'btn btn-default btn-success btn-lg')); ?>
	</div>
</div>
