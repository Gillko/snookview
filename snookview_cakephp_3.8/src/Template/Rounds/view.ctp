<?php $this->start('meta'); ?>
	<?php foreach ($rounds as $round): ?>
		<title>Snookview - <?php echo $round->tournament['tournament_name'] . ' ' . $round->tournament['tournament_year'] . ' - ' . $round['round_name']; ?></title>
	<?php endforeach; ?>
<?php $this->end(); ?>
<div class="row padding-top">
	<div class="col-md-1">
	</div>

	<div class="col-md-10 noPadding noPaddingMobile noPaddingTablet tournaments view">
		<?php foreach ($rounds as $round): ?>
			<h3><?php echo h($round->tournament['tournament_name'] . ' ' . $round->tournament['tournament_year'] . ' - ' . $round['round_name']); ?></h3>
		<?php endforeach; ?>
		<div class="row">
			<?php if(!empty($videos)): ?>
				<?php foreach ($videos as $video): ?>
					<div class="col-md-3 noPaddingMobile noPaddingTablet">
						<div class="box text-center">
							<a href="../../videos/<?php echo $video->video_id; ?>/<?php echo $video->video_slug; ?>">
							<!-- <a href='/videos/view/<?php //echo $video['video_id']; ?>'> -->
								<?php foreach ($video->players as $player): ?>
									<?php if($player['player_image']) echo $this->Html->image($player['player_image'], array('class' => 'img-responsive thumbMiddle', 'alt' => $player['player_firstname'] . ' ' . $player['player_surname'])); ?>
								<?php endforeach; ?>
								<ul class=" videos">
									<?php foreach ($video->players as $player): ?>
										<li><?php echo $player['player_firstname'] . ' ' . $player['player_surname']; ?></li>
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
		

			<?php //$countVideos = count($round->tournament->videos); ?>

			<?php //if($countVideos != null): ?>
				<?php //for($index = 0; $index < $countVideos; $index++) { ?>
					<!-- <div class="col-md-3 noPaddingMobile noPaddingTablet">
						<div class="box text-center">
							<a href='/videos/<?php //echo $round->tournament->videos[$index]['video_slug']; ?>'>
								<?php //foreach ($round->tournament->videos[$index]->players as $player): ?>
									<?php //if($player['player_image']) echo $this->Html->image($player['player_image'], array('class' => 'img-responsive thumbMiddle', 'alt' => $player['player_firstname'] . ' ' . $player['player_surname'])); ?>
								<?php //endforeach; ?>
								<ul class=" videos">
									<?php //foreach ($round->tournament->videos[$index]->players as $player): ?>
										<li><?php //echo $player['player_firstname'] . ' ' . $player['player_surname']; ?></li>
									<?php //endforeach; ?>
								</ul>
							</a>
						</div>
					</div> -->
			<?php //} ?>
			<?php //else: echo '<div class="box text-center coming">coming soon</div>'; ?>
			<?php //endif; ?>
		</div>
	</div>
	<div class="col-md-1">
	</div>
</div>