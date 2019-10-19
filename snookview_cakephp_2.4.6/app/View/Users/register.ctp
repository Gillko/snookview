<?php $this->start('meta'); ?>
	<title>Snookview - Register</title>
<?php $this->end(); ?>
<div class="row padding-top">
	<div class="col-md-1">
	</div>
	<div class="col-md-10">
		<h3><?php echo __('Join Us!'); ?></h3>
		<?php echo $this->Form->create('User', array(
			'inputDefaults' => array(
			'div' => 'form-group',
			'wrapInput' => false,
			'class' => 'form-control borderLeft'
		),
			'class' => 'well noBackground noPadding',
			'type' => 'file',
		)); ?>
		<fieldset>
		<?php
			echo $this->Html->div('row');
				echo $this->Html->div('col-md-6 noPadding');
					echo $this->Form->input('user_firstname', array(
						'label' => 'Firstname',
						'placeholder' => 'Firstname',
						'class' => 'form-control borderLeft width95 width100'
					));
				echo '</div>';
				echo $this->Html->div('col-md-6 noPadding');
					echo $this->Form->input('user_surname', array(
						'label' => 'Surname',
						'placeholder' => 'Surname',
					));
				echo '</div>';
			echo '</div>';
			echo $this->Html->div('row');
				echo $this->Html->div('col-md-6 noPadding');
					echo $this->Form->input('email', array(
						'label' => 'Email',
						'placeholder' => 'Email',
						'type' => 'email',
						'class' => 'form-control borderLeft width95 width100'
					));
				echo '</div>';
				echo $this->Html->div('col-md-6 noPadding');
					echo $this->Form->input('user_country', array(
						'label' => 'Country',
						'placeholder' => 'Country',
					));
				echo '</div>';
			echo '</div>';
			echo $this->Form->input('user_username', array(
				'label' => 'Username',
				'placeholder' => 'Username'
			));
			echo $this->Form->input('password_confirmation', array(
				'label' => 'Password',
				'placeholder' => 'Password',
				'type' => 'password'
			));
			echo $this->Form->input('user_password', array(
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
					'class' => 'input-upload form-control',
					'id' => 'upload'
				));
			echo '</div>';
			echo $this->Form->label('Captcha');
			echo $this->Captcha->render(array(
				'type' => 'image'
			));
			echo $this->Form->input('user_created', array(
				'type' => 'hidden',
				'class' => 'form-control date'
			));
		?>
		</fieldset>
		<?php echo $this->Form->end(array('label' => __('Join', true), 'class' => 'btn btn-default btn-success btn-lg')); ?>
	</div>
	<div class="col-md-1">
	</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
	jQuery('.unforseen').on('click', function() {
	    var mySrc = $(this).prev().attr('src');
	    var glue = '?';
	    if(mySrc.indexOf('?')!=-1)  {
	        glue = '&';
	    }
	    $(this).prev().attr('src', mySrc + glue + new Date().getTime());
	    return false;
	});
</script>
<script>
	$("img.profileImage").hover(
	   function() {
	      $('.changeProfileImage').show()
	   },
	   function() {
	      $('.changeProfileImage').hide()
	   }
	);

	$('.remove').click(function(){
		$('.upload').slideToggle(0);
		$('.box').show();
		if($('.input-upload').attr('disabled'))
			$('.input-upload').removeAttr('disabled');
	    else
	    	$('.input-upload').attr('disabled', 'disabled');
	})
</script>