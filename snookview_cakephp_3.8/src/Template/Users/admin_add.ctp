<?php $this->start('meta'); ?>

	<title>Snookview - Admin Add User</title>

<?php $this->end(); ?>
<div class="row">
	<div class="col-md-12">
		<?php 
			echo $this->Form->create('Users', 
				[
					'inputDefaults' => 
					[
						'div' 				=> 'form-group',
						'wrapInput' 		=> false,
						'class' 			=> 'form-control'
					],
					'class' 				=> 'well',
					'type' 					=> 'file'
				]
			); 
		?>
		<fieldset>
			<legend><?php echo __('Admin Add User'); ?></legend>
			<?php
				echo $this->Form->control('user_firstname', 
					[
						'label' 			=> 'Firstname',
						'placeholder' 		=> 'Firstname',
						'class' 			=> 'form-control'
					]
				);
				
				echo $this->Form->control('user_lastname', 
					[
						'label' 			=> 'Lastname',
						'placeholder' 		=> 'Lastname',
						'class' 			=> 'form-control'
					]
				);
			
				echo $this->Form->control('user_country', 
					[
						'label' 			=> 'Country',
						'placeholder' 		=> 'Country',
						'class' 			=> 'form-control'
					]
				);
		
				echo $this->Form->control('user_username', 
					[
						'label' 			=> 'Username',
						'placeholder' 		=> 'Username',
						'class' 			=> 'form-control'
					]
				);

				echo $this->Form->control('email', 
					[
						'label' 			=> 'Email',
						'placeholder' 		=> 'Email',
						'type' 				=> 'Email',
						'class' 			=> 'form-control'
					]
				);
		
				echo $this->Form->control('password', 
					[
						'label' 			=> 'Password',
						'placeholder' 		=> 'Password',
						'type' 				=> 'password',
						'class' 			=> 'form-control'
					]
				);
	
				echo $this->Form->control('password_confirmation', 
					[
						'label' 			=> 'Repeat Password',
						'placeholder' 		=> 'Repeat Password',
						'type' 				=> 'password',
						'class' 			=> 'form-control'
					]
				);
	
				echo $this->Html->div('upload');
					echo $this->Html->tag('i', '', 
						[
							'class' => 'glyphicon glyphicon-remove remove'
						]
					);
					echo $this->Form->control('user_image', 
						[
							'label' 		=> 'Image',
							'placeholder' 	=> 'Image',
							'type' 			=> 'file',
							'class' 		=> 'input-upload form-control'
						]
					);
				echo '</div>';
	
				echo $this->Form->control('user_role', 
					[
						'label' 			=> 'Role',
						'placeholder' 		=> 'Role',
						'options' 			=> $roles,
						'class'			 	=> 'form-control'
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
</script>