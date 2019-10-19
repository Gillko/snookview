<?php $this->start('meta'); ?>
	<title>Snookview - Comment</title>
<?php $this->end(); ?>
<div class="row padding-top">
	<div class="col-md-1">
	</div>
	<div class="col-md-10">
		<h3><?php echo __('Edit Your Comment'); ?></h3>
		<?php echo $this->Form->create('Comment', array(
			'inputDefaults' => array(
			'div' => 'form-group',
			'wrapInput' => false,
			'class' => 'form-control'
		)
		)); ?>
	<fieldset>
	<?php
		echo $this->Form->input('comment_id');
		echo $this->Form->input('comment_body', array(
			'label' => 'Comment',
			'placeholder' => 'Comment',
		));
		/*echo $this->Form->input('modified', array(
			'type' => 'hidden',
			'class' => 'form-control date'
		));*/
	?>
	</fieldset>
	<?php echo $this->Form->end(array('label' => __('Edit Comment', true), 'class' => 'btn btn-default btn-success btn-lg')); ?>
	</div>
	<div class="col-md-1">
	</div>
</div>