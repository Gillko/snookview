<?php $this->start('meta'); ?>
	<title>Snookview - Contact</title>
<?php $this->end(); ?>
<div class="row padding-top">
	<div class="col-md-1">
	</div>
	<div class="col-md-3 noPaddingTablet noPaddingMobile">
		<div class="contact-image">
			<a href="http://gillesvanpeteghem.be" target="_blank"><?php echo $this->Html->image('/img/contact/contact.png', array('class' => 'imgHalf img-responsive')); ?></a>
		</div>
		<div class="contact-social">
			<p class="text-center"><a href="http://gillesvanpeteghem.be" target="_blank">Gilles Vanpeteghem</a></p>
			<p class="text-center">creator of snookview</p>
			<span>&nbsp;&nbsp;</span>
			<ul class="text-center">
				<a href="https://www.facebook.com/snookview/" target="_blank"><li>Facebook</li></a>
				<a href="https://twitter.com/snookview" target="_blank"><li>Twitter</li></a>
			</ul>
		</div>
	</div>
	<div class="col-md-7">
		<h3 class="left"><?php echo __('Contact Snookview!'); ?></h3>
		<?php echo $this->Form->create(null, array(
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
					echo $this->Form->input('firstname', array(
						'label' => 'Firstname',
						'placeholder' => 'Firstname',
						'class' => 'form-control borderLeft width95 width100'
					));
				echo '</div>';
				echo $this->Html->div('col-md-6 noPadding');
					echo $this->Form->input('surname', array(
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
					echo $this->Form->input('country', array(
						'label' => 'Country',
						'placeholder' => 'Country',
					));
				echo '</div>';
			echo '</div>';
			echo $this->Form->input('subject', array(
				'label' => 'Subject',
				'placeholder' => 'Subject'
			));
			echo $this->Form->input('message', array(
				'label' => 'Message',
				'placeholder' => 'Message',
				'type' => 'textarea'
			));
			echo $this->Form->label('Captcha');
			echo $this->Captcha->render(array(
				'type' => 'image'
			));
		?>
		</fieldset>
		<?php echo $this->Form->end(array('label' => __('Send', true), 'class' => 'btn btn-default btn-success btn-lg')); ?>
	</div>
	<div class="col-md-1">
	</div>
</div>
<script 
src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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