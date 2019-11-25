<?php $this->start('meta'); ?>
	<title>Snookview - View Item</title>
<?php $this->end(); ?>
<?php echo $this->element('viewActions', array(
	"list" => ' List Items',
	"edit" => ' Edit Item',
	"delete" => ' Delete Item',
	"id" => $item->item_id,
	"display" => $item->item_title
)); ?>
<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'				); ?></th>
			<th><?php echo __('Title'			); ?></th>
			<th><?php echo __('Start Hours'		); ?></th>
			<th><?php echo __('Start Minutes'	); ?></th>
			<th><?php echo __('Start Seconds'	); ?></th>
			<th><?php echo __('Start Point'		); ?></th>
			<th><?php echo __('End Hours'		); ?></th>
			<th><?php echo __('End Minutes'		); ?></th>
			<th><?php echo __('End Seconds'		); ?></th>
			<th><?php echo __('End Point'		); ?></th>
			<th><?php echo __('Description'		); ?></th>
			<th><?php echo __('Tags'			); ?></th>
			<th><?php echo __('Created'			); ?></th>
			<th><?php echo __('Modified'		); ?></th>
			<th><?php echo __('Timeline'		); ?></th>
		</tr>
		<tr>
			<td><?php echo $item->item_id 				?></td>
			<td><?php echo $item->item_title 			?></td>
			<td><?php echo $item->item_hours_start 		?></td>
			<td><?php echo $item->item_minutes_start 	?></td>
			<td><?php echo $item->item_seconds_start 	?></td>
			<td><?php echo $item->item_point_start 		?></td>
			<td><?php echo $item->item_hours_end 		?></td>
			<td><?php echo $item->item_minutes_end 		?></td>
			<td><?php echo $item->item_seconds_end 		?></td>
			<td><?php echo $item->item_point_end 		?></td>
			<td><?php echo $item->item_description 		?></td>
			<td><?php echo $item->item_tags 			?></td>
			<td>
				<?php 
					echo date(
						"d-m-Y H:i:s", 
						strtotime(
							$item->created
						)
					); 
				?>
			</td>
			<td>
				<?php 
					echo date(
						"d-m-Y H:i:s", 
						strtotime(
							$item->modified
						)
					); 
				?>
			</td>
			<td>
				<?php 
					echo $this->Html->link(
						$item->timeline->timeline_title, [
						'controller' => 'timelines', 
						'action' => 'view', 
						$item->timeline->timeline_id
						]
					); 
				?>
			</td>
		</tr>
	</table>
</div>
<div class="related">
	<h3><?php echo __('Related Players'); ?></h3>
	<?php if (!empty($item->players)): ?>
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
			<tr>
				<th><?php echo __('Id'				); ?></th>
				<th><?php echo __('Firstname'		); ?></th>
				<th><?php echo __('Surname'			); ?></th>
				<th><?php echo __('BirthDate'		); ?></th>
				<th><?php echo __('TurnedPro'		); ?></th>
				<th><?php echo __('Nickname'		); ?></th>
				<th><?php echo __('Nationality'		); ?></th>
				<th><?php echo __('Flag'			); ?></th>
				<th><?php echo __('HighestBreak'	); ?></th>
				<th><?php echo __('HighestRanking'	); ?></th>
				<th><?php echo __('CenturyBreaks'	); ?></th>
				<th><?php echo __('CareerWinnings'	); ?></th>
				<th><?php echo __('WorldChampion'	); ?></th>
				<th><?php echo __('Image'			); ?></th>
				<th><?php echo __('Category'		); ?></th>
			</tr>
			<?php foreach ($item->players as $player): ?>
				<tr>
					<td>
						<?php 
							echo $this->Html->link(
								$player->player_id, [
									'controller' => 'players', 
									'action' => 'adminView', 
									$player->player_id
									]
								)
							; 
						?>
					</td>
					<td><?php echo $player->player_firstname 		?></td>
					<td><?php echo $player->player_surname 			?></td>
					<td>
						<?php 
							echo date(
								"d-m-Y", 
								strtotime(
									$player->player_birthDate
									)
								)
							; 
						?>
					</td>
					<td><?php echo $player->player_turnedPro 		?></td>
					<td><?php echo $player->player_nickname 		?></td>
					<td><?php echo $player->player_nationality 		?></td>
					<td>
						<?php 
							echo $this->Html->image(
								'/img/flags/' . $player->player_flag, [
									'class' => 'flag'
									]
								)
							; 
						?>
					</td>
					<td><?php echo $player->player_highestBreak 	?></td>
					<td><?php echo $player->player_highestRanking 	?></td>
					<td><?php echo $player->player_centuryBreaks	?></td>
					<td><?php echo $player->player_careerWinnings	?></td>
					<td><?php echo $player->player_worldChampion	?></td>
					<td>
						<?php 
							echo $this->Html->image(
								'/img/players/' . $player->player_image, [
									'class' => 'thumb'
									]
								)
							; 
						?>
					</td>
					<td><?php echo $player->player_category 		?></td>
				</tr>
			<?php endforeach; ?>
			</table>
		</div>
		<?php else: 
			echo '<div class="row"><div class="col-md-12 noPadding"><div class="box text-center coming"><p>No players yet or not connected to a player.</p></div></div></div>';
		?>
	<?php endif; ?>
</div>