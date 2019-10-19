<?php $this->start('meta'); ?>
	<title>Snookview - <?php echo $round['Tournament']['tournament_name'] . ' ' . $round['Tournament']['tournament_year'] . ' - ' . $round['Round']['round_name']; ?></title>
<?php $this->end(); ?>
<div class="row padding-top">
	<div class="col-md-1">
	</div>
	<div class="col-md-10 noPadding noPaddingMobile noPaddingTablet tournaments view">
		<h3><?php echo h($round['Tournament']['tournament_name'] . ' ' . $round['Tournament']['tournament_year'] . ' - ' . $round['Round']['round_name']); ?></h3>
		<div class="row">
			<?php if(!empty($videos)): ?>
				<?php foreach ($videos as $video): ?>
					<div class="col-md-3 noPaddingMobile noPaddingTablet">
						<div class="box text-center">
							<a href='/videos/<?php echo $video['Video']['video_slug']; ?>'>
								<?php foreach ($video['Player'] as $player): ?>
									<?php if($player['player_image']) echo $this->Html->image($player['player_image'], array('class' => 'img-responsive thumbMiddle', 'alt' => $player['player_firstname'] . ' ' . $player['player_surname'])); ?>
								<?php endforeach; ?>
								<ul class=" videos">
									<?php foreach ($video['Player'] as $player): ?>
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
		</div>
	</div>
	<div class="col-md-1">
	</div>
</div>