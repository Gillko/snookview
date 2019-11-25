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
					    	'action' => 'delete', $user->user_id
					    ],
					    [
					    	'confirm' => 'Are you sure?'
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
		<?php echo $this->Form->create($user->user_id, [
			'inputDefaults' => [
				'div' => 'form-group',
				'wrapInput' => false,
				'class' => 'form-control'
			],
			'class' => 'well',
			'type' => 'file'
		]); ?>
		<fieldset>
			<legend><?php echo __('Admin Edit User'); ?></legend>
			<div class="form-group">
				<?php
					echo $this->Form->control($user->user_firstname, array(
						'label' => 'Firstname',
						'placeholder' => 'Firstname',
						'class' => 'form-control',
						'value' => $user->user_firstname,
						'name' => 'user_firstname'
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control($user->user_lastname, array(
						'label' => 'Lastname',
						'placeholder' => 'Lastname',
						'class' => 'form-control',
						'value' => $user->user_lastname,
						'name' => 'user_lastname'
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control($user->user_country, array(
						'label' => 'Country',
						'placeholder' => 'Country',
						'class' => 'form-control',
						'value' => $user->user_country,
						'name' => 'user_country'
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control($user->user_username, array(
						'label' => 'Username',
						'placeholder' => 'Username',
						'class' => 'form-control',
						'value' => $user->user_username,
						'name' => 'user_username'
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control($user->email, array(
						'label' => 'Email',
						'placeholder' => 'Email',
						'class' => 'form-control',
						'value' => $user->email,
						'name' => 'email'
					));
				?>
			</div>
			<div class="form-group">
				<?php
					if(!empty($user->user_image)): 
				?>
					<div class="input">
						<label>Current Image (change by clicking image):</label>
						<?php echo $this->Html->image('/img/users/' . $user->user_image, array('class' => 'profileImage', 'width' => 100)); ?>
					</div>
				<?php
					else: 
				?>
					<div class="input">
						<label>Current Image (change by clicking image):</label>
						<?php echo $this->Html->image('users/profile.jpg', array('class' => 'profileImage', 'width' => 100)); ?>
					</div>
				<?php endif;
					echo $this->Html->div('upload');
						echo $this->Form->control($user->user_image, array(
							'label' => 'Image',
							'placeholder' => 'Image',
							'type' => 'file',
							'required' => true,
							'disabled' => true,
							'class' => 'input-upload form-control',
							'value' => $user->user_image,
							'name' => 'user_image'
						));
					echo '</div>';
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control($user->user_role, array(
						'options' => $roles,
						'label' => 'Role',
						'placeholder' => 'Role',
						'class' => 'form-control',
						'value' => $user->user_role,
						'name' => 'user_role'
					));
				?>
			</div>
			<div class="submit">
				<?php
					echo $this->Form->button(__('Edit'), ['class'=> 'btn btn-default btn-success btn-lg']);
				?>
			</div>
			<?php
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
/*$('img').click(function(){
   var src = $(this).attr('src');
   $('#playerFlag').val(src);
   //$('img#').attr('id').css('width', '60px');
 
});
$('img').click(function(){
	var id = this.id;
	var image = 'img#' . id;
	$('img#' + id).css({'width': '100px', 'height': '100px'});
	$('img').css({'width': '50px', 'height': '50px'});
	$('img#' + id).css({'width': '100px', 'height': '100px'});
});*/
</script>