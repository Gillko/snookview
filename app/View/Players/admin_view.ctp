<?php $this->start('meta'); ?>
	<title>Snookview - View Player</title>
<?php $this->end(); ?>
<?php echo $this->element('viewActions', array(
	"list" => ' List Players',
	"edit" => ' Edit Player',
	"delete" => ' Delete Player',
	"id" => $player['Player']['player_id'],
	"display" => $player['Player']['player_surname']
)); ?>

<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('Slug'); ?></th>
			<th><?php echo __('Firstname'); ?></th>
			<th><?php echo __('Surname'); ?></th>
			<th><?php echo __('BirthDate'); ?></th>
			<th><?php echo __('TurnedPro'); ?></th>
			<th><?php echo __('Nickname'); ?></th>
			<th><?php echo __('Nationality'); ?></th>
			<th><?php echo __('Flag'); ?></th>
			<th><?php echo __('Highest Break'); ?></th>
			<th><?php echo __('Highest Ranking'); ?></th>
			<th><?php echo __('CenturyBreaks'); ?></th>
			<th><?php echo __('CareerWinnings'); ?></th>
			<th><?php echo __('WorldChampion'); ?></th>
			<th><?php echo __('Image'); ?></th>
			<th><?php echo __('Category'); ?></th>
		</tr>
		<tr>
			<td><?php echo h($player['Player']['player_id']); ?></td>
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
			<td><?php echo $this->Html->image(h($player['Player']['player_image']), array('class' => 'thumb')); ?></td>
			<td><?php echo h($player['Player']['player_category']); ?></td>
		</tr>
	</table>
</div>
<div class="related">
	<h3><?php echo __('Related Videos'); ?></h3>
	<?php if (!empty($player['Video'])): ?>
	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<tr>
				<th><?php echo __('Id'); ?></th>
				<th><?php echo __('Title'); ?></th>
				<th><?php echo __('Date'); ?></th>
				<th><?php echo __('ScoreA'); ?></th>
				<th><?php echo __('ScoreB'); ?></th>
				<th><?php echo __('URL'); ?></th>
			</tr>
			<?php foreach ($player['Video'] as $video): ?>
				<?php 
					$myString = $video['video_url'];
					$myArray = explode(',', $myString);
				?>
				<?php if($video['video_sort'] == 'Single'): ?>
					<tr>
						<td><?php echo $this->Html->link($video['video_id'], array('controller' => 'videos', 'action' => 'view', $video['video_id'])); ?></td>
						<td><?php echo $video['video_title']; ?></td>
						<td><?php echo h(date("d-m-Y", strtotime($video['video_date']))); ?></td>
						<td><?php echo $video['video_scoreA']; ?></td>
						<td><?php echo $video['video_scoreB']; ?></td>
						<td>
							<a href="<?php echo "http://www.youtube.com/watch?v=" . $video['video_url'] ?>" target="_blank"><img src="<?php echo "http://img.youtube.com/vi/" . $video['video_url'] . "/default.jpg" ?>" alt="$video['video_title']"></a>
						</td>
					</tr>
				<?php elseif ($video['video_sort'] == 'Playlist'): ?>
					<tr>
						<td><?php echo $this->Html->link($video['video_id'], array('controller' => 'videos', 'action' => 'view', $video['video_id'])); ?></td>
						<td><?php echo $video['video_title']; ?></td>
						<td><?php echo h(date("d-m-Y", strtotime($video['video_date']))); ?></td>
						<td><?php echo $video['video_scoreA']; ?></td>
						<td><?php echo $video['video_scoreB']; ?></td>
						<td>
							<a href="<?php echo "https://www.youtube.com/watch?v=" . $myArray[0] . "&list=" . $video['video_url_playlist'] . "&index=1" ?>" target="_blank"><img src="<?php echo "http://img.youtube.com/vi/" . $myArray[0] . "/default.jpg" ?>" alt="$video['video_title']"></a>
						</td>
					</tr>
				<?php endif; ?>
			<?php endforeach; ?>
		</table>
	</div>
<?php endif; ?>
</div>
