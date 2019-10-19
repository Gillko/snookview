<?php $this->start('meta'); ?>
	<title>Snookview - Edit Ranking</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Ranking.ranking_id')), null, __('Are you sure you want to delete %s?', $this->Form->value('Ranking.ranking_points'))); ?></li>
		</ul>
	</div>
	<div class="col-md-9">
		<?php echo $this->Form->create('Ranking', array(
				'inputDefaults' => array(
				'div' => 'form-group',
				'wrapInput' => false,
				'class' => 'form-control'
			),
				'class' => 'well'
			)); ?>
	<fieldset>
		<legend><?php echo __('Edit Ranking'); ?></legend>
	<?php
		echo $this->Form->input('ranking_id');
		echo $this->Form->input('ranking_rank', array(
			'label' => 'Rank',
			'placeholder' => 'Rank',
		));
		echo $this->Form->input('ranking_points', array(
			'label' => 'Points',
			'placeholder' => 'Points',
		));
		echo $this->Form->input('player_id');
		echo $this->Form->input('season_id');
	?>
	</fieldset>
	<?php echo $this->Form->end(array('label' => __('Edit', true), 'class' => 'btn btn-default btn-success btn-lg')); ?>
	</div>
</div>
