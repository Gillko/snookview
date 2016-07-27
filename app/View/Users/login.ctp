<?php $this->start('meta'); ?>
	<title>Snookview - Login</title>
<?php $this->end(); ?>
<div class="row padding-top">
	<div class="col-md-1">
	</div>
	<div class="col-md-10">
		<h3 class="left"><?php echo __('Login'); ?></h3>
		<?php echo $this->Form->create('User', array(
			'inputDefaults' => array(
			'div' => 'form-group',
			'wrapInput' => false,
			'class' => 'form-control'
		),
			'class' => 'well noBackground noPadding',
			'type' => 'file',
		)); ?>
		<fieldset>
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
				echo $this->Form->input('user_lastlogin', array(
					'type' => 'hidden',
					'class' => 'form-control date'
				));
			?>
		</fieldset>
		<?php echo $this->Html->div('unforseen-container'); ?>
			<?php echo $this->Html->div('unforseen'); ?>
				<?php echo $this->Html->link(__('Not a member? Register here!'), array('controller' => 'users', 'action' => 'register'), array('class' => 'not-member-yet')); ?>
			<?php echo '</div>'; ?>
			<?php echo $this->Form->end(array('label' => __('Login', true), 'class' => 'btn btn-default btn-success btn-lg btn-login')); ?>
			<?php echo $this->Html->div('unforseen'); ?>
			<?php echo $this->Html->link(__('Forgot Password?', true), array('controller' => 'users', 'action' => 'password'), array('class' => 'forgot-password')); ?>
			<?php echo '</div>'; ?>
		<?php echo '</div>'; ?>
	</div>
	<div class="col-md-1">
	</div>
</div>