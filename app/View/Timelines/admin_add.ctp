<?php $this->start('meta'); ?>
	<title>Snookview - Add Timeline</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-12">
			<?php echo $this->Form->create('Timeline', array(
				'inputDefaults' => array(
				'div' => 'form-group',
				'wrapInput' => false,
				'class' => 'form-control'
			),
				'class' => 'well'
			)); ?>
	<fieldset>
		<legend><?php echo __('Add Timeline'); ?></legend>
	<?php
		echo $this->Form->input('timeline_title', array(
			'label' => 'Title',
			'placeholder' => 'Title',
		));
		echo $this->Form->input('timeline_description', array(
			'label' => 'Description',
			'placeholder' => 'Description',
		));
	?>
	</fieldset>
	<?php echo $this->Form->end(array('label' => __('Add', true), 'class' => 'btn btn-default btn-success btn-lg')); ?>
	</div>
</div>
