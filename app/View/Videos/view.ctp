<?php 
	$myString = $video['Video']['video_url'];
	$myArray = explode(',', $myString);
?>
<?php $this->start('meta'); ?>
	<title>Snookview - <?php echo $video['Tournament']['tournament_name'] . ' ' . $video['Tournament']['tournament_year'] . ' ' . $video['Video']['video_title']; ?></title>
	<!-- META FACEBOOK SHARE-->
	<meta property="og:title" content="<?php echo $video['Video']['video_title']; ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://www.snookview.be/videos/<?php echo $video['Video']['video_slug']; ?>" />
	<meta property="og:description" content="<?php echo $video['Tournament']['tournament_name'] . ' ' . $video['Tournament']['tournament_year'] . ' ' . $video['Round']['round_name'] . ' ' . date("d-m-Y", strtotime($video['Video']['video_date']))?>" />
	<meta property="og:image" content="<?php echo 'http://img.youtube.com/vi/' . $myArray[0] . '/maxresdefault.jpg'; ?>" />
	<meta property="og:image:type" content="image/jpeg" />
	<!-- META TWITTER SHARE-->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@snookview"/>
	<meta name="twitter:title" content="<?php echo $video['Video']['video_title']; ?>"/>
	<meta name="twitter:description" content="<?php echo $video['Tournament']['tournament_name'] . ' ' . $video['Tournament']['tournament_year'] . ' ' . $video['Round']['round_name'] . ' ' . date("d-m-Y", strtotime($video['Video']['video_date']))?>"/>
	<meta name="twitter:image" content="<?php echo 'http://img.youtube.com/vi/' . $myArray[0] . '/0.jpg'; ?>" />
