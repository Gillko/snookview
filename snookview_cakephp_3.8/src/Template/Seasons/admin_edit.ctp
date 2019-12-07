<?php $this->start('meta'); ?>

	<title>Snookview - Admin Edit Season</title>

<?php $this->end(); ?>

<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<?= 
					$this->Form->postLink(
					    'Delete',[
					    	'action' 		=> 'delete', $season->season_id
					    ],
					    [
					    	'confirm' 		=> 'Are you sure?'
					    ]
					)
				?>
				<?php
					echo $this->Form->end();
				?>
			</li>
		</ul>
	</div>
	<div class="col-md-9">
		<?php 
			echo $this->Form->create($season->season_id, 
				[
					'inputDefaults' => 
					[
						'div' 				=> 'form-group',
						'wrapInput' 		=> false,
						'class' 			=> 'form-control'
					],
					'class' 				=> 'well'
				]
			);
		?>
		<fieldset>
			<legend><?php echo __('Admin Edit Season'); ?></legend>
			<?php
				echo $this->Form->control($season->season_beginYear, 
					[
						'type' 				=> 'year',
						'minYear' 			=> date('Y')-100, 
						'maxYear' 			=> date('Y')-0+1, 
						'label' 			=> 'Begin Year',
						'empty' 			=> '- select -',
						'name' 				=> 'season_beginYear',
						'class' 			=> 'form-control',
						'id' 				=> 'season-beginyear',
						'value' 			=> $season->season_beginYear
					]
				);

				echo $this->Form->control($season->season_endYear, 
					[
						'type' 				=> 'year',
				    	'minYear' 			=> date('Y')-100, 
				    	'maxYear' 			=> date('Y')-0+1, 
				    	'label' 			=> 'End Year',
				    	'empty' 			=> '- select -',
						'class' 			=> 'form-control',
						'name' 				=> 'season_endYear',
						'id' 				=> 'season-endyear',
						'value' 			=> $season->season_endYear
					]
				);

				echo $this->Html->div(
					'submit'
				);

				echo $this->Form->button(
					__('Edit'), 
						[
							'class'			=> 'btn btn-default btn-success btn-lg'
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