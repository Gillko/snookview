<?php $this->start('meta'); ?>

	<title>Snookview - Admin Add Season</title>

<?php $this->end(); ?>

<div class="row">
	<div class="col-md-12">
		<?php 
			echo $this->Form->create('Seasons', 
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
			<legend><?php echo __('Admin Add Season'); ?></legend>
			<?php
				echo $this->Form->control('season_beginYear', 
					[
						'type' 			=> 'year',
						'minYear'	 	=> date('Y')-100, 
						'maxYear' 		=> date('Y')-0+1, 
						'label' 		=> 'Begin Year',
						'empty' 		=> '- select -',
						'name' 			=> 'season_beginYear',
						'class'		 	=> 'form-control'
					]
				);

				echo $this->Form->control('season_endYear', 
					[
						'type' 			=> 'year',
						'minYear' 		=> date('Y')-100, 
						'maxYear' 		=> date('Y')-0+1, 
						'label' 		=> 'End Year',
						'empty' 		=> '- select -',
						'name' 			=> 'season_endYear',
						'class'			=> 'form-control'
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
	document.getElementById('season-endyear').setAttribute("name", "season_endYear");
	document.getElementById('season-beginyear').setAttribute("name", "season_beginYear");
</script>