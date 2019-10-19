<?php $this->start('meta'); ?>
	<title>Snookview - Add Round</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-12">
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
		<legend><?php echo __('Add Round'); ?></legend>
	<?php
		echo $this->Form->input('round_name', array(
			'label' => 'Name',
			'placeholder' => 'Name',
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
	<?php echo $this->Form->end(array('label' => __('Add', true), 'class' => 'btn btn-default btn-success btn-lg')); ?>
	</div>
</div>
<script>
$('#RoundRoundName').bind('keypress blur', function() {
	$('#RoundRoundSlug').val(
		$('#RoundTournamentId option:selected').text().toLowerCase().replace(
			/[\s]/g, '-') + '/' +
		$('#RoundRoundName').val().toLowerCase().replace(
			/['"’\s]/g, '-')
		);
});

$('#RoundRoundSlug').bind('keypress blur', function() {
	$('#RoundRoundRoute').val('Router::connect("/rounds/' + $('#RoundRoundSlug').val() + '", array("controller" => "rounds", "action" => "view", ' + "<?php echo $lastRoundID['Round']['round_id']+1; ?>" +'));');
});
</script>
