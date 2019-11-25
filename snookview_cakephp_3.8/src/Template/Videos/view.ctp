<?php
	header('Set-Cookie: cross-site-cookie=name; SameSite=None; Secure');
?>
<?php 
	$myString = $video['video_url'];
	$myArray = explode(',', $myString);
?>
<?php $this->start('meta'); ?>
	<title>Snookview - <?php echo $video->tournament['tournament_name'] . ' ' . $video->tournament['tournament_year'] . ' ' . $video['video_title']; ?></title>
	<!-- META FACEBOOK SHARE-->
	<meta property="og:title" content="<?php echo $video['video_title']; ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://www.snookview.be/videos/<?php echo $video['video_slug']; ?>" />
	<meta property="og:description" content="<?php echo $video->tournament['tournament_name'] . ' ' . $video->tournament['tournament_year'] . ' ' . $video->round['round_name'] . ' ' . date("d-m-Y", strtotime($video['video_date']))?>" />
	<meta property="og:image" content="<?php echo 'http://img.youtube.com/vi/' . $myArray[0] . '/maxresdefault.jpg'; ?>" />
	<meta property="og:image:type" content="image/jpeg" />
	<!-- META TWITTER SHARE-->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@snookview"/>
	<meta name="twitter:title" content="<?php echo $video['video_title']; ?>"/>
	<meta name="twitter:description" content="<?php echo $video->tournament['tournament_name'] . ' ' . $video->tournament['tournament_year'] . ' ' . $video->round['round_name'] . ' ' . date("d-m-Y", strtotime($video['video_date']))?>"/>
	<meta name="twitter:image" content="<?php echo 'http://img.youtube.com/vi/' . $myArray[0] . '/0.jpg'; ?>" />
<?php $this->end(); ?>

