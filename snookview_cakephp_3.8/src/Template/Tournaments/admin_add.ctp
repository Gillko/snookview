<?php $this->start('meta'); ?>

	<title>Snookview - Admin Add Tournament</title>

<?php $this->end(); ?>
<div class="row">
	<div class="col-md-12">
		<?php 
			echo $this->Form->create('Tournaments', 
				[
					'inputDefaults' => 
					[
						'div' 					=> 'form-group',
						'wrapInput' 			=> false,
						'class' 				=> 'form-control'
					],
					'class' 					=> 'well',
					'type' 						=> 'file'
				]
			); 
		?>
		<fieldset>
			<legend><?php echo __('Admin Add Tournament'); ?></legend>
			<?php
				echo $this->Form->control('tournament_name', 
					[
						'label' 			=> 'Name',
						'placeholder' 		=> 'Name',
						'class' 			=> 'form-control',
						'id' 				=> 'TournamentTournamentName'
					]
				);
	
				echo $this->Form->control('tournament_year', 
					[
						'type' 				=> 'year',
				    	'dateFormat' 		=> 'Y',
				    	'minYear' 			=> date('Y')-100, 
				    	'maxYear' 			=> date('Y')-0+1, 
				    	'label' 			=> 'Year',
				    	'empty' 			=> '- select -',
				    	'default' 			=> date('Y'),
				    	'class' 			=> 'form-control',
				    	'id' 				=> 'tournament_year'
					]
				);
	
				echo $this->Form->control('tournament_slug', 
					[
						'label' 			=> 'Slug',
						'placeholder' 		=> 'Slug',
						'class' 			=> 'form-control',
						'id' 				=> 'TournamentTournamentSlug'
					]
				);
	
				echo $this->Form->control('tournament_vennue', 
					[
						'label' 			=> 'Vennue',
						'placeholder' 		=> 'Vennue',
						'class' 			=> 'form-control'
					]
				);
	
				echo $this->Form->control('tournament_beginDate', 
					[
						'type' 				=> 'date',
						'label' 			=> 'Begin Date',
						'class' 			=> 'form-control date'
					]
				);
		
				echo $this->Form->control('tournament_endDate', 
					[
						'type' 				=> 'date',
						'label'				=> 'End Date',
						'class' 			=> 'form-control date'
					]
				);
		
				echo $this->Html->div('upload');
					echo $this->Html->tag('i', '', 
						[
							'class' 		=> 'glyphicon glyphicon-remove remove'
						]
					);
					echo $this->Form->file('tournament_winner', 
						[
							'label' 		=> 'Tournament Winner Image',
						'placeholder' 		=> 'Tournament Winner Image',
						'class' 			=> 'input-upload form-control'
					]);
				echo '</div>';
	
				echo $this->Form->control('tournament_winnerSrc', 
					[
						'label' 			=> 'Source of image',
						'placeholder'	 	=> 'Source of image',
						'class' 			=> 'form-control'
					]
				);
		
				echo $this->Html->div(
					'submit'
				);
			
				echo $this->Form->button(
					__('Add'),
						[
							'class'			=> 'btn btn-default btn-success btn-lg submit'
						]
					)
				;

				echo $this->Form->end();
			?>
		</fieldset>
	</div>
</div>
<script>
	$('.remove').click(function(){
		$('.upload').slideToggle(0);
		$('.box').show();
		if($('.input-upload').attr('disabled'))
			$('.input-upload').removeAttr('disabled');
	    else
	    	$('.input-upload').attr('disabled', 'disabled');
	})
	$('#TournamentTournamentName').bind('keypress blur', function() {
		$('#TournamentTournamentSlug').val(
			$('#TournamentTournamentName').val().toLowerCase().replace(
				/[\s]/g, '-')
			+ '-'
			+ $('#tournament_year option:selected').text()
			);
	});

	document.getElementById('tournament_year').setAttribute("name", "tournament_year");
</script>