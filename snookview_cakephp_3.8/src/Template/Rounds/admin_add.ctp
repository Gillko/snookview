<?php $this->start('meta'); ?>

	<title>Snookview - Admin Add Round</title>

<?php $this->end(); ?>

<div class="row">
	<div class="col-md-12">
		<?php 
			echo $this->Form->create('Rounds', 
				[
					'inputDefaults' => 
					[
						'div' 			=> 'form-group',
						'wrapInput' 	=> false,
						'class' 		=> 'form-control'
					],
					'class' 			=> 'well'
				]
			); 
		?>
		<fieldset>
			<legend><?php echo __('Admin Add Round'); ?></legend>
			<?php
				echo $this->Form->input('round_name', 
					[
						'label' 		=> 'Name',
						'placeholder' 	=> 'Name',
						'class' 		=> 'form-control',
						'id' 			=> 'RoundRoundName'
					]
				);

				echo $this->Form->input('round_slug', 
					[
						'label' 		=> 'Slug',
						'placeholder' 	=> 'Slug',
						'class' 		=> 'form-control',
						'id' 			=> 'RoundRoundSlug'
					]
				);

				echo $this->Form->input('tournament_id', 
					[
						'class' 		=> 'form-control',
						'options' 		=> $tournaments,
						'id' 			=> 'RoundTournamentId'
					]
				);
				
				echo $this->Html->div(
					'submit'
				);
		
				echo $this->Form->button(
					__('Add'),
						[
							'class'		=> 'btn btn-default btn-success btn-lg submit'
						]
					)
				;

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
		}
	);
</script>
