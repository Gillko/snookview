<?php $this->start('meta'); ?>
	<title>Snookview - Edit User</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.user_id')), null, __('Are you sure you want to delete %s?', $this->Form->value('User.user_username'))); ?></li>
		</ul>
	</div>
	<div class="col-md-9">
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
			<legend><?php echo __('Edit User'); ?></legend>
		<?php
			echo $this->Form->input('user_id');
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
			if(!empty($this->data['User']['user_image'])): ?>
				<div class="input">
					<label>Current Image:</label>
						<?php echo $this->Html->image($this->data['User']['user_image'], array('class' => 'profileImage', 'width' => 100)); ?>
				</div>
			<?php endif;
			/*foreach($files as $u => $file): {
				echo $this->Html->image(h('users/'. $this->data['User']['user_username'] . '/' . $file), array('width' => 100, 'class' => 'user', 'id' => ($u + 1)));
				echo '&nbsp';
			}
			endforeach;*/
			/*echo $this->Form->input('user_imagePath', array(
				'label' => 'Image',
				'placeholder' => 'Image',
				'id' => 'playerFlag',
			));*/
			echo $this->Html->div('upload');
				echo $this->Form->input('user_image', array(
					'label' => 'Image',
					'placeholder' => 'Image',
					'type' => 'file',
					'required' => true,
					'disabled' => true,
					'class' => 'input-upload form-control'
				));
			echo '</div>';
			/*echo $this->Form->input('modified', array(
				'type' => 'hidden',
			));*/
			if($current_user['user_role'] == 'admin'):
			echo $this->Form->input('user_role', array(
				'label' => 'Role',
				'placeholder' => 'Role',
				/*'type' => 'select',
				'options' => $roles*/
			));
			endif;
		?>
		</fieldset>
		<?php echo $this->Form->end(array('label' => __('Edit', true), 'class' => 'btn btn-default btn-success btn-lg')); ?>
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