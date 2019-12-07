<?php $this->start('meta'); ?>

	<title>Snookview - Admin Edit Timeline</title>

<?php $this->end(); ?>

<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<?= 
					$this->Form->postLink(
					    'Delete',[
					    	'action' 	=> 'delete', $timeline->timeline_id
					    ],
					    [
					    	'confirm' 	=> 'Are you sure?'
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
			echo $this->Form->create($timeline->timeline_id, 
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
			<legend><?php echo __('Admin Edit Timeline'); ?></legend>
			<?php
				echo $this->Form->control('timeline_title', 
					[
						'label' 		=> 'Title',
						'class' 		=> 'form-control',
						'value' 		=> $timeline->timeline_title
					]
				);

				echo $this->Form->control('timeline_description', 
					[
						'label' 		=> 'Description',
						'class' 		=> 'form-control',
						'value' 		=> $timeline->timeline_description
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