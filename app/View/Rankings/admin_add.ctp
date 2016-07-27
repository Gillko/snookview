<?php $this->start('meta'); ?>
	<title>Snookview - Add Ranking</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-12">
		<?php echo $this->Form->create('Ranking', array(
				'inputDefaults' => array(
				'div' => 'form-group',
				'wrapInput' => false,
				'class' => 'form-control'
			),
				'class' => 'well'
			)); ?>
	<fieldset>
		<legend><?php echo __('Add Ranking'); ?></legend>
	<?php
		echo $this->Form->input('ranking_rank', array(
			'label' => 'Rank',
			'placeholder' => 'Rank',
		));
		echo $this->Form->input('ranking_points', array(
			'label' => 'Ranking Points',
			'placeholder' => 'Ranking Points',
		));
		echo $this->Form->input('player_id');
		echo $this->Form->input('season_id');
	?>
	</fieldset>
	<?php echo $this->Form->end(array('label' => __('Add', true), 'class' => 'btn btn-default btn-success btn-lg')); ?>
	</div>
</div>
