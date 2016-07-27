<!-- <div class="content"> -->
	<!-- <div class="login"> -->
		<?php //if ($logged_in): ?>
			<?php //echo $this->Html->image(h($current_user['user_image']), array('class' => 'thumb')); ?>
			<!-- Welcome --> <?php //echo $this->Html->link($current_user['user_username'], array('controller' => 'users', 'action' => 'profile', $current_user['user_id']));; ?>.
			<?php //echo $this->Html->link(
				//$this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-off')) . "", 
				//array('controller'=>'users', 'action'=>'logout'),
				//array('class' => 'btn btn-mini', 'escape' => false)
			//); ?>
		<?php //else: ?>
			<?php //echo $this->Html->link(
				//$this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-user')) . "",
				//array('controller'=>'users', 'action'=>'login'),
				//array('class' => 'btn btn-mini', 'escape' => false)
			//); ?>
		<?php //endif; ?>
	<!-- </div> -->
	<?php //echo $this->Session->flash(); ?>
	<?php //echo $this->fetch('content'); ?>
	<!-- <div class="push"></div> -->
<!-- </div> -->