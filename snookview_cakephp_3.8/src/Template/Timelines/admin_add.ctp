<?php $this->start('meta'); ?>

	<title>Snookview - Admin Add Timeline</title>

<?php $this->end(); ?>

<div class="row">
	<div class="col-md-12">
		<?php 
			echo $this->Form->create('Timelines', 
				[
					'inputDefaults' => 
					[
						'div' 			=> 'form-group',
						'wrapInput' 	=> false,
						'class' 		=> 'form-control'
					],
					'class' => 'well'
				]
			); 
		?>
		<fieldset>
			<legend><?php echo __('Admin Add Timeline'); ?></legend>
			<?php
				echo $this->Form->input('timeline_title', 
					[
						'label' 		=> 'Title',
						'placeholder' 	=> 'Title',
						'class' 		=> 'form-control'
					]
				);
				
				echo $this->Form->input('timeline_description', 
					[
						'label' 		=> 'Description',
						'placeholder' 	=> 'Description',
						'class' 		=> 'form-control'
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