<?php $this->end(); ?>
<div class="row padding-top">
	<div class="col-md-1"></div>
	<div class="col-md-10 noPaddingMobile noPaddingTablet">
		<h3><?php echo $video['Tournament']['tournament_name'] . ' ' . $video['Tournament']['tournament_year'] . '<br/>' . $video['Round']['round_name'] . '<br/>' . $video['Video']['video_title']; ?></h3>
		<div class="video-container">
			<div id="player">
			</div>
		</div>
		<script>
		var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/player_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        var player;
        var video_sort = '<?php echo $video['Video']['video_sort'] ?>';
        console.log(video_sort);
        function onYouTubePlayerAPIReady() {
        	if(video_sort == 'Single'){
        		player = new YT.Player('player', {
        			videoId: '<?php echo $video['Video']['video_url'] ?>'
    		  });
        	}
    		else if(video_sort == 'Playlist'){
    			player = new YT.Player('player', {
    				/*videoId: '<?php //echo $video['Video']['video_url'] ?>',*/
        			playerVars: {
        				listType:'playlist',
            			list: '<?php echo $video['Video']['video_url_playlist'] ?>'
			           /* playlist: '<?php //echo $video['Video']['video_url_part_two'] . ',' . $video['Video']['video_url_part_three'] . ',' . $video['Video']['video_url_part_four'] . ',' . $video['Video']['video_url_part_five'] . ',' . $video['Video']['video_url_part_six'] . ',' . $video['Video']['video_url_part_seven'] . ',' . $video['Video']['video_url_part_eight'] . ',' . $video['Video']['video_url_part_nine'] . ',' . $video['Video']['video_url_part_ten'] ?>'*/
			            			
			        }
		    	});
		    }
        }
        $(function() {
		    $(document).on('click', '#btnSeek', function() {
		    	if(video_sort == 'Single'){
			    	$('html, body').animate({ scrollTop: 250 }, 'fast');
			        player.seekTo($(this).data('seek'), true);
			    } else if(video_sort == 'Playlist'){
			    	if($(this).hasClass('part-one')){
			    		player.playVideoAt(0);
			    	}
			    	if($(this).hasClass('part-two')){
			    		player.playVideoAt(1);
			    	}
			    	if($(this).hasClass('part-three')){
			    		player.playVideoAt(2);
			    	}
			    	if($(this).hasClass('part-four')){
			    		player.playVideoAt(3);
			    	}
			    	if($(this).hasClass('part-five')){
			    		player.playVideoAt(4);
			    	}
			    	if($(this).hasClass('part-six')){
			    		player.playVideoAt(5);
			    	}
			    	if($(this).hasClass('part-seven')){
			    		player.playVideoAt(6);
			    	}
			    	if($(this).hasClass('part-eight')){
			    		player.playVideoAt(7);
			    	}
			    	if($(this).hasClass('part-nine')){
			    		player.playVideoAt(8);
			    	}
			    	if($(this).hasClass('part-ten')){
			    		player.playVideoAt(9);
			    	}
			    	if($(this).hasClass('part-eleven')){
			    		player.playVideoAt(10);
			    	}
			    	if($(this).hasClass('part-twelve')){
			    		player.playVideoAt(11);
			    	}
			    	if($(this).hasClass('part-thirteen')){
			    		player.playVideoAt(12);
			    	}
			    	if($(this).hasClass('part-fourteen')){
			    		player.playVideoAt(13);
			    	}
			    	if($(this).hasClass('part-fifteen')){
			    		player.playVideoAt(14);
			    	}
			    	if($(this).hasClass('part-sixteen')){
			    		player.playVideoAt(15);
			    	}
			    	if($(this).hasClass('part-seventeen')){
			    		player.playVideoAt(16);
			    	}
			    	if($(this).hasClass('part-eighteen')){
			    		player.playVideoAt(17);
			    	}
			    	if($(this).hasClass('part-nineteen')){
			    		player.playVideoAt(18);
			    	}
			    	if($(this).hasClass('part-twenty')){
			    		player.playVideoAt(19);
			    	}
			    	if($(this).hasClass('part-twenty-one')){
			    		player.playVideoAt(20);
			    	}
			    	if($(this).hasClass('part-twenty-two')){
			    		player.playVideoAt(21);
			    	}
			    	if($(this).hasClass('part-twenty-three')){
			    		player.playVideoAt(22);
			    	}
			    	if($(this).hasClass('part-twenty-four')){
			    		player.playVideoAt(23);
			    	}
			    	if($(this).hasClass('part-twenty-five')){
			    		player.playVideoAt(24);
			    	}
			    	if($(this).hasClass('part-twenty-six')){
			    		player.playVideoAt(25);
			    	}
			    	if($(this).hasClass('part-twenty-seven')){
			    		player.playVideoAt(26);
			    	}
			    	if($(this).hasClass('part-twenty-eight')){
			    		player.playVideoAt(27);
			    	}
			    	if($(this).hasClass('part-twenty-nine')){
			    		player.playVideoAt(28);
			    	}
			    	if($(this).hasClass('part-thirty')){
			    		player.playVideoAt(29);
			    	}
			    	$('html, body').animate({ scrollTop: 250 }, 'fast');
			        player.seekTo($(this).data('seek'), true);
			    }
		    });
		});
		</script>
		<div class="matchinformation">
			<ul>
				<li>
					<?php echo $video['Tournament']['tournament_name'] . ' ' . $video['Tournament']['tournament_year']; ?>
				</li>
				<li>
					<?php echo $video['Video']['video_title']; ?>
				</li>
				<li>
					<?php echo $video['Round']['round_name']; ?>
				</li>
				<li>
					<?php echo h(date("d-m-Y", strtotime($video['Video']['video_date']))); ?>
				</li>
			</ul>
			<div class="matchinformationScorePlayers">
				<div class="score text-center">
						<p><?php echo h($video['Video']['video_scoreA']); ?></p>
				</div>
				<?php foreach ($video['Player'] as $player): ?>
					<div class="player text-center">
						<p>
							<?php echo $this->Html->link($player['player_firstname'] . ' ' . $player['player_surname'], array('controller' => 'players', 'action' => 'view', $player['player_id'])); ?>
						</p>
					</div>
				<?php endforeach; ?>
				<div class="score text-center">
					<p><?php echo h($video['Video']['video_scoreB']); ?></p>
				</div>
			</div>
		</div>
		<ul class="social">
			<li class="socialFacebook">
				<a href="http://www.facebook.com/sharer.php?u=http://www.snookview.be/videos/<?php echo $video['Video']['video_slug']; ?>" class="" data-lang="en" target="_blank">
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
				$myString = $video['Video']['video_url'];
				$myArray = explode(',', $myString);
			?>
			<?php if(!empty($items)): ?>
				<h3><?php echo 'Timeline' ?></h3>
				<?php foreach ($items as $key=>$item): ?>
		        	<div class="item">
		        		<ul>
		                	<li class="item-description <?php echo $item['Item']['item_part']; ?>" id="btnSeek" data-seek="<?php echo $item['Item']['item_point_start']; ?>"><?php echo $item['Item']['item_description']; ?></li>
							<li class="item-share">
								<?php if($video['Video']['video_sort'] == 'Single'){ ?>
									<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $video['Video']['video_url'] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
										<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
									</a>
								<?php } elseif($video['Video']['video_sort'] == 'Playlist'){ ?>
									<?php if($item['Item']['item_part'] == 'part-one'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[0] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-two'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[1] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-three'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[2] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-four'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[3] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-five'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[4] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-six'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[5] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-seven'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[6] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-eight'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[7] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-nine'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[8] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-ten'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[9] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-eleven'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[10] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-twelve'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[11] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-thirteen'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[12] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-fourteen'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[13] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-fifteen'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[14] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-sixteen'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[15] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-seventeen'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[16] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-eighteen'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[17] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-nineteen'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[18] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-twenty'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[19] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-twenty-one'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[20] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-twenty-two'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[21] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-twenty-three'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[22] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-twenty-four'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[23] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-twenty-five'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[24] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-twenty-six'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[25] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-twenty-seven'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[26] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-twenty-eight'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[27] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-twenty-nine'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[28] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } elseif($item['Item']['item_part'] == 'part-thirty'){ ?>
										<a href="http://www.facebook.com/sharer.php?u=https://youtu.be/<?php echo $myArray[29] ?>?t=<?php echo $item['Item']['item_point_start']; ?>s" class="" data-lang="en" target="_blank">
											<?php echo $this->Html->image('assets/facebook.png', array('class' => 'socialimg', 'alt' => 'https://www.facebook.com/snookview')); ?>
										</a>
									<?php } ?>
							<?php } ?>
							</li>
						</ul>
		           </div>
		        <?php endforeach; ?>
			<?php else:
				echo '<h3>Timeline</h3><div class="row"><div class="col-md-12 noPadding"><div class="box text-center coming"><p>No timeline items have yet been added! <br/>Please <a href="/contact"><i>contact</i></a> me if you want me to add a nice moment throughout the match!<br/>Or ask me to give you permission to add timeline items yourself.</p></div></div></div>';
			 ?>
			<?php endif; ?>
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
					<?php
						echo $this->Form->input('comment_body', array(
							'label' => '',
							'placeholder' => 'Share your thoughts',
						));
						echo $this->Form->input('created', array(
							'label' => 'Created',
							'type' => 'hidden'
						));
					?>
				</fieldset>
				<?php echo $this->Form->end(array('label' => __('Comment', true), 'class' => 'btn btn-default btn-success btn-lg', 'name' => 'comment')); ?>
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