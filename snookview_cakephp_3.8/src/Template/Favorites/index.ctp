<?php $this->start('meta'); ?>
	<title>Snookview - Favorites</title>
<?php $this->end(); ?>
<div class="row padding-top">
	<div class="col-md-1">
	</div>
	<div class="col-md-10 favorites noPaddingTablet noPaddingMobile">
		<h3>My Favorite Videos</h3>
		<div class="row">
			<?php foreach ($videos as $video): ?>
				<div class="col-md-3 noPaddingTablet noPaddingMobile">
					<div class="box text-center">
						<a href='/videos/<?php echo $video['Video']['video_slug']; ?>'>
							<?php foreach ($video['Player'] as $player): ?>
								<?php if($player['player_image']) echo $this->Html->image($player['player_image'], array('class' => 'img-responsive thumbMiddle')); ?>
							<?php endforeach; ?>
							<ul class="videos">
								<?php foreach ($video['Player'] as $player): ?>
									<li><?php echo $player['player_firstname'] . ' ' . $player['player_surname']; ?></li>
								<?php endforeach; ?>
							</ul>
						</a>
						<div class="text-right">
							<?php foreach ($video['Favorite'] as $favorite): ?>
								<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $favorite['favorite_id']), null, __('Are you sure you want to delete %s?', $video['Video']['video_title'])); ?>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="col-md-1">
	</div>
</div>