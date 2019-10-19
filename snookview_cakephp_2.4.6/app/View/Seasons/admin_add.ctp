<?php $this->start('meta'); ?>
	<title>Snookview - Add Season</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-12">
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
		<legend><?php echo __('Add Season'); ?></legend>
		<?php
			echo $this->Form->input('season_beginYear', array(
				'type' => 'date',
			    'dateFormat' => 'Y',
			    'minYear' => date('Y')-100, 
			    'maxYear' => date('Y')-0+1, 
			    'label' => 'Begin Year',
			    'empty' => '- select -',
			    /*'default' => 'Y',*/
			    'name' => 'data[Season][season_beginYear]',
			));
			echo $this->Form->input('season_endYear', array(
				'type' => 'date',
			    'dateFormat' => 'Y',
			    'minYear' => date('Y')-100, 
			    'maxYear' => date('Y')-0+1, 
			    'label' => 'End Year',
			    'empty' => '- select -',
			   /* 'default' => date('Y'),*/
			    'name' => 'data[Season][season_endYear]',
			));
		?>
	</fieldset>
	<?php echo $this->Form->end(array('label' => __('Add', true), 'class' => 'btn btn-default btn-success btn-lg')); ?>
	</div>
</div>