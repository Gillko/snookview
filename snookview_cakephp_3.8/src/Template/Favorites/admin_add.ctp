<?php $this->start('meta'); ?>

	<title>Snookview - Admin Add Favorite</title>

<?php $this->end(); ?>

<div class="row">
	<div class="col-md-12">
		<?php 
			echo $this->Form->create('Favorites', 
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
			<legend><?php echo __('Admin Add Favorite'); ?></legend>
			<?php
				echo $this->Form->input('user_id', 
					[
						'class' 		=> 'form-control'
					]
				);
	
				echo $this->Form->input('video_id', 
					[
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