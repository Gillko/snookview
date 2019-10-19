<?php $this->start('meta'); ?>
	<title>Snookview - View Video</title>
<?php $this->end(); ?>
<?php echo $this->element('viewActions', array(
	"list" => ' List Videos',
	"edit" => ' Edit Video',
	"delete" => ' Delete Video',
	"id" => $video['Video']['video_id'],
	"display" => $video['Video']['video_title']
)); ?>
<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('Title'); ?></th>
			<th><?php echo __('Date'); ?></th>
			<th><?php echo __('Score A'); ?></th>
			<th><?php echo __('Score B'); ?></th>
			<?php if($video['Video']['video_sort'] == 'Single'): ?>
				<th><?php echo __('URL'); ?></th>
			<?php elseif ($video['Video']['video_sort'] == 'Playlist'): ?>
				<th><?php echo __('Playlist URL'); ?></th>
			<?php endif; ?>
			<th><?php echo __('Part'); ?></th>
			<th><?php echo __('Tournament'); ?></th>
			<th><?php echo __('Round'); ?></th>
		</tr>
		<tr>
			<td><?php echo h($video['Video']['video_id']); ?></td>
			<td><?php echo h($video['Video']['video_title']); ?></td>
			<td><?php echo h(date("d-m-Y", strtotime($video['Video']['video_date']))); ?></td>
			<td><?php echo h($video['Video']['video_scoreA']); ?></td>
			<td><?php echo h($video['Video']['video_scoreB']); ?></td>

			<?php 
				$myString = $video['Video']['video_url'];
				$myArray = explode(',', $myString);
			?>

			<?php if($video['Video']['video_sort'] == 'Single'): ?>
				<td>
					<a href="<?php echo "http://www.youtube.com/watch?v=" . $video['Video']['video_url'] ?>" target="_blank"><img src="<?php echo "http://img.youtube.com/vi/" . $video['Video']['video_url'] . "/default.jpg" ?>" alt="$video['Video']['video_title']"></a>
				</td>
			<?php elseif ($video['Video']['video_sort'] == 'Playlist'): ?>
				<td>
					<a href="<?php echo "https://www.youtube.com/watch?v=" . $myArray[0] . "&list=" . $video['Video']['video_url_playlist'] . "&index=1" ?>" target="_blank"><img src="<?php echo "http://img.youtube.com/vi/" . $myArray[0] . "/default.jpg" ?>" alt="$video['Video']['video_title']"></a>
				</td>
			<?php endif; ?>
			
			<td><?php echo h($video['Video']['video_part']); ?></td>
			<td><?php echo $this->Html->link($video['Tournament']['tournament_name'], array('controller' => 'tournaments', 'action' => 'view', $video['Tournament']['tournament_id'])); ?></td>
			<td><?php echo $this->Html->link($video['Round']['round_name'], array('controller' => 'rounds', 'action' => 'view', $video['Round']['round_id'])); ?></td>
		</tr>
	</table>
</div>
<div class="related">
	<h3><?php echo __('Related Players'); ?></h3>
	<?php if (!empty($video['Player'])): ?>
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
		<?php foreach ($video['Player'] as $player): ?>
			<tr>
				<td><?php echo $this->Html->link($player['player_id'], array('controller' => 'players', 'action' => 'view', $player['player_id'])); ?></td>
				<td><?php echo $player['player_firstname']; ?></td>
				<td><?php echo $player['player_surname']; ?></td>
				<td><?php echo h(date("d-m-Y", strtotime($player['player_birthDate']))); ?></td>
				<td><?php echo $player['player_turnedPro']; ?></td>
				<td><?php echo $player['player_nickname']; ?></td>
				<td><?php echo $player['player_nationality']; ?></td>
				<td><?php echo $this->Html->image(h($player['player_flag']), array('class' => 'flag')); ?></td>
				<td><?php echo $player['player_highestBreak']; ?></td>
				<td><?php echo $player['player_highestRanking']; ?></td>
				<td><?php echo $player['player_centuryBreaks']; ?></td>
				<td><?php echo $player['player_careerWinnings']; ?></td>
				<td><?php echo $player['player_worldChampion']; ?></td>
				<td><?php echo $this->Html->image(h($player['player_image']), array('class' => 'thumb')); ?></td>
				<td><?php echo $player['player_category']; ?></td>
			</tr>
		<?php endforeach; ?>
		</table>
	</div>
<?php endif; ?>
	<h3><?php echo __('Related Comments'); ?></h3>
	<?php if (!empty($video['Comment'])): ?>
	<div class="table-responsive">
		<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('Body'); ?></th>
			<th><?php echo __('Created'); ?></th>
		</tr>
		<?php foreach ($video['Comment'] as $comment): ?>
			<tr>
				<td><?php echo $this->Html->link($comment['comment_id'], array('controller' => 'comments', 'action' => 'view', $comment['comment_id'])); ?></td>
				<td><?php echo $comment['comment_body']; ?></td>
				<td><?php echo h(date("d-m-Y H:i:s", strtotime($comment['created']))); ?></td>
			</tr>
		<?php endforeach; ?>
		</table>
	</div>
<?php endif; ?>
</div>