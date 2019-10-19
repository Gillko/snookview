<?php $this->start('meta'); ?>
	<title>Snookview - Edit Favorite</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Favorite.favorite_id')), null, __('Are you sure you want to delete %s?', $this->Form->value('Favorite.favorite_id'))); ?></li>
		</ul>
	</div>
	<div class="col-md-9">
		<?php echo $this->Form->create('Favorite', array(
			'inputDefaults' => array(
			'div' => 'form-group',
			'wrapInput' => false,
			'class' => 'form-control'
		),
			'class' => 'well'
		)); ?>
	<fieldset>
		<legend><?php echo __('Edit Favorite'); ?></legend>
	<?php
		echo $this->Form->input('favorite_id');
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
	<?php echo $this->Form->end(array('label' => __('Edit', true), 'class' => 'btn btn-default btn-success btn-lg')); ?>
	</div>
</div>

