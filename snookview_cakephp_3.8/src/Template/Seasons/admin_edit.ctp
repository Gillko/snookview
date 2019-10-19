<?php $this->start('meta'); ?>
	<title>Snookview - Edit Season</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Season.season_id')), null, __('Are you sure you want to delete %s?', $this->Form->value('Season.season_beginYear'))); ?></li>
		</ul>
	</div>

	<div class="col-md-9">
		<?php echo $this->Form->create('Season', array(
			'inputDefaults' => array(
			'div' => 'form-group',
			'wrapInput' => false,
			'class' => 'form-control'
		),
			'class' => 'well'
		)); 
		?>
	<fieldset>
		<legend><?php echo __('Edit Season'); ?></legend>
	<?php
		echo $this->Form->input('season_id');
		echo $this->Form->input('season_beginYear', array(
			'type' => 'date',
		    'dateFormat' => 'Y',
		    'minYear' => date('Y')-100, 
		    'maxYear' => date('Y')-0+1, 
		    'label' => 'Begin Year',
		    'empty' => '- select -',
		    'default' => date('Y'),
		    'name' => 'data[Season][season_beginYear]',
		    'selected' => 'data[Season][season_beginYear]',
		));
		echo $this->Form->input('season_endYear', array(
			'type' => 'date',
		    'dateFormat' => 'Y',
		    'minYear' => date('Y')-100, 
		    'maxYear' => date('Y')-0+1, 
		    'label' => 'End Year',
		    'empty' => '- select -',
		    'default' => date('Y'),
		    'name' => 'data[Season][season_endYear]',
		    'selected' => 'data[Season][season_endYear]',
		));
	?>
	</fieldset>
	<?php echo $this->Form->end(array('label' => __('Edit', true), 'class' => 'btn btn-default btn-success btn-lg')); ?>
	</div>
</div>
