<?php $this->start('meta'); ?>

	<title>Snookview - View Video</title>

<?php $this->end(); ?>
<?php 
	echo $this->element(
		'viewActions',
			[
				"list" 		=> ' List Videos',
				"edit" 		=> ' Edit Video',
				"delete" 	=> ' Delete Video',
				"id" 		=> $video->video_id,
				"display" 	=> $video->video_title
			]
		)
	; 
?>
<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'			); ?></th>
			<th><?php echo __('Slug'		); ?></th>
			<th><?php echo __('Title'		); ?></th>
			<th><?php echo __('Date'		); ?></th>
			<th><?php echo __('Score A'		); ?></th>
			<th><?php echo __('Score B'		); ?></th>
			<th><?php echo __('URL'			); ?></th>
			<th><?php echo __('Tournament'	); ?></th>
			<th><?php echo __('Round'		); ?></th>
			<th><?php echo __('Timeline'	); ?></th>
			<th><?php echo __('Session'		); ?></th>
		</tr>
		<tr>
			<td><?php echo $video->video_id 	?></td>
			<td><?php echo $video->video_slug 	?></td>
			<td><?php echo $video->video_title 	?></td>
			<td>
				<?php 
					echo date(
						"d-m-Y", 
						strtotime(
							$video->video_date
						)
					); 
				?>
			</td>
			<td><?php echo $video->video_scoreA	?></td>
			<td><?php echo $video->video_scoreB ?></td>
			<td><?php echo $video->video_url 	?></td>
			<td>
				<?php 
					echo $this->Html->link(
						$video->tournament->tournament_name, 
							[
								'controller' 	=> 'tournaments', 
								'action' 		=> 'adminView', 
								$video->tournament->tournament_id
							]
						)
					; 
				?>
			</td>
			<td>
				<?php 
					echo $this->Html->link(
						$video->round->round_name, 
							[
								'controller' 	=> 'rounds', 
								'action' 		=> 'adminView', 
								$video->round->round_id
							]
						)
					;
				?>
			</td>
			<td>
				<?php 
					echo $this->Html->link(
						$video->timeline->timeline_title, 
							[
								'controller' 	=> 'timelines', 
								'action' 		=> 'adminView', 
								$video->timeline->timeline_id
							]
						)
					;
				?>
			</td>
			<td>
				<?php 
					echo $this->Html->link(
						$video->session->session_title, 
							[
								'controller' 	=> 'sessions', 
								'action' 		=> 'adminView', 
								$video->session->session_id
							]
						)
					;
				?>
			</td>
		</tr>
	</table>
</div>
<div class="related">
	<h3><?php echo __('Related Players'); ?></h3>
	<?php if (!empty($video->players)): ?>
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
			<?php foreach ($video->players as $player): ?>
				<tr>
					<td>
						<?php 
							echo $this->Html->link(
								$player->player_id, 
									[
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
		echo '<div class="row"><div class="col-md-12 noPadding"><div class="box text-center coming"><p>No players yet.</p></div></div></div>';
	?>
	<?php endif; ?>
	<h3><?php echo __('Related Comments'); ?></h3>
	<?php if (!empty($video->comments)): ?>
	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<tr>
				<th><?php echo __('Id'		); ?></th>
				<th><?php echo __('Body'	); ?></th>
				<th><?php echo __('Created'	); ?></th>
			</tr>
			<?php foreach ($video->comments as $comment): ?>
				<tr>
					<td>
						<?php 
							echo $this->Html->link(
								$comment->comment_id, 
									[
										'controller' => 'comments', 
										'action' => 'adminView', 
										$comment->comment_id
									]
								)
							; 
						?>
					</td>
					<td><?php echo $comment->comment_body; ?></td>
					<td>
						<?php 
							echo date(
								"d-m-Y H:i:s", 
								strtotime(
									$comment->created
									)
								)
							; 
						?>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<?php else: 
		echo '<div class="row"><div class="col-md-12 noPadding"><div class="box text-center coming"><p>No comments yet.</p></div></div></div>';
	?>
	<?php endif; ?>
</div>