<?php $this->start('meta'); ?>
	<title>Snookview - <?php echo h($player['Player']['player_firstname'] . ' ' . $player['Player']['player_surname']); ?></title>
	<!-- META FACEBOOK SHARE-->
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php echo $player['Player']['player_firstname'] . ' ' . $player['Player']['player_surname']; ?>" />
	<meta property="og:site_name" content="Snookview."/>
	<meta property="og:url" content="http://www.snookview.be/players/view/<?php echo $player['Player']['player_id'] ?>" />
	<meta property="og:description" content="<?php echo 'Date of Birth: ' . $player['Player']['player_birthDate'] . ';' . 'Turned pro: ' . $player['Player']['player_turnedPro'] . ';' . 'Nickname: ' . $player['Player']['player_nickname'] ?>" />
	<meta property="og:image" content="<?php echo 'http://www.snookview.be/img' . $player['Player']['player_image'] ?>" />

	<!-- META TWITTER SHARE-->
	<meta name="twitter:card" content="photo"/>
	<meta name="twitter:title" content="<?php echo $player['Player']['player_firstname'] . ' ' . $player['Player']['player_surname']; ?>"/>
	<meta name="twitter:description" content="<?php echo 'Date of Birth: ' . $player['Player']['player_birthDate'] . ';' . 'Turned pro: ' . $player['Player']['player_turnedPro'] . ';' . 'Nickname: ' . $player['Player']['player_nickname'] ?>"/>
	<meta name="twitter:image" content="<?php echo 'http://www.snookview.be/img' . $player['Player']['player_image'] ?>" />
	<meta name="twitter:site" content="Snookview."/>
	<meta name="twitter:player" content="http://www.snookview.be/players/view/<?php echo $player['Player']['player_id'] ?>"/>
<?php $this->end(); ?>
<div class="row padding-top player">
	<h3><?php echo h($player['Player']['player_firstname'] . ' ' . $player['Player']['player_surname']); ?></h3>
	<div class="col-md-1"></div>
	<div class="col-md-4 noPaddingTablet noPaddingMobile">
		<?php if(!empty($player['Player']['player_image'])): {
			echo $this->Html->image($player['Player']['player_image'], array('class' => 'img-responsive img-center padding-bottom', 'alt' => $player['Player']['player_firstname'] . ' ' . $player['Player']['player_surname']));
		}  ?>
		<?php else: {
			echo $this->Html->image('/img/players/Profile.jpg', array('class' => 'img-responsive img-center padding-bottom', 'alt' => $player['Player']['player_firstname'] . ' ' . $player['Player']['player_surname']));
		} ?>
		<?php endif; ?>
		<p class="source"><?php if($player['Player']['player_imageSrc']) echo $this->Html->link('Image src', $player['Player']['player_imageSrc'], array('target' => '_blank')); ?></p>
	</div>
	<div class="col-md-6 noPaddingTablet noPaddingMobile">
		<ul class="curriculum">
			<li>Date of Birth : <?php echo h(date("d-m-Y", strtotime($player['Player']['player_birthDate']))); ?></li>
			<li>Nationality : <?php echo h($player['Player']['player_nationality']); ?></li>
			<li>Turned Pro : <?php echo h($player['Player']['player_turnedPro']); ?></li>
			<li>Highest Break : <?php echo h($player['Player']['player_highestBreak']); ?></li>
			<li>Century Breaks : <?php echo h($player['Player']['player_centuryBreaks']); ?></li>
			<li>Highest Ranking : <?php echo h($player['Player']['player_highestRanking']); ?></li>
			<li>Career Winnings : <?php echo h($player['Player']['player_careerWinnings']); ?></li>
			<li>Nickname : <?php echo h($player['Player']['player_nickname']); ?></li>
			<li>World Champion : <?php echo h($player['Player']['player_worldChampion']); ?></li>
		</ul>
		<ul class="social">
			<li class="socialFacebook"><?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'id' => 'sharer')); ?></li>
			<li class="socialTwitter">
				<a href="https://twitter.com/share" class="" data-lang="en" target="_blank">
					<?php echo $this->Html->image('assets/twitter.png', array('class' => 'socialimg twitter-share-button')); ?>
				</a>
			</li>
		</ul>
	</div>
	<div class="col-md-1"></div>
</div>
<div class="row">
	<h3>Matches</h3>
	<?php if(!empty($videos)): ?>
		<div class="col-md-1"></div>
		<div class="col-md-10 noPadding">
			<div class="row">
				<?php foreach ($videos as $video): ?>
					<div class="col-md-3">
						<div class="box text-center">
							<a href='/videos/<?php echo $video['Video']['video_slug']; ?>'>
								<ul class="video_player">
									<?php foreach ($video['Player'] as $player): ?>
										<li><?php if($player['player_id'] != $thisplayer) echo $player['player_firstname'] . ' ' . $player['player_surname']; ?></li>
										<li><?php if($player['player_image'] && $player['player_id'] != $thisplayer) echo $this->Html->image($player['player_image'], array('class' => 'img-responsive thumbMiddle', 'alt' => $player['player_firstname'] . ' ' . $player['player_surname'])); ?></li>
									<?php endforeach; ?>
								</ul>
							</a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	<?php else:
		echo '<div class="col-md-1"></div><div class="col-md-10 noPaddingTablet noPaddingMobile"><div class="box text-center coming">No matches at this moment!</div></div><div class="col-md-1"></div>';
	 ?>
	<?php endif; ?>
	<div class="col-md-1"></div>
</div>
<script>
	document.getElementById('sharer').onclick = function () {
	  var url = 'https://www.facebook.com/sharer/sharer.php?u=';
	  url += encodeURIComponent(location.href);
	  window.open(url, 'fbshare', 'width=640,height=320');
	};
</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
</script>