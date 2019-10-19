<?php $this->start('meta'); ?>
	<title>Snookview - Add User</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-12">
		<?php echo $this->Form->create('User', array(
			'inputDefaults' => array(
			'div' => 'form-group',
			'wrapInput' => false,
			'class' => 'form-control'
		),
			'class' => 'well',
			'type' => 'file',
		)); ?>
		<fieldset>
			<legend><?php echo __('Add User'); ?></legend>
		<?php
			echo $this->Form->input('user_firstname', array(
				'label' => 'Firstname',
				'placeholder' => 'Firstname',
			));
			echo $this->Form->input('user_surname', array(
				'label' => 'Surname',
				'placeholder' => 'Surname',
			));
			echo $this->Form->input('user_country', array(
				'label' => 'Country',
				'placeholder' => 'Country',
			));
			echo $this->Form->input('user_username', array(
				'label' => 'Username',
				'placeholder' => 'Username',
			));
			echo $this->Form->input('email', array(
				'label' => 'Email',
				'placeholder' => 'Email',
				'type' => 'Email'
			));
			echo $this->Form->input('user_password', array(
				'label' => 'Password',
				'placeholder' => 'Password',
				'type' => 'password'
			));
			echo $this->Form->input('password_confirmation', array(
				'label' => 'Repeat Password',
				'placeholder' => 'Repeat Password',
				'type' => 'password',
			));
			echo $this->Html->div('upload');
				echo $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove remove'));
				echo $this->Form->input('user_image', array(
					'label' => 'Image',
					'placeholder' => 'Image',
					'type' => 'file',
					'class' => 'input-upload form-control'
				));
			echo '</div>';
			/*echo $this->Form->input('created', array(
				'type' => 'hidden',
				'class' => 'form-control date'
			));*/
		/*	echo $this->Form->input('user_lastlogin');
			echo $this->Form->input('user_locked');
			echo $this->Form->input('user_confirmed');*/
			echo $this->Form->label('Captcha');
			echo $this->Captcha->render(array(
				'type' => 'image'
			));
			echo $this->Form->input('user_role', array(
				'label' => 'Role',
				'placeholder' => 'Role',
				'options' => $roles,
			));
		?>
		</fieldset>
		<?php echo $this->Form->end(array('label' => __('Add', true), 'class' => 'btn btn-default btn-success btn-lg')); ?>
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