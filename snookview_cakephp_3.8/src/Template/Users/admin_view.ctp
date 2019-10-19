<?php $this->start('meta'); ?>
	<title>Snookview - View User</title>
<?php $this->end(); ?>
<?php echo $this->element('viewActions', array(
	"list" => ' List Users',
	"edit" => ' Edit User',
	"delete" => ' Delete User',
	"id" => $user['User']['user_id'],
	"display" => $user['User']['user_username']
)); ?>
<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('Firstname'); ?></th>
			<th><?php echo __('Surname'); ?></th>
			<th><?php echo __('Country'); ?></th>
			<th><?php echo __('Username'); ?></th>
			<th><?php echo __('Email'); ?></th>
			<th><?php echo __('Image'); ?></th>
			<th><?php echo __('Created'); ?></th>
			<th><?php echo __('Modified'); ?></th>
			<th><?php echo __('Role'); ?></th>
		</tr>
		<tr>
			<td><?php echo h($user['User']['user_id']); ?></td>
			<td><?php echo h($user['User']['user_firstname']); ?></td>
			<td><?php echo h($user['User']['user_surname']); ?></td>
			<td><?php echo h($user['User']['user_country']); ?></td>
			<td><?php echo h($user['User']['user_username']); ?></td>
			<td><?php echo h($user['User']['email']); ?></td>
			<td><?php if(!empty($user['User']['user_image'])):{
				echo $this->Html->image(h($user['User']['user_image']), array('class' => 'thumb'));
			}
			else:{
				echo $this->Html->image('/img/users/profile.jpg', array('class' => 'thumb'));
			 }
			endif; ?></td>
			<td><?php echo h(date("d-m-Y H:i:s", strtotime($user['User']['created']))); ?></td>
			<td><?php echo h(date("d-m-Y H:i:s", strtotime($user['User']['modified']))); ?></td>
			<td><?php echo h($user['User']['user_role']); ?></td>
		</tr>
	</table>
</div>