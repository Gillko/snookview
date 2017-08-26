<div class="navbar-header back">
	<a class="navbar-brand back" href="/">Snookview</a>
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
</div>
<div class="collapse navbar-collapse navbar-collapse-gv" id="bs-example-navbar-collapse-1">
	<ul class="nav navbar-nav nav-gv back">
		<?php if ($logged_in): ?>
			<li role="presentation" class="dropdown current-user-gv">
				<?php if(!empty($current_user['user_image'])):{
					echo $this->Html->image(h($current_user['user_image']), array('class' => 'thumb'));
				}
				else:{
					echo $this->Html->image('/img/users/profile.jpg', array('class' => 'thumb'));
				 }
				endif; ?>
				<span class="back-gv"><?php echo $current_user['user_username']; ?></span>
				<ul class="dropdown-menu">
					<li role="presentation" class="dropdown text-center">
						<?php echo $this->Html->link(__('Favorites'), array('controller' => 'favorites', 'action' => 'index')); ?>
					</li>
					<li role="presentation" class="dropdown text-center">
						<?php echo $this->Html->link(__('Comments'), array('controller' => 'comments', 'action' => 'index')); ?>
					</li>
					<li role="presentation" class="dropdown text-center">
						<?php echo $this->Html->link(__('Account'), array('controller' => 'users', 'action' => 'edit', $current_user['user_id'])); ?>
					</li>
					<li role="presentation" class="dropdown text-center">
						<?php echo $this->Html->link(
							__('Sign Out'), array(
								'controller' => 'users',
								'action' => 'logout'
								)
							);
						?>
					</li>
				</ul>
			</li>
		<?php else: ?>
			<li>
				<?php /*echo $this->Html->link(
					$this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-user')) . "",
					array('controller'=>'users', 'action'=>'login'),
					array('class' => 'btn btn-mini noPadding', 'escape' => false)
				); */?>
				<?php echo $this->Html->link(
					__('Sign In'), array(
						'controller' => 'users',
						'action' => 'login'
						)
					);
				?>
			<li>
		<?php endif; ?>
		<li><?php echo $this->Html->link(__('Users'), array('controller' => 'users', 'action' => 'index', 'admin' => true)); ?></li>
		<li><?php echo $this->Html->link(__('Comments'), array('controller' => 'comments', 'action' => 'index', 'admin' => true)); ?></li>
		<li><?php echo $this->Html->link(__('Rounds'), array('controller' => 'rounds', 'action' => 'index', 'admin' => true)); ?></li>
		<li><?php echo $this->Html->link(__('Tournaments'), array('controller' => 'tournaments', 'action' => 'index', 'admin' => true)); ?></li>
		<li><?php echo $this->Html->link(__('Timelines'), array('controller' => 'timelines', 'action' => 'index', 'admin' => true)); ?></li>
		<li><?php echo $this->Html->link(__('Videos'), array('controller' => 'videos', 'action' => 'index', 'admin' => true)); ?></li>
		<li><?php echo $this->Html->link(__('Items'), array('controller' => 'items', 'action' => 'index', 'admin' => true)); ?></li>
		<li><?php echo $this->Html->link(__('Favorites'), array('controller' => 'favorites', 'action' => 'index', 'admin' => true)); ?></li>
		<li><?php echo $this->Html->link(__('Players'), array('controller' => 'players', 'action' => 'index', 'admin' => true)); ?></li>
		<li><?php echo $this->Html->link(__('Seasons'), array('controller' => 'seasons', 'action' => 'index', 'admin' => true)); ?></li>
		<li><?php echo $this->Html->link(__('Ranking'), array('controller' => 'rankings', 'action' => 'index', 'admin' => true)); ?></li>
	</ul>
</div>