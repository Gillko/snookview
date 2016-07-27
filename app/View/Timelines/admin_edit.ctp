<?php $this->start('meta'); ?>
	<title>Snookview - Edit Timeline</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Timeline.timeline_id')), null, __('Are you sure you want to delete %s?', $this->Form->value('Timeline.timeline_title'))); ?></li>
		</ul>
	</div>
	<div class="col-md-9">
			<?php echo $this->Form->create('Timeline', array(
				'inputDefaults' => array(
				'div' => 'form-group',
				'wrapInput' => false,
				'class' => 'form-control'
			),
				'class' => 'well'
			)); ?>
	<fieldset>
		<legend><?php echo __('Edit Timeline'); ?></legend>
	<?php
		echo $this->Form->input('timeline_id');
		echo $this->Form->input('timeline_title', array(
			'label' => 'Title',
			'placeholder' => 'Title'
		));
		echo $this->Form->input('timeline_description', array(
			'label' => 'Description',
			'placeholder' => 'Description',
		));
		/*echo $this->Form->input('video_id');
		echo $this->Form->input('tournament_id');
		echo $this->Form->input('round_id');*/
	?>
	</fieldset>
	<?php echo $this->Form->end(array('label' => __('Edit', true), 'class' => 'btn btn-default btn-success btn-lg')); ?>
	</div>
</div>
