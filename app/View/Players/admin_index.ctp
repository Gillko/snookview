<?php $this->start('meta'); ?>
	<title>Snookview - Players</title>
<?php $this->end(); ?>
<div class="row">
	<?php 
	if(empty($players)){
		echo '<div id="flashMessage" class="message">' . 'No players have been added, please be the first to add a Player.' . '</div>';
	} ?>
	<div class="col-md-2">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Html->link(__('New Player'), array('action' => 'add')); ?></li>
		</ul>
	</div>
	<div class="col-md-10">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
			<tr>
					<th><?php echo $this->Paginator->sort('player_id', 'ID'); ?></th>
					<th><?php echo $this->Paginator->sort('player_slug', 'Slug'); ?></th>
					<th><?php echo $this->Paginator->sort('player_firstname', 'Firstname'); ?></th>
					<th><?php echo $this->Paginator->sort('player_surname', 'Surname'); ?></th>
					<th><?php echo $this->Paginator->sort('player_birthDate', 'Birth Date'); ?></th>
					<th><?php echo $this->Paginator->sort('player_turnedPro', 'Turned Pro'); ?></th>
					<th><?php echo $this->Paginator->sort('player_nickname', 'Nickname'); ?></th>
					<th><?php echo $this->Paginator->sort('player_nationality', 'Nationality'); ?></th>
					<th><?php echo $this->Paginator->sort('player_flag', 'Flag'); ?></th>
					<th><?php echo $this->Paginator->sort('player_highestBreak', 'Highest Break'); ?></th>
					<th><?php echo $this->Paginator->sort('player_highestRanking', 'Highest Ranking'); ?></th>
					<th><?php echo $this->Paginator->sort('player_centuryBreaks', 'Century Breaks'); ?></th>
					<th><?php echo $this->Paginator->sort('player_careerWinnings', 'Career Winnings'); ?></th>
					<th><?php echo $this->Paginator->sort('player_worldChampion', 'World Champion'); ?></th>
					<th><?php echo $this->Paginator->sort('player_image', 'Image'); ?></th>
					<th><?php echo $this->Paginator->sort('player_category', 'Category'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			<?php foreach ($players as $player): ?>
				<tr>
					<td><?php echo $this->Html->link($player['Player']['player_id'], array('action' => 'view', $player['Player']['player_id'])); ?></td>
					<td><?php echo h($player['Player']['player_slug']); ?></td>
					<td><?php echo h($player['Player']['player_firstname']); ?></td>
					<td><?php echo h($player['Player']['player_surname']); ?></td>
					<td><?php echo h(date("d-m-Y", strtotime($player['Player']['player_birthDate']))); ?></td>
					<td><?php echo h($player['Player']['player_turnedPro']); ?></td>
					<td><?php echo h($player['Player']['player_nickname']); ?></td>
					<td><?php echo h($player['Player']['player_nationality']); ?></td>
					<td><?php if($player['Player']['player_flag']) echo $this->Html->image(h($player['Player']['player_flag']), array('class' => 'flag')); ?></td>
					<td><?php echo h($player['Player']['player_highestBreak']); ?></td>
					<td><?php echo h($player['Player']['player_highestRanking']); ?></td>
					<td><?php echo h($player['Player']['player_centuryBreaks']); ?></td>
					<td><?php echo h($player['Player']['player_careerWinnings']); ?></td>
					<td><?php echo h($player['Player']['player_worldChampion']); ?></td>
					<td>
						<?php if(!empty($player['Player']['player_image'])):{
							echo $this->Html->image(h($player['Player']['player_image']), array('class' => 'thumb'));
						}
						else:{
							echo $this->Html->image('/img/users/profile.jpg', array('class' => 'thumb'));
						 }
						endif; ?>
					</td>
					<td><?php echo h($player['Player']['player_category']); ?></td>
					<td class="actions">
						<?php echo $this->Html->link(
						    $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-edit')), //. " Edit",
						    array('action' => 'edit', $player['Player']['player_id']),
						    array('class' => 'btn btn-mini btn-noPadding', 'escape' => false)
						); ?>
						<?php echo $this->Form->postLink(
						   $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove')), //. " Delete",
						        array('action' => 'delete', $player['Player']['player_id']),
						        array('class' => 'btn btn-mini btn-noPadding', 'escape'=>false),
						    __('Are you sure you want to delete %s?', $player['Player']['player_surname'])
						);
						?>
					</td>
				</tr>
			<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>
<?php echo $this->element('pagination'); ?>