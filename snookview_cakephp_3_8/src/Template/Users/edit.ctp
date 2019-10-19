<?php $this->start('meta'); ?>
	<title>Snookview - Account</title>
<?php $this->end(); ?>
<div class="row padding-top">
	<div class="col-md-2">
	</div>
	<div class="col-md-2 noPaddingTablet noPaddingMobile">
		<div class="contact-image">
			<?php if(!empty($this->data['User']['user_image'])):{

				echo $this->Html->image($this->data['User']['user_image'], array('class' => 'img-responsive profileImage imgHalf'));
			}
			else:{
				echo $this->Html->image('/img/users/profile.jpg', array('class' => 'img-responsive profileImage imgHalf'));
			 }
			endif; ?>
		</div>
		<div class="contact-social">
			<p class="text-center"><?php echo $this->data['User']['user_firstname'] . ' ' . $this->data['User']['user_surname'];?></p>
			<span>&nbsp;&nbsp;</span>
			<ul class="text-center">
				<li><a href="/contact">Contact</a></li>
			</ul>
		</div>
	</div>
	<div class="col-md-6">
		<h3 class="left"><?php echo __('Edit Account'); ?></h3>
		<?php echo $this->Form->create('User', array(
			'inputDefaults' => array(
			'div' => 'form-group',
			'wrapInput' => false,
			'class' => 'form-control'
		),
			'type' => 'file',
		)); ?>
		<fieldset>
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
			));
			/*echo $this->Form->input('user_password', array(
				'label' => 'Password',
				'type' => 'password',
				'value' => false
			));
			echo $this->Form->input('password_confirmation', array(
				'label' => 'Repeat Password',
				'type' => 'password',
			));*/
			echo $this->Form->input('user_id');
			echo $this->Html->div('upload');
				echo $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove remove'));
				echo $this->Form->input('user_image', array(
					'label' => 'Image',
					'placeholder' => 'Image',
					'type' => 'file',
					'required' => true,
					'class' => 'input-upload form-control'
				));
			echo '</div>';
			echo $this->Form->input('user_modified', array(
				'label' => 'Modified',
				'type' => 'hidden'
			));
			/*$roles = array('User' => 'User', 'Admin' => 'Admin');
			echo $this->Form->input('user_role', array(
				'label' => 'Role',
				'placeholder' => 'Role',
				'options' => $roles,
			));*/
		?>
		</fieldset>
		<?php echo $this->Form->end(array('label' => __('Edit Account', true), 'class' => 'btn btn-default btn-success btn-lg')); ?>
	</div>
	<div class="col-md-2">
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