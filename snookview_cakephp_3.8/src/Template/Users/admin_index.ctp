<?php $this->start('meta'); ?>
	<title>Snookview - Users</title>
<?php $this->end(); ?>
<div class="row">
	<?php 
	if(empty($users)){
		echo '<div id="flashMessage" class="message">' . 'No users have been added, please be the first to add a User.' . '</div>';
	} ?>
	<div class="col-md-2">
		<ul class="nav nav-pills nav-stacked">
			<?php //if($current_user['user_role'] == 'admin'): ?>
				<li><?php echo $this->Html->link(__('New User'), array('action' => 'adminAdd')); ?></li>
			<?php //endif; ?>
		</ul>
	</div>

	<div class="col-md-10">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
			<tr>
				<th><?php echo $this->Paginator->sort('user_id', 'ID'); ?></th>
				<th><?php echo $this->Paginator->sort('user_firstname', 'Firstname'); ?></th>
				<th><?php echo $this->Paginator->sort('user_lastname', 'Lastname'); ?></th>
				<th><?php echo $this->Paginator->sort('user_country', 'Country'); ?></th>
				<th><?php echo $this->Paginator->sort('user_username', 'Username'); ?></th>
				<th><?php echo $this->Paginator->sort('user_activate', 'Active'); ?></th>
				<th><?php echo $this->Paginator->sort('email', 'Email'); ?></th>
				<th><?php echo $this->Paginator->sort('user_image', 'Image'); ?></th>
				<th><?php echo $this->Paginator->sort('user_created', 'Created'); ?></th>
				<th><?php echo $this->Paginator->sort('user_modified', 'Modified'); ?></th>
				<th><?php echo $this->Paginator->sort('user_lastlogin', 'Last Login'); ?></th>
				<th><?php echo $this->Paginator->sort('user_locked', 'Locked'); ?></th>
				<th><?php echo $this->Paginator->sort('user_confirmed', 'Confirmed'); ?></th>
				<th><?php echo $this->Paginator->sort('user_role', 'Role'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			<?php foreach ($users as $user): ?>
				<?php //if($current_user['user_id'] == $user['User']['user_id'] || $current_user['user_role'] == 'admin'): ?>
					<tr>
						<td><?php echo $this->Html->link($user->user_id, ['action' => 'adminView', $user->user_id]); ?></td>
						<td><?php echo h($user->user_firstname); ?></td>
						<td><?php echo h($user->user_lastname); ?></td>
						<td><?php echo h($user->user_country); ?></td>
						<td><?php echo h($user->user_username); ?></td>
						<td><?php echo h($user->user_activate); ?></td>
						<td><?php echo h($user->email); ?></td>
						<td><?php if(!empty($user->user_image)):{
							echo $this->Html->image('/img/users/' . $user->user_image, ['class' => 'thumb']);
						}
						else:{
							echo $this->Html->image('/img/users/profile.jpg', array('class' => 'thumb'));
						 }
						endif; ?></td>
						<td><?php echo h(date("d-m-Y H:i:s", strtotime($user->created))); ?></td>
						<td><?php echo h(date("d-m-Y H:i:s", strtotime($user->modified))); ?></td>
						<td><?php echo h(date("d-m-Y H:i:s", strtotime($user->user_lastlogin))); ?></td>
						<td><?php echo h(date("d-m-Y H:i:s", strtotime($user->user_locked))); ?></td>
						<td><?php echo h(date("d-m-Y H:i:s", strtotime($user->user_confirmed))); ?></td>
						<td><?php echo h($user->user_role); ?></td>
						<td class="actions">
							<?php //if($current_user['user_id'] == $user['User']['user_id'] && $current_user['user_role'] == 'admin'): ?>
							<?php //if($current_user['user_role'] == 'admin'): ?>
								<?php echo $this->Html->link(
									$this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-edit')) . "",
									array('action' => 'adminEdit', $user->user_id),
									array('class' => 'btn btn-mini btn-noPadding', 'escape' => false)
								); ?>
								<?php echo $this->element('deleteAction', array(
									"idDeleteAction" 		=> $user->user_id,
									"displayDeleteAction" 	=> $user->user_firstname . ' ' . $user->user_lastname
								)); ?>
							<?php //endif; ?>
						</td>
					</tr>
				<?php //endif; ?>
			<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>
<?php echo $this->element('pagination'); ?>