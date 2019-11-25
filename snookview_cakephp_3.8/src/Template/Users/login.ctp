<?php $this->start('meta'); ?>
	<title>Snookview - Login</title>
<?php $this->end(); ?>
<div class="row padding-top">
	<div class="col-md-1">
	</div>
	<div class="col-md-10">
		<h3 class="left"><?php echo __('Login'); ?></h3>
		<?php echo $this->Flash->render() ?>
		<?php echo $this->Form->create(); ?>
		<fieldset>
			<div class="form-group">
				<?php
					echo $this->Form->control('email', array(
						'label' => 'Email',
						'placeholder' => 'Email',
						'class' => 'form-control'
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control('password', array(
						'label' => 'Password',
						'placeholder' => 'Password',
						'type' => 'password',
						'class' => 'form-control'
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control('user_lastlogin', array(
						'type' => 'hidden',
						'class' => 'form-control date'
					));
				?>
			</div>
			<div class="submit">
				<?php
					echo $this->Form->button(__('Login'), ['class'=> 'btn btn-default btn-success btn-lg']);
				?>
			</div>
			<?php
				echo $this->Form->end();
			?>
		</fieldset>
		
	</div>
	<div class="col-md-1">
	</div>
</div>