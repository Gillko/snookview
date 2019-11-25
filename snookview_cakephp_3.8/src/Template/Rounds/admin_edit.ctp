<?php $this->start('meta'); ?>
	<title>Snookview - Edit Round</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<?= 
					$this->Form->postLink(
					    'Delete',[
					    	'action' => 'delete', $round->round_id
					    ],
					    [
					    	'confirm' => 'Are you sure?'
					    ]
					)
				?>
				<?php
					echo $this->Form->end();
				?>
				<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Round.round_id')), null, __('Are you sure you want to delete %s?', $this->Form->value('Round.round_name'))); ?>
			</li>
		</ul>
	</div>

	<div class="col-md-9">
		<?php echo $this->Form->create($round->round_id, [
			'inputDefaults' => [
				'div' => 'form-group',
				'wrapInput' => false,
				'class' => 'form-control'
			],
			'class' => 'well'
		]); ?>
		<fieldset>
			<legend><?php echo __('Edit Round'); ?></legend>
			<div class="form-group">
				<?php
					echo $this->Form->control('round_name', [
						'label' => 'Name',
						'class' => 'form-control',
						'value' => $round->round_name,
						'id' => 'RoundRoundName'
					]);
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control('round_slug', [
						'label' => 'Slug',
						'placeholder' => 'Slug',
						'class' => 'form-control',
						'value' => $round->round_slug,
						'id' => 'RoundRoundSlug'
					]);
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->input('tournament_id', [
						'class' => 'form-control',
						'value' => $round->tournament_id,
						'id' => 'RoundTournamentId'
					]);
				?>
			</div>
			<div class="submit">
				<?php
					echo $this->Form->button(__('Edit'), ['class'=> 'btn btn-default btn-success btn-lg']);
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
			/['"’\s]/g, '-') + '/' +
		$('#RoundRoundName').val().toLowerCase().replace(
			/['"’\s]/g, '-')
		);
});

$('#RoundTournamentId').click(function() {
	$('#RoundRoundSlug').val(
		$('#RoundTournamentId option:selected').text().toLowerCase().replace(
			/['"’\s]/g, '-') + '/' +
		$('#RoundRoundName').val().toLowerCase().replace(
			/['"’\s]/g, '-')
		);
});

/*$('#RoundRoundSlug').bind('keypress blur', function() {
	$('#RoundRoundRoute').val('Router::connect("/rounds/' + $('#RoundRoundSlug').val() + '", array("controller" => "rounds", "action" => "view", ' + $('#RoundRoundId').val() +'));');
});*/
</script>