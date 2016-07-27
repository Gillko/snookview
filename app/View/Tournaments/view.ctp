<?php $this->start('meta'); ?>
	<title>Snookview - <?php echo $tournament['Tournament']['tournament_name'] . ' ' . $tournament['Tournament']['tournament_year']; ?></title>
<?php $this->end(); ?>
<div class="row padding-top">
	<div class="col-md-1">
	</div>
	<div class="col-md-10 noPadding noPaddingMobile noPaddingTablet tournaments view">
		<h3><?php echo $tournament['Tournament']['tournament_name'] . ' ' . $tournament['Tournament']['tournament_year'] . ' - All Matches'; ?></h3>
		<div class="row">
			<div class="col-md-3 noPaddingMobile noPaddingTablet">
				<h2>Final</h2>
				<?php if(!empty($videosFinal)): ?>
					<?php foreach ($videosFinal as $video): ?>
						<div class="box text-center">
							<a href='/videos/<?php echo $video['Video']['video_slug']; ?>'>
								<?php if($tournament['Tournament']['tournament_winner']) echo $this->Html->image($tournament['Tournament']['tournament_winner'], array('class' => 'img-responsive noPadding', 'alt' => $tournament['Tournament']['tournament_name'] . ' ' . $tournament['Tournament']['tournament_year'])); ?>
								<ul class="videos final">
									<?php foreach ($video['Player'] as $player): ?>
										<li><?php echo $player['player_firstname'] . ' ' . $player['player_surname']; ?></li>
									<?php endforeach; ?>
								</ul>
							</a>
						</div>
					<?php endforeach; ?>
					<?php else:
						echo '<div class="box text-center coming">coming soon</div>';
					 ?>
				<?php endif; ?>
			</div>
			<div class="col-md-3 noPaddingMobile noPaddingTablet">
				<h2>Semi Finals</h2>
				<?php if(!empty($videosSemi)): ?>
					<?php foreach ($videosSemi as $video): ?>
						<div class="box text-center">
							<a href='/videos/<?php echo $video['Video']['video_slug']; ?>'>
								<div class="row">
									<?php foreach ($video['Player'] as $player): ?>
									<div class="col-md-6">
										<?php if($player['player_image']) echo $this->Html->image($player['player_image'], array('class' => 'img-responsive thumbMiddleLargeScreen', 'alt' => $player['player_firstname'] . ' ' . $player['player_surname'])); ?>
									</div>
									<?php endforeach; ?>
								</div>
								<ul class="videos semi-finals">
									<?php foreach ($video['Player'] as $player): ?>
										<li><?php echo $player['player_firstname'] . ' ' . $player['player_surname']; ?></li>
									<?php endforeach; ?>
								</ul>
							</a>
						</div>
					<?php endforeach; ?>
					<?php else:
						echo '<div class="box text-center coming">coming soon</div>';
					 ?>
				<?php endif; ?>
			</div>
			<div class="col-md-3 noPaddingMobile noPaddingTablet">
				<h2>Quarter Finals</h2>
				<?php if(!empty($videosQuarter)): ?>
				<?php foreach($videosQuarter as $video): ?>
					<div class="box text-center">
						<a href='/videos/<?php echo $video['Video']['video_slug']; ?>'>
							<ul class="videos quarter-finals">
								<?php foreach ($video['Player'] as $player): ?>
									<li><?php echo $player['player_firstname'] . ' ' . $player['player_surname']; ?></li>
								<?php endforeach; ?>
							</ul>
						</a>
					</div>
				<?php endforeach; ?>
					<?php else:
						echo '<div class="box text-center coming">coming soon</div>';
					 ?>
				<?php endif; ?>
			</div>
			<?php if(empty($videosLast16)): ?>
				<?php if(empty($videosSecondRound)): ?>
					<div class="col-md-3 noPaddingMobile noPaddingTablet">
						<h2>First Round</h2>
						<?php if(!empty($videosFirstRound)): ?>
						<?php foreach ($videosFirstRound as $video): ?>
							<div class="box text-center">
								<a href='/videos/<?php echo $video['Video']['video_slug']; ?>'>
									<ul class=" videos first-round oneline">
										<?php foreach ($video['Player'] as $player): ?>
											<li><?php echo $player['player_surname']; ?></li>
										<?php endforeach; ?>
									</ul>
								</a>
							</div>
						<?php endforeach; ?>
							<?php else:
								echo '<div class="box text-center coming">coming soon</div>';
							 ?>
						<?php endif; ?>
					</div>
				<?php elseif(!is_null($videosSecondRound) && isset($videosSecondRound) && !empty($videosSecondRound)): ?>
					<div class="col-md-3 noPaddingMobile noPaddingTablet">
						<h2>Second Round</h2>
						<?php if(!empty($videosSecondRound)): ?>
							<?php foreach ($videosSecondRound as $video): ?>
								<div class="box text-center">
									<a href='/videos/<?php echo $video['Video']['video_slug']; ?>'>
										<ul class=" videos first-round oneline">
											<?php foreach ($video['Player'] as $player): ?>
												<li><?php echo $player['player_surname']; ?></li>
											<?php endforeach; ?>
										</ul>
									</a>
								</div>
							<?php endforeach; ?>
							<?php else:
								echo '<div class="box text-center coming">coming soon</div>';
							 ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>

			<?php elseif(!is_null($videosLast16) && isset($videosLast16) && !empty($videosLast16)): ?>
				<div class="col-md-3 noPaddingMobile noPaddingTablet">
					<h2>Last 16</h2>
					<?php if(!empty($videosLast16)): ?>
						<?php foreach ($videosLast16 as $video): ?>
							<div class="box text-center">
								<a href='/videos/<?php echo $video['Video']['video_slug']; ?>'>
									<ul class=" videos first-round oneline">
										<?php foreach ($video['Player'] as $player): ?>
											<li><?php echo $player['player_surname']; ?></li>
										<?php endforeach; ?>
									</ul>
								</a>
							</div>
						<?php endforeach; ?>
						<?php else:
							echo '<div class="box text-center coming">coming soon</div>';
						 ?>
					<?php endif; ?>
				</div>

			<?php endif; ?>
		</div>
		<div class="row">
			<?php if(!is_null($videosThirdRound) && isset($videosThirdRound) && !empty($videosThirdRound)): ?>
				<div class="col-md-12 noPaddingMobile noPaddingTablet">
					<h2>Third Round</h2>
				</div>
				<?php if(!empty($videosThirdRound)): ?>
					<?php foreach ($videosThirdRound as $video): ?>
						<div class="col-md-3 noPaddingMobile noPaddingTablet">
							<div class="box text-center">
								<a href='/videos/<?php echo $video['Video']['video_slug']; ?>'>
									<ul class=" videos first-round oneline">
										<?php foreach ($video['Player'] as $player): ?>
											<li><?php echo $player['player_surname']; ?></li>
										<?php endforeach; ?>
									</ul>
								</a>
							</div>
						</div>
					<?php endforeach; ?>
				<?php else:
					echo '<div class="box text-center coming">coming soon</div>';
				 ?>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<div class="row">
			<?php if(!is_null($videosThirdRound) && isset($videosThirdRound) && !empty($videosThirdRound)): ?>
				<div class="col-md-12 noPaddingMobile noPaddingTablet">
					<h2>Second Round</h2>
				</div>
				<?php if(!empty($videosSecondRound)): ?>
					<?php foreach ($videosSecondRound as $video): ?>
						<div class="col-md-3 noPaddingMobile noPaddingTablet">
							<div class="box text-center">
								<a href='/videos/<?php echo $video['Video']['video_slug']; ?>'>
									<ul class=" videos first-round oneline">
										<?php foreach ($video['Player'] as $player): ?>
											<li><?php echo $player['player_surname']; ?></li>
										<?php endforeach; ?>
									</ul>
								</a>
							</div>
						</div>
					<?php endforeach; ?>
				<?php else:
					echo '<div class="col-md-12 noPaddingMobile noPaddingTablet"><div class="box text-center coming">coming soon</div></div>';
				 ?>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<div class="row">
			<?php if(!is_null($videosSecondRound) && isset($videosSecondRound) && !empty($videosSecondRound)): ?>
				<div class="col-md-12 noPaddingMobile noPaddingTablet">
					<h2>First Round</h2>
				</div>
				<?php if(!empty($videosFirstRound)): ?>
					<?php foreach ($videosFirstRound as $video): ?>
						<div class="col-md-3 noPaddingMobile noPaddingTablet">
							<div class="box text-center">
								<a href='/videos/<?php echo $video['Video']['video_slug']; ?>'>
									<ul class=" videos first-round oneline">
										<?php foreach ($video['Player'] as $player): ?>
											<li><?php echo $player['player_surname']; ?></li>
										<?php endforeach; ?>
									</ul>
								</a>
							</div>
						</div>
					<?php endforeach; ?>
				<?php else:
					echo '<div class="col-md-12 noPaddingMobile noPaddingTablet"><div class="box text-center coming">coming soon</div></div>';
				 ?>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<div class="row">
			<div class="col-md-12 noPaddingMobile noPaddingTablet">
				<h2>Highlights</h2>
			</div>
			<?php if(!empty($videosHighlights)): ?>
			<?php foreach($videosHighlights as $video): ?>
				<div class="col-md-3 noPaddingMobile noPaddingTablet">
					<div class="box text-center">
						<a href='/videos/<?php echo $video['Video']['video_slug']; ?>'>
							<ul class="videos quarter-finals">
								<?php foreach ($video['Player'] as $player): ?>
									<li><?php echo $player['player_firstname'] . ' ' . $player['player_surname']; ?></li>
								<?php endforeach; ?>
							</ul>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
				<?php else:
					echo '<div class="col-md-12 noPaddingMobile noPaddingTablet"><div class="box text-center coming">coming soon</div></div>';
				 ?>
			<?php endif; ?>
		</div>
		<div class="row">
			<div class="col-md-12 noPaddingMobile noPaddingTablet">
				<h2>Snooker Extra</h2>
			</div>
			<?php if(!empty($videosExtra)): ?>
			<?php foreach($videosExtra as $video): ?>
				<div class="col-md-3 noPaddingMobile noPaddingTablet">
					<div class="box text-center">
						<a href='/videos/<?php echo $video['Video']['video_slug']; ?>'>
							<ul class="videos quarter-finals">
								<?php foreach ($video['Player'] as $player): ?>
									<li><?php echo $player['player_firstname'] . ' ' . $player['player_surname']; ?></li>
								<?php endforeach; ?>
							</ul>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
				<?php else:
					echo '<div class="col-md-12 noPaddingMobile noPaddingTablet"><div class="box text-center coming">coming soon</div></div>';
				 ?>
			<?php endif; ?>
		</div>
	</div>
	<div class="col-md-1">
	</div>
</div>