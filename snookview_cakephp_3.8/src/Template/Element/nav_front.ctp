<div class="navbar-header <?php echo $location; ?>">
	<!-- <a class="navbar-brand <?php //echo $location; ?>" href="/"><span style="color:#000;">Sno</span><span style="color:#fae042;">ok<strong>v</span><span style="color:#ed2939;">iew</strong></span><strong>.</strong></a> -->
	<a class="navbar-brand <?php echo $location; ?>" href="/"><span style="color:#002395;">Sno</span><span style="color:#fff;">ok<strong>v</span><span style="color:#ed2939;">iew</strong></span><strong>.</strong></a>
	<?php echo $headingOne; ?>
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
</div>
<div class="collapse navbar-collapse navbar-collapse-gv" id="bs-example-navbar-collapse-1">
	<ul class="nav navbar-nav nav-gv <?php echo $location; ?>">
		<!-- <li class="<?php //echo (!empty($this->params['controller']) && ($this->params['controller']=='about') )?'activeNav' :'inactive' ?>">
			<?php /*echo $this->Html->link(
				__('About'), array(
					'controller' => 'about',
					'action' => 'index'
					)
				);*/
			?>
		</li> -->
		<li role="presentation" class="<?php echo (!empty($this->params->controller) && ($this->params->controller == 'tournaments' || $this->params->controller == 'videos' || $this->params->controller == 'rounds') )?'activeNav' :'inactive' ?> dropdown">
			<?php echo $this->Html->link(
				__('Tournaments'), array(
					'controller' => 'tournaments',
					'action' => 'index'
					), array('class' => 'noBackground', 'aria-expanded' => 'false', "role" => "button", "aria-haspopup"=> "true")
				);
			?>
			<ul class="dropdown-menu">
				<li role="presentation" class="<?php echo (!empty($this->params->controller) && ($this->params->controller == 'tournaments' && $this->params->action == 'index') )?'activeNav' :'inactive' ?> dropdown">
					<?php echo $this->Html->link(__('All Tournaments'), array('controller' => 'tournaments', 'action' => 'index'));
					?>
				</li>
				<li role="separator" class="divider"></li>
				<li role="presentation" class="<?php echo (!empty($this->params->controller) && ($this->params->controller == 'tournaments' && $this->params->action == 'uk') )?'activeNav' :'inactive' ?> dropdown">
					<?php echo $this->Html->link(__('UK Championship'), array('controller' => 'tournaments', 'action' => 'uk'));
					?>
				</li>
				<li role="presentation" class="<?php echo (!empty($this->params->controller) && ($this->params->controller == 'tournaments' && $this->params->action == 'tm') )?'activeNav' :'inactive' ?> dropdown">
					<?php echo $this->Html->link(__('The Masters'), array('controller' => 'tournaments', 'action' => 'tm')); ?>
				</li>
				<li role="presentation" class="<?php echo (!empty($this->params->controller) && ($this->params->controller == 'tournaments' && $this->params->action == 'wc') )?'activeNav' :'inactive' ?> dropdown">
					<?php echo $this->Html->link(__('World Championship'), array('controller' => 'tournaments', 'action' => 'wc')); ?>
				</li>
    		</ul>
		</li>
		<li class="<?php echo (!empty($this->params->controller) && ($this->params->controller == 'players') )?'activeNav' :'inactive' ?>">
			<?php echo $this->Html->link(
				__('Players'), array(
					'controller' => 'players',
					'action' => 'index'
					)
				);
			?>
		</li>
		<li class="<?php echo (!empty($this->params->controller) && ($this->params->controller == 'rankings') )?'activeNav' :'inactive' ?>">
			<?php echo $this->Html->link(
				__('Ranking'), array(
					'controller' => 'rankings',
					'action' => 'index'
					)
				);
			?>
		</li>
		<!-- <li class="<?php //echo (!empty($this->params->controller) && ($this->params->controller == 'Contact') )?'activeNav' :'inactive' ?>">
			<?php /*echo $this->Html->link(
				__('Contact'), array(
					'controller' => 'contact', 'action' => 'index'
					)
				);*/
			?>
		</li> -->
		<?php //if ($logged_in): ?>
			<li role="presentation" class="dropdown current-user-gv">
				<?php if(!empty($current_user['user_image'])):{
					echo $this->Html->image(h($current_user['user_image']), array('class' => 'thumb'));
				} ?>
				<?php else:{
					echo $this->Html->image('/img/users/profile.jpg', array('class' => 'thumb'));
				 }
				endif; ?>
				<span><?php //echo $current_user['user_username']; ?></span>
				<ul class="dropdown-menu">
					<?php //if($current_user['user_id'] == 1 && $current_user['user_role'] == 'admin'): ?>
						<li role="presentation" class="dropdown text-center">
							<?php echo $this->Html->link(__('Backoffice'), array('admin' => true, 'controller' => 'users', 'action' => 'index')); ?>
						</li>
					<?php //endif; ?>
					<li role="presentation" class="dropdown text-center">
						<?php //echo $this->Html->link(__('Account'), array('controller' => 'users', 'action' => 'profile', $current_user['user_id'])); ?>
					</li>
					<li role="presentation" class="dropdown text-center">
						<?php echo $this->Html->link(__('Favorites'), array('controller' => 'favorites', 'action' => 'index')); ?>
					</li>
					<li role="presentation" class="dropdown text-center">
						<?php echo $this->Html->link(__('Comments'), array('controller' => 'comments', 'action' => 'index')); ?>
					</li>
					<li role="presentation" class="dropdown text-center">
						<?php echo $this->Html->link(__('Matches'), array('controller' => 'matches', 'action' => 'index')); ?>
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
		<?php //else: ?>
			<li class="<?php echo (!empty($this->params->controller) && ($this->params->controller == 'users') )?'activeNav' :'inactive' ?>">
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
		<?php //endif; ?>
		<?php //if ($logged_in): ?>
			<!-- <li>
				<?php /*echo $this->Html->link(
					__('Sign Out'), array(
						'controller' => 'users',
						'action' => 'logout'
						)
					);*/
				?>
			</li> -->
		<?php //else: ?>
			<!-- <li>
				<?php /*echo $this->Html->link(
					__('Sign In'), array(
						'controller' => 'users',
						'action' => 'login'
						)
					);*/
				?>
			</li> -->
		<?php //endif; ?>	
	</ul>
</div>