<div class="row padding-top">
	<div class="col-md-1"></div>
	<div class="col-md-10 noPaddingMobile noPaddingTablet">
		<h3><?php echo $video->tournament['tournament_name'] . ' ' . $video->tournament['tournament_year'] . '<br/>' . $video->round['round_name'] . '<br/>' . $video['video_title'] . '<br/>' ?><?php if(($video->session['session_title']) != 'Part One'): echo $video->session['session_title'];?><?php endif; ?></h3>
		<div class="video-container">
			<iframe id="video-vimeo" src="https://player.vimeo.com/video/<?php echo $video['video_url'] ?>" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
		</div>
		<div class="matchinformation">
			<ul>
				<li>
					<?php echo $video->tournament['tournament_name'] . ' ' . $video->tournament['tournament_year']; ?>
				</li>
				<li>
					<?php echo $video['video_title']; ?>
				</li>
				<li>
					<?php echo $video->round['round_name']; ?>
				</li>
				<li>
					<?php echo h(date("d-m-Y", strtotime($video['video_date']))); ?>
				</li>
			</ul>
			<div class="matchinformationScorePlayers">
				<div class="score text-center">
						<p><?php echo h($video['video_scoreA']); ?></p>
				</div>
				<?php foreach ($video->players as $player): ?>
					<div class="player text-center">
						<p>
							<a href="<?php WWW_ROOT ?>/players/<?php echo $player->player_id; ?>/<?php echo $player->player_slug; ?>">
								<?php echo $player['player_firstname'] . ' ' . $player['player_surname']; ?>
							</a>
						</p>
					</div>
				<?php endforeach; ?>
				<div class="score text-center">
					<p><?php echo h($video['video_scoreB']); ?></p>
				</div>
			</div>
		</div>
		<ul class="social">
			<li class="socialFacebook">
				<a href="http://www.facebook.com/sharer.php?u=http://www.snookview.be/videos/<?php echo $video['video_slug']; ?>" class="" data-lang="en" target="_blank">
					<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
				</a>
			</li>
			<li class="socialTwitter">
				<a href="https://twitter.com/share" class="" data-lang="en" target="_blank">
					<?php echo $this->Html->image('assets/twitter.png', array('class' => 'socialimg twitter-share-button', 'alt' => 'https://twitter.com/snookview')); ?>
				</a>
			</li>
		</ul>
		<?php echo $this->Form->create('Favorite'); ?>
		<?php echo $this->Form->end(array('class' => 'favorite-bg', 'name' => 'favorite', 'label' => '')); ?>
		<div class="timeline">
			<?php 
				$myString = $video['video_url'];
				$myArray = explode(',', $myString);
			?>
			<h3><?php echo 'Timeline' ?></h3>
			<?php foreach ($items as $index => $item): ?>
				<?php if(!empty($item->timeline->items)): ?>
					<?php  
						$countItems = count($item->timeline->items);

						for ($index = 0; $index < $countItems; $index++) { 
					?>
						<script src="https://player.vimeo.com/api/player.js"></script>

						<script>
							function reply_click(clicked_id){
								var timelineItem = clicked_id;
								//console.log(clicked_id);
								$('html, body').animate({ scrollTop: 250 }, 'fast');
								var iframe = document.getElementById('video-vimeo');
								var player = new Vimeo.Player(iframe);
								player.pause().then(function() {
									player.setCurrentTime(clicked_id);
								});
								player.play();
							}
						</script>
						<div class="item">
							<ul>
								<li onClick="reply_click(this.id)" class="item-description <?php echo h($item->timeline->items[$index]['item_part']); ?>" data-seek="<?php echo h($item->timeline->items[$index]['item_point_start']); ?>" id="<?php echo $item->timeline->items[$index]['item_point_start'] ?>"><?php echo h($item->timeline->items[$index]['item_description']); ?></li>
							</ul>
						</div>
					<?php } ?>
				<?php else: 
					echo '<div class="row"><div class="col-md-12 noPadding"><div class="box text-center coming"><p>No timeline items have yet been added!</p></div></div></div>';
				?>
				<?php endif ?>
			<?php endforeach; ?>
		</div>
		<div class="comments-container">
			<h4><?php echo __('All Comments'); ?></h4>
				<?php echo $this->Form->create('Comment', array(
					'inputDefaults' => array(
					'div' => 'form-group',
					'wrapInput' => false,
					'class' => 'form-control'
					),
				)); ?>
				<fieldset>
					<div class="form-group">
						<?php
							echo $this->Form->textarea('comment_body', array(
								'label' => '',
								'placeholder' => 'Share your thoughts',
								'class' => 'form-control'
							));
						?>
					</div>
					<div class="form-group">
						<?php
							echo $this->Form->control('created', array(
								'label' => 'Created',
								'type' => 'hidden'
							));
						?>
					</div>
					<div class="submit">
						<?php
							echo $this->Form->button(__('Comment'),['class'=> 'btn btn-default btn-success btn-lg']);
						?>
					</div>

					<?php
						echo $this->Form->end();
					?>
				</fieldset>
			<div class="comments">
				<?php foreach ($comments as $comment): ?>
					<?php if($comment['User']['user_id'] == $current_user['user_id']): ?>
						<div class="comment">
							<?php if(!empty($comment['User']['user_image'])):{
								echo $this->Html->image(h($comment['User']['user_image']), array('class' => 'thumb'));
							}
							else:{
								echo $this->Html->image('/img/users/profile.jpg', array('class' => 'thumb'));
							 }
							endif; ?>
							<ul>
								<li><?php echo $comment['User']['user_username']; ?></li>
								<li><?php echo h(date("d-m-Y H:i:s", strtotime($comment['Comment']['created']))); ?></li>
								<li><?php echo $comment['Comment']['comment_body']; ?>
								<?php echo $this->Form->postLink(
								   $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove')). "",
										array('controller' => 'comments', 'action' => 'delete', $comment['Comment']['comment_id']),
										array('escape'=>false),
									__('Are you sure you want to delete %s?', $comment['Comment']['comment_body']),
								   array('class' => 'btn btn-mini')
								); ?>
								<?php echo $this->Html->link(
									$this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-edit')) . "",
									array('controller' => 'comments', 'action' => 'edit', $comment['Comment']['comment_id']),
									array('class' => '', 'escape' => false)
								); ?></li>	
							</ul>
						</div>
					<?php else: ?>
						<div class="comment">
							<?php echo $this->Html->image($comment['User']['user_image'], array('class' => 'thumb')); ?>
							<p><?php echo $comment['User']['user_username']; ?></p>
							<p><?php echo h(date("d-m-Y H:i:s", strtotime($comment['Comment']['created']))); ?></p>
							<p><?php echo $comment['Comment']['comment_body']; ?></p>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
	<script>
		!function(d,s,id){
			var js,fjs=d.getElementsByTagName(s)[0];
			if(!d.getElementById(id)){
				js=d.createElement(s);
				js.id=id;js.src="https://platform.twitter.com/widgets.js";
				fjs.parentNode.insertBefore(js,fjs);
			}}(document,"script","twitter-wjs");
	</script>
	<div id="fb-root"></div>
</div>