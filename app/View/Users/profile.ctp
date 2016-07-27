<?php $this->start('meta'); ?>
	<title>Snookview - Account</title>
<?php $this->end(); ?>
<div class="row padding-top">
	<div class="row">
		<div class="col-md-12">
			<h3>My Account</h3>
		</div>
	</div>
	<div class="col-md-4">
	</div>
	<div class="col-md-4 box text-center noPadding">
		<?php if(!empty($user['User']['user_image'])):{
				echo $this->Html->image($user['User']['user_image'], array('class' => 'img-responsive img-center imgHalf'));
			}
			else:{
				echo $this->Html->image('/img/users/profile.jpg', array('class' => 'img-responsive img-center'));
			 }
			endif; 
		?>
		<div class="profile">
			<p class="text-center uppercase"><?php echo $user['User']['user_firstname'] . ' ' . $user['User']['user_surname']; ?></p>
			<p><?php echo h('Country: ' . $user['User']['user_country']); ?></p>
			<p><?php echo h('Username: ' . $user['User']['user_username']); ?></p>
			<p><?php echo h('Email: ' . $user['User']['email']); ?></p>
			<ul class="text-center">
				<li><?php echo $this->Html->link(__('My Favorites'), array('controller' => 'favorites', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('My Comments'), array('controller' => 'comments', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('My Matches'), array('controller' => 'matches', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('Edit Account'), array('action' => 'edit', $user['User']['user_id'])); ?></li>
				<li><?php echo $this->Form->postLink(__('Delete Account'), array('action' => 'delete', $user['User']['user_id']), null, __('Are you sure you want to delete %s?', $user['User']['user_username'])); ?></li>
				<li><?php echo $this->Html->link(
					__('Sign Out'), array(
						'controller' => 'users',
						'action' => 'logout'
						)
					);
				?></li>
			</ul>
		</div>
	</div>
	<div class="col-md-4">
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