<?php $this->start('meta'); ?>

	<title>Snookview - Admin Edit User</title>

<?php $this->end(); ?>

<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<?= 
					$this->Form->postLink(
						'Delete',[
							'action' 		=> 'delete', $user->user_id
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
			echo $this->Form->create($user->user_id, 
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
			<legend><?php echo __('Admin Edit User'); ?></legend>
			<?php
				echo $this->Form->control($user->user_firstname, 
					[
						'label' 			=> 'Firstname',
						'class' 			=> 'form-control',
						'value' 			=> $user->user_firstname,
						'name' 				=> 'user_firstname'
					]
				);
			
				echo $this->Form->control($user->user_lastname, 
					[
						'label' 			=> 'Lastname',
						'class' 			=> 'form-control',
						'value' 			=> $user->user_lastname,
						'name' 				=> 'user_lastname'
					]
				);
		
				echo $this->Form->control($user->user_country, 
					[
						'label' 			=> 'Country',
						'class' 			=> 'form-control',
						'value' 			=> $user->user_country,
						'name' 				=> 'user_country'
					]
				);
		
				echo $this->Form->control($user->user_username, 
					[
						'label' 			=> 'Username',
						'class' 			=> 'form-control',
						'value' 			=> $user->user_username,
						'name' 				=> 'user_username'
					]
				);
		
				echo $this->Form->control($user->email, 
					[
						'label' 			=> 'Email',
						'class' 			=> 'form-control',
						'value' 			=> $user->email,
						'name' 				=> 'email'
					]
				);
			?>

			<?php
				if(!empty($user->user_image)): 
			?>

				<div class="input">
					<label>Current Image (change by clicking image):</label>
					<?php echo $this->Html->image('/img/users/' . $user->user_image, ['class' => 'profileImage', 'width' => 100]); ?>
				</div>

			<?php
				else: 
			?>

				<div class="input">
					<label>Current Image (change by clicking image):</label>
					<?php echo $this->Html->image('users/profile.jpg', ['class' => 'profileImage', 'width' => 100]); ?>
				</div>

			<?php endif;
				echo $this->Html->div('upload');
					echo $this->Form->control($user->user_image, 
						[
							'label' 		=> 'Image',
							'type' 			=> 'file',
							'required' 		=> true,
							'disabled' 		=> true,
							'class' 		=> 'input-upload form-control',
							'value' 		=> $user->user_image,
							'name' 			=> 'user_image'
						]
					);
				echo '</div>';

				echo $this->Form->control($user->user_role, 
					[
						'options' 			=> $roles,
						'label' 			=> 'Role',
						'class' 			=> 'form-control',
						'value' 			=> $user->user_role,
						'name' 				=> 'user_role'
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
	$('.upload').hide();
	$('.profileImage').click(function(){
		$('.upload').slideToggle(200);
		if($('.input-upload').attr('disabled'))
			$('.input-upload').removeAttr('disabled');
		else
			$('.input-upload').attr('disabled', 'disabled');
	})
</script>