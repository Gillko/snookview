<?php $this->start('meta'); ?>
	<title>Snookview - Add Favorite</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-12">
		<?php echo $this->Form->create('Favorite', array(
			'inputDefaults' => array(
			'div' => 'form-group',
			'wrapInput' => false,
			'class' => 'form-control'
		),
			'class' => 'well'
		)); ?>
	<fieldset>
		<legend><?php echo __('Add Favorite'); ?></legend>
		<?php
			echo $this->Form->input('user_id', array(
				'label' => 'User',
				'placeholder' => 'User',
			));
			echo $this->Form->input('video_id', array(
				'label' => 'Video',
				'placeholder' => 'Video',
			));
		?>
	</fieldset>
	<?php echo $this->Form->end(array('label' => __('Add', true), 'class' => 'btn btn-default btn-success btn-lg')); ?>
	</div>
</div>