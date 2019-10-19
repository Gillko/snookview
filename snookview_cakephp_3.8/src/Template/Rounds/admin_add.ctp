<?php $this->start('meta'); ?>
	<title>Snookview - Add Round</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-12">
		<?php echo $this->Form->create('Rounds', [
			'inputDefaults' => [
				'div' => 'form-group',
				'wrapInput' => false,
				'class' => 'form-control'
			],
			'class' => 'well'
		]); ?>
		<fieldset>
			<legend><?php echo __('Add Round'); ?></legend>
			<div class="form-group">
				<?php
					echo $this->Form->input('round_name', [
						'label' => 'Name',
						'placeholder' => 'Name',
						'class' => 'form-control',
						'id' => 'RoundRoundName'
					]);
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->input('round_slug', [
						'label' => 'Slug',
						'placeholder' => 'Slug',
						'class' => 'form-control',
						'id' => 'RoundRoundSlug'
					]);
				?>
			</div>
			<!-- <div class="form-group">
				<?php
					/*echo $this->Form->input('round_route', [
						'label' => 'URL route',
						'placeholder' => 'URL route',
						'class' => 'form-control',
						'id' => 'RoundRoundRoute'
					]); */
				?>
			</div> -->
			<div class="form-group">
				<?php
					echo $this->Form->input('tournament_id', [
						'class' => 'form-control',
						'options' => $tournaments,
						'id' => 'RoundTournamentId'
					]);
				?>
			</div>
			<div class="submit">
				<?php
					echo $this->Form->button(__('Add'),['class'=> 'btn btn-default btn-success btn-lg']);
				?>
			</div>

			<?php
				echo $this->Form->end();
			?>
		</fieldset>
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

/*$('#RoundRoundSlug').bind('keypress blur', function() {
	$('#RoundRoundRoute').val('Router::connect("/rounds/' + $('#RoundRoundSlug').val() + '", array("controller" => "rounds", "action" => "view", ' + "<?php //echo $lastRoundID['Round']['round_id']+1; ?>" +'));');
});*/
</script>
