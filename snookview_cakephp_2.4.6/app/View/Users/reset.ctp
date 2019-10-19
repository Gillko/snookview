<?php $this->start('meta'); ?>
	<title>Snookview - Password</title>
<?php $this->end(); ?>
<div class="row padding-top">
	<div class="col-md-2">
	</div>
	<div class="col-md-8">
		<h3 class="left"><?php echo __('Reset Password'); ?></h3>
		<?php echo $this->Form->create('User', array(
			'inputDefaults' => array(
			'div' => 'form-group',
			'wrapInput' => false,
			'class' => 'form-control'
		)
		)); ?>
		<fieldset>
			<?php
				echo $this->Form->input('password_confirmation', array(
					'label' => 'Password',
					'placeholder' => 'Password',
					'type' => 'password',
				));
				echo $this->Form->input('user_password', array(
					'label' => 'Repeat Password',
					'placeholder' => 'Repeat Password',
					'type' => 'password',
				));
			?>
		</fieldset>
		<?php echo $this->Form->end(array('label' => __('Reset', true), 'class' => 'btn btn-default btn-success btn-lg')); ?>	
	</div>
	<div class="col-md-2">
	</div>
</div>