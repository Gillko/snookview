<?php $this->start('meta'); ?>
	<title>Snookview - View User</title>
<?php $this->end(); ?>
<?php echo $this->element('viewActions', array(
	"list" 		=> ' List Users',
	"edit" 		=> ' Edit User',
	"delete" 	=> ' Delete User',
	"id" 		=> $user->user_id,
	"display" 	=> $user->user_firstname . ' ' . $user->user_lastname
)); ?>
<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'			); ?></th>
			<th><?php echo __('Firstname'	); ?></th>
			<th><?php echo __('Surname'		); ?></th>
			<th><?php echo __('Country'		); ?></th>
			<th><?php echo __('Username'	); ?></th>
			<th><?php echo __('Email'		); ?></th>
			<th><?php echo __('Image'		); ?></th>
			<th><?php echo __('Created'		); ?></th>
			<th><?php echo __('Modified'	); ?></th>
			<th><?php echo __('Role'		); ?></th>
		</tr>
		<tr>
			<td><?php echo $user->user_id				; ?></td>
			<td><?php echo $user->user_firstname		; ?></td>
			<td><?php echo $user->user_username 		; ?></td>
			<td><?php echo $user->user_country			; ?></td>
			<td><?php echo $user->user_username			; ?></td>
			<td><?php echo $user->email 				; ?></td>
			<td>
				<?php 
					if(!empty($user->user_image)): {
						echo $this->Html->image('/img/users/' . $user->user_image, ['class' => 'thumb']);
					}
					else: {
						echo $this->Html->image('/img/users/profile.jpg', ['class' => 'thumb']);
					 }
					endif; 
				?>
			</td>
			<td><?php echo h(date("d-m-Y H:i:s", strtotime($user->created))); ?></td>
			<td><?php echo h(date("d-m-Y H:i:s", strtotime($user->modified))); ?></td>
			<td><?php echo h($user->user_role); ?></td>
		</tr>
	</table>
</div>