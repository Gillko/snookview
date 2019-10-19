<?php $this->start('meta'); ?>
	<title>Snookview - Login</title>
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
			<legend><?php echo __('Login'); ?></legend>
			<?php
				echo $this->Form->input('email', array(
					'label' => 'Email',
					'placeholder' => 'Email',
				));
				echo $this->Form->input('user_password', array(
					'label' => 'Password',
					'placeholder' => 'Password',
					'type' => 'password',
				));
			?>
		</fieldset>
		<?php echo $this->Form->end(array('label' => __('Login', true), 'class' => 'btn btn-default btn-success btn-lg')); ?>
	</div>
</div>