<?php $this->start('meta'); ?>
	<title>Snookview - View Player</title>
<?php $this->end(); ?>
<?php 
	echo $this->element('viewActions', array(
		"list" 		=> ' List Players',
		"edit" 		=> ' Edit Player',
		"delete" 	=> ' Delete Player',
		"id" 		=> $player->player_id,
		"display" 	=> $player->player_firstname . ' ' . $player->player_surname
	)); 
?>
<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Id'				); ?></th>
			<th><?php echo __('Slug'			); ?></th>
			<th><?php echo __('Firstname'		); ?></th>
			<th><?php echo __('Surname'			); ?></th>
			<th><?php echo __('BirthDate'		); ?></th>
			<th><?php echo __('TurnedPro'		); ?></th>
			<th><?php echo __('Nickname'		); ?></th>
			<th><?php echo __('Nationality'		); ?></th>
			<th><?php echo __('Flag'			); ?></th>
			<th><?php echo __('Highest Break'	); ?></th>
			<th><?php echo __('Highest Ranking'	); ?></th>
			<th><?php echo __('CenturyBreaks'	); ?></th>
			<th><?php echo __('CareerWinnings'	); ?></th>
			<th><?php echo __('WorldChampion'	); ?></th>
			<th><?php echo __('Image'			); ?></th>
			<th><?php echo __('Image src'		); ?></th>
			<th><?php echo __('Category'		); ?></th>
		</tr>
		<tr>
			<td><?php echo $player->player_id 				?></td>
			<td><?php echo $player->player_slug 			?></td>
			<td><?php echo $player->player_firstname 		?></td>
			<td><?php echo $player->player_surname 			?></td>
			<td>
				<?php 
					echo date(
						"d-m-Y", 
						strtotime(
							$player->player_birthDate
						)
					); 
				?>
			</td>
			<td><?php echo $player->player_turnedPro 		?></td>
			<td><?php echo $player->player_nickname 		?></td>
			<td><?php echo $player->player_nationality 		?></td>
			<td>
				<?php 
					if($player->player_flag) 
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
			<td><?php echo $player->player_centuryBreaks 	?></td>
			<td><?php echo $player->player_careerWinnings 	?></td>
			<td><?php echo $player->player_worldChampion 	?></td>
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
			<td>
				<?php 
					echo $this->Html->link(
						$player->player_imageSrc, 
						$player->player_imageSrc, [
							'target'=>'_blank'
							]
						)
					;
				?>
			</td>
			<td><?php echo $player->player_category 		?></td>
		</tr>
	</table>
</div>
<div class="related">
	<h3><?php echo __('Related Videos'); ?></h3>
	<?php if(!empty($player->videos)): ?>
	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<tr>
				<th><?php echo __('Id'			); ?></th>
				<th><?php echo __('Title'		); ?></th>
				<th><?php echo __('Date'		); ?></th>
				<th><?php echo __('ScoreA'		); ?></th>
				<th><?php echo __('ScoreB'		); ?></th>
				<th><?php echo __('URL'			); ?></th>
				<th><?php echo __('Session'		); ?></th>
				<th><?php echo __('Tournament'	); ?></th>
			</tr>
			<?php foreach ($player->videos as $video): ?>
				<?php 
					$myString = $video['video_url'];
					$myArray = explode(',', $myString);
				?>
				<tr>
					<td>
						<?php 
							echo $this->Html->link(
								$video->video_id, [
									'controller' => 'videos', 
									'action' => 'adminView', 
									$video->video_id
									]
								)
							; 
						?>
					</td>
					<td><?php echo $video->video_title 			?></td>
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
					<td><?php echo $video->video_scoreA 		?></td>
					<td><?php echo $video->video_scoreB 		?></td>
					<td>
						<a href="<?php echo "https://vimeo.com/" . $video->video_url ?>" target="_blank">
							<!-- <img src="<?php //echo "https://vimeo.com/" . $video->video_url . "/default.jpg" ?>" alt="$video->video_title"> -->
							<?php echo $video->video_url 		?>
						</a>
					</td>
					<td>
						<?php
							echo $this->Html->link(
								$video->session->session_title, [
									'controller' => 'sessions', 
									'action' => 'adminView', 
									$video->session->session_id
									]
								)
							;
						?>
					</td>
					<td>
						<?php
							echo $this->Html->link(
								$video->tournament->tournament_name . ' ' . $video->tournament->tournament_year, [
									'controller' => 'tournaments', 
									'action' => 'adminView', 
									$video->tournament->tournament_id
									]
								)
							;
						?>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<?php else: 
		echo '<div class="row"><div class="col-md-12 noPadding"><div class="box text-center coming"><p>No videos yet.</p></div></div></div>';
	?>
	<?php endif; ?>
</div>
