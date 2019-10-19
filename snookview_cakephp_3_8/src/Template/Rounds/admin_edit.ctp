<?php $this->start('meta'); ?>
	<title>Snookview - Edit Round</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Round.round_id')), null, __('Are you sure you want to delete %s?', $this->Form->value('Round.round_name'))); ?></li>
		</ul>
	</div>

	<div class="col-md-9">
		<?php echo $this->Form->create('Round', array(
			'inputDefaults' => array(
			'div' => 'form-group',
			'wrapInput' => false,
			'class' => 'form-control'
		),
			'class' => 'well'
		)); 
		?>
		<fieldset>
			<legend><?php echo __('Edit Round'); ?></legend>
		<?php
			echo $this->Form->input('round_id');
			echo $this->Form->input('round_name', array(
				'label' => 'Name'
			));
			echo $this->Form->input('round_slug', array(
				'label' => 'Slug',
				'placeholder' => 'Slug',
				));
			echo $this->Form->input('round_route', array(
				'label' => 'URL route',
				'placeholder' => 'URL route',
			));
			echo $this->Form->input('tournament_id');
		?>
		</fieldset>
		<?php echo $this->Form->end(array('label' => __('Edit', true), 'class' => 'btn btn-default btn-success btn-lg')); ?>
	</div>
</div>
<script>
$('#RoundRoundName').bind('keypress blur', function() {
	$('#RoundRoundSlug').val(
		$('#RoundTournamentId option:selected').text().toLowerCase().replace(
			/['"’\s]/g, '-') + '/' +
		$('#RoundRoundName').val().toLowerCase().replace(
			/['"’\s]/g, '-')
		);
});

$('#RoundRoundSlug').bind('keypress blur', function() {
	$('#RoundRoundRoute').val('Router::connect("/rounds/' + $('#RoundRoundSlug').val() + '", array("controller" => "rounds", "action" => "view", ' + $('#RoundRoundId').val() +'));');
});
</script>