<?php $this->start('meta'); ?>
	<title>Snookview - View Item</title>
<?php $this->end(); ?>
<?php echo $this->element('viewActions', array(
	"list" => ' List Items',
	"edit" => ' Edit Item',
	"delete" => ' Delete Item',
	"id" => $item['Item']['item_id'],
	"display" => $item['Item']['item_title']
)); ?>
<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('Title'); ?></th>
			<th><?php echo __('Start Hours'); ?></th>
			<th><?php echo __('Start Minutes'); ?></th>
			<th><?php echo __('Start Seconds'); ?></th>
			<th><?php echo __('Start Point'); ?></th>
			<th><?php echo __('End Hours'); ?></th>
			<th><?php echo __('End Minutes'); ?></th>
			<th><?php echo __('End Seconds'); ?></th>
			<th><?php echo __('End Point'); ?></th>
			<th><?php echo __('Description'); ?></th>
			<th><?php echo __('Tags'); ?></th>
			<th><?php echo __('Part'); ?></th>
			<th><?php echo __('Created'); ?></th>
			<th><?php echo __('Modified'); ?></th>
			<th><?php echo __('Timeline'); ?></th>
		</tr>
		<tr>
			<td><?php echo h($item['Item']['item_id']); ?></td>
			<td><?php echo h($item['Item']['item_title']); ?></td>
			<td><?php echo h($item['Item']['item_hours_start']); ?></td>
			<td><?php echo h($item['Item']['item_minutes_start']); ?></td>
			<td><?php echo h($item['Item']['item_seconds_start']); ?></td>
			<td><?php echo h($item['Item']['item_point_start']); ?></td>
			<td><?php echo h($item['Item']['item_hours_end']); ?></td>
			<td><?php echo h($item['Item']['item_minutes_end']); ?></td>
			<td><?php echo h($item['Item']['item_seconds_end']); ?></td>
			<td><?php echo h($item['Item']['item_point_end']); ?></td>
			<td><?php echo h($item['Item']['item_description']); ?></td>
			<td><?php echo h($item['Item']['item_tags']); ?></td>
			<td><?php echo h($item['Item']['item_part']); ?></td>
			<td><?php echo h(date("d-m-Y H:i:s", strtotime($item['Item']['created']))); ?></td>
			<td><?php echo h(date("d-m-Y H:i:s", strtotime($item['Item']['modified']))); ?></td>
			<td><?php echo $this->Html->link($item['Timeline']['timeline_title'], array('controller' => 'timelines', 'action' => 'view', $item['Timeline']['timeline_id'])); ?></td>
		</tr>
	</table>
</div>
<div class="related">
	<h3><?php echo __('Related Player'); ?></h3>
	<?php if (!empty($item['Player'])): ?>
	<div class="table-responsive">
		<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('Firstname'); ?></th>
			<th><?php echo __('Surname'); ?></th>
			<th><?php echo __('BirthDate'); ?></th>
			<th><?php echo __('TurnedPro'); ?></th>
			<th><?php echo __('Nickname'); ?></th>
			<th><?php echo __('Nationality'); ?></th>
			<th><?php echo __('Flag'); ?></th>
			<th><?php echo __('HighestBreak'); ?></th>
			<th><?php echo __('HighestRanking'); ?></th>
			<th><?php echo __('CenturyBreaks'); ?></th>
			<th><?php echo __('CareerWinnings'); ?></th>
			<th><?php echo __('WorldChampion'); ?></th>
			<th><?php echo __('Image'); ?></th>
			<th><?php echo __('Category'); ?></th>
		</tr>
		<?php foreach ($item['Player'] as $player): ?>
			<tr>
				<td><?php echo $this->Html->link($player['player_id'], array('controller' => 'players', 'action' => 'view', $player['player_id'])); ?></td>
				<td><?php echo $player['player_firstname']; ?></td>
				<td><?php echo $player['player_surname']; ?></td>
				<td><?php echo date("d-m-Y", strtotime( $player['player_birthDate'])); ?></td>
				<td><?php echo $player['player_turnedPro']; ?></td>
				<td><?php echo $player['player_nickname']; ?></td>
				<td><?php echo $player['player_nationality']; ?></td>
				<td><?php if($player['player_flag']) echo $this->Html->image(h($player['player_flag']), array('class' => 'flag')); ?></td>
				<td><?php echo $player['player_highestBreak']; ?></td>
				<td><?php echo $player['player_highestRanking']; ?></td>
				<td><?php echo $player['player_centuryBreaks']; ?></td>
				<td><?php echo $player['player_careerWinnings']; ?></td>
				<td><?php echo $player['player_worldChampion']; ?></td>
				<td><?php if(!empty($player['player_image'])):{
					echo $this->Html->image(h($player['player_image']), array('class' => 'thumb'));
				}
				else:{
					echo $this->Html->image('/img/users/profile.jpg', array('class' => 'thumb'));
				 }
				endif; ?></td>
				<td><?php echo $player['player_category']; ?></td>
			</tr>
		<?php endforeach; ?>
		</table>
	</div>
<?php endif; ?>
</div>