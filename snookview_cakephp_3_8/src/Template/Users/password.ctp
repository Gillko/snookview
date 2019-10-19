<?php $this->start('meta'); ?>
	<title>Snookview - Password</title>
<?php $this->end(); ?>
<div class="row padding-top">
	<div class="col-md-1">
	</div>
	<div class="col-md-10">
		<h3 class="left"><?php echo __('Forgot Password?'); ?></h3>
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
			<p>Did you forget your're password? Please fill in your're email address.<p>
			<p>You will receive an email from snookview where you can create a new password.</p>
			<?php
				echo $this->Form->input('email', array(
					'label' => 'Email',
					'placeholder' => 'Email',
				));
			?>
		</fieldset>
		<?php echo $this->Html->div('unforseen-container'); ?>
			<?php echo $this->Form->end(array('label' => __('Send', true), 'class' => 'btn btn-default btn-success btn-lg btn-send')); ?>
			<?php echo $this->Html->div('unforseen'); ?>
				<?php echo $this->Html->link(__('Back to login', true), array('controller' => 'users', 'action' => 'login'), array('class' => 'forgot-password')); ?>
			<?php echo '</div>'; ?>
		<?php echo '</div>'; ?>	
	</div>
	<div class="col-md-1">
	</div>
</div>