<?php $this->start('meta'); ?>

	<title>Snookview - Admin Edit Ranking</title>

<?php $this->end(); ?>

<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<?= 
				$this->Form->postLink(
				    'Delete',[
				    	'action' 		=> 'delete', $ranking->ranking_id
				    ],[
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
			echo $this->Form->create($ranking->ranking_id, 
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
			<legend><?php echo __('Admin Edit Ranking'); ?></legend>
			<?php
				echo $this->Form->control('ranking_rank', 
					[
						'label' 		=> 'Rank',
						'class' 		=> 'form-control',
						'value' 		=> $ranking->ranking_rank
					]
				);
		
				echo $this->Form->control('ranking_points',
					[
						'label' 		=> 'Points',
						'class' 		=> 'form-control',
						'value' 		=> $ranking->ranking_points
					]
				);
		
				echo $this->Form->control('player_id', 
					[
						'class' 		=> 'form-control',
						'value' 		=> $ranking->player_id
					]
				);
		
				echo $this->Form->control('season_id', 
					[
						'class' 		=> 'form-control',
						'value' 		=> $ranking->season_id
					]
				);

				echo $this->Html->div(
					'submit'
				);

				echo $this->Form->button(
					__('Edit'), 
						[
							'class'		=> 'btn btn-default btn-success btn-lg'
						]
					)
				;

				echo $this->Form->end();
			?>
		</fieldset>
	</div>
</div>