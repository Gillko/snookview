<?php $this->start('meta'); ?>
	<?php foreach($tournaments as $tournament): ?>
		<title>Snookview - <?php echo $tournament['tournament_name'] . ' ' . $tournament['tournament_year']; ?></title>
	<?php endforeach; ?>
<?php $this->end(); ?>
<div class="row padding-top">
	<div class="col-md-1">
	</div>
	<div class="col-md-10 noPadding noPaddingMobile noPaddingTablet tournaments view">
		<?php foreach($tournaments as $tournament): ?>
			<h3><?php echo $tournament['tournament_name'] . ' ' . $tournament['tournament_year'] . ' - All Matches'; ?></h3>
		<?php endforeach; ?>

		<!-- UK CHAMPIONSHIP -->
		<?php foreach($tournaments as $tournament): ?>
			<?php if($tournament['tournament_name'] == 'UK Championship'){ ?>
				<div class="row">
					<div class="col-md-3 noPaddingMobile noPaddingTablet">
						<h2>Final</h2>
						<?php if(!empty($videosFinal)): ?>
							<?php foreach ($videosFinal as $video): ?>
								<div class="box text-center">

									<?php 
										/*echo $this->Html->link($video->video_slug, [
										    'controller' => 'Videos',
										    'action' => 'view',
										    'id' => $video->video_id,
										    'slug' => $video->video_slug
										]);*/
									?>
									

									<a href="../../videos/<?php echo $video->video_id; ?>/<?php echo $video->video_slug; ?>">
									<!-- <a href='/videos/<?php //echo $video['video_slug']; ?>'> -->
										<?php if($tournament['tournament_winner']) echo $this->Html->image($tournament['tournament_winner'], array('class' => 'img-responsive noPadding', 'alt' => $tournament['tournament_name'] . ' ' . $tournament['tournament_year'])); ?>
										<ul class="videos final">
											<?php foreach ($video->players as $player): ?>
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
									<a href="../../videos/<?php echo $video->video_id; ?>/<?php echo $video->video_slug; ?>">
									<!-- <a href='/videos/<?php //echo $video['video_slug']; ?>'> -->
										<div class="row">
											<?php foreach ($video->players as $player): ?>
											<div class="col-md-6">
												<?php if($player['player_image']) echo $this->Html->image($player['player_image'], array('class' => 'img-responsive thumbMiddleLargeScreen', 'alt' => $player['player_firstname'] . ' ' . $player['player_surname'])); ?>
											</div>
											<?php endforeach; ?>
										</div>
										<ul class="videos semi-finals">
											<?php foreach ($video->players as $player): ?>
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
								<a href="../../videos/<?php echo $video->video_id; ?>/<?php echo $video->video_slug; ?>">
								<!-- <a href='/videos/<?php //echo $video['video_slug']; ?>'> -->
									<ul class="videos quarter-finals">
										<?php foreach ($video->players as $player): ?>
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
						<h2>Last 16</h2>
						<?php if(!empty($videosLast16)): ?>
							<?php foreach ($videosLast16 as $video): ?>
								<div class="box text-center">
									<a href="../../videos/<?php echo $video->video_id; ?>/<?php echo $video->video_slug; ?>">
									<!-- <a href='/videos/<?php //echo $video['video_slug']; ?>'> -->
										<ul class=" videos first-round oneline">
											<?php foreach ($video->players as $player): ?>
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
				</div>
				<div class="row">
					<div class="col-md-12 noPaddingMobile noPaddingTablet">
						<h2>Third Round</h2>
					</div>
					<?php if(!empty($videosThirdRound)): ?>
						<?php foreach ($videosThirdRound as $video): ?>
							<div class="col-md-3 noPaddingMobile noPaddingTablet">
								<div class="box text-center">
									<a href="../../videos/<?php echo $video->video_id; ?>/<?php echo $video->video_slug; ?>">
									<!-- <a href='/videos/<?php //echo $video['video_slug']; ?>'> -->
										<ul class=" videos first-round oneline">
											<?php foreach ($video->players as $player): ?>
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
				</div>

				<div class="row">
					<div class="col-md-12 noPaddingMobile noPaddingTablet">
						<h2>Second Round</h2>
					</div>
					<?php if(!empty($videosSecondRound)): ?>
						<?php foreach ($videosSecondRound as $video): ?>
							<div class="col-md-3 noPaddingMobile noPaddingTablet">
								<div class="box text-center">
									<a href="../../videos/<?php echo $video->video_id; ?>/<?php echo $video->video_slug; ?>">
									<!-- <a href='/videos/<?php //echo $video['video_slug']; ?>'> -->
										<ul class=" videos first-round oneline">
											<?php foreach ($video->players as $player): ?>
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
				</div>
				
				<div class="row">
					<div class="col-md-12 noPaddingMobile noPaddingTablet">
						<h2>First Round</h2>
					</div>
					<?php if(!empty($videosFirstRound)): ?>
						<?php foreach ($videosFirstRound as $video): ?>
							<div class="col-md-3 noPaddingMobile noPaddingTablet">
								<div class="box text-center">
									<a href="../../videos/<?php echo $video->video_id; ?>/<?php echo $video->video_slug; ?>">
									<!-- <a href='/videos/<?php //echo $video['video_slug']; ?>'> -->
										<ul class=" videos first-round oneline">
											<?php foreach ($video->players as $player): ?>
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
				</div>
				<div class="row">
					<div class="col-md-12 noPaddingMobile noPaddingTablet">
						<h2>Highlights</h2>
					</div>
					<?php if(!empty($videosHighlights)): ?>
					<?php foreach($videosHighlights as $video): ?>
						<div class="col-md-3 noPaddingMobile noPaddingTablet">
							<div class="box text-center">
								<a href="../../videos/<?php echo $video->video_id; ?>/<?php echo $video->video_slug; ?>">
								<!-- <a href='/videos/<?php //echo $video['video_slug']; ?>'> -->
									<ul class="videos quarter-finals">
										<?php foreach ($video->players as $player): ?>
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
								<a href="../../videos/<?php echo $video->video_id; ?>/<?php echo $video->video_slug; ?>">
								<!-- <a href='/videos/<?php //echo $video['video_slug']; ?>'> -->
									<ul class="videos quarter-finals">
										<?php foreach ($video->players as $player): ?>
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
			<?php } ?>
			<!-- UK CHAMPIONSHIP -->
			
<!-- 			<style>
			* {
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	
	box-sizing: border-box; 
}

html, body  { 
	height: 100%;
	width: 100%;
}

body {
  font-family: sans-serif;
  line-height: 1.4;
}

h1 {
  font-size: 150%;
}

p {
  margin-bottom: 10px;
}

.paddingBlock {
	/*padding: 20px 0;*/
}

.eqWrap {
	display: flex;
}

.eq {
	/*padding: 10px;*/
	margin-bottom: 20px;
	background: #fff;
}



.equalHW {
	flex: 1;
}

.equalHMWrap {
	justify-content: space-between;
}

.equalHM {
	width: 23%;
}

.equalHMRWrap {
	justify-content: space-between;
	flex-wrap: wrap;
}

.equalHMR {
	width: 32%;
	margin-bottom: 2%;
}

.equalHMVWrap {
	flex-wrap: wrap;
}

.equalHMV {
	width: 32%;
	margin: 1%;	
}

.equalHMV:nth-of-type(3n) {
	margin-right: 0;	
}

.equalHMV:nth-of-type(3n+1) {
	margin-left: 0;	
}
.content .box{
	margin-bottom: 0px;
}
.content h2{
	margin-bottom:0px;
}

.content .box.coming{
	/*border-bottom: none;*/
	padding: 50% 0 50% 0;
}

ul{
	padding: 5.1% 0 5.2% 0;
	margin-bottom: 0;
}

.content .box ul.first-round {
     
     height: auto; 
}

.col-md-12{
	margin: 10px 0 10px 0;
}
			</style> -->
			<!-- THE MASTERS -->
			<?php if($tournament['tournament_name'] == 'The Masters'){ ?>
				<!-- <div class="paddingBlock"> -->
					<!-- <div class="row equalHMWrap eqWrap"> -->
					<div class="row">
						<!-- <div class="col-md-3 noPadding noPaddingMobile noPaddingTablet equalHM eq"> -->
						<div class="col-md-3 noPaddingMobile noPaddingTablet">
							<h2>Final</h2>
							<?php //if(!empty($videosFinal)): ?>
							<?php if(iterator_count($videosFinal)): ?>
								<?php foreach ($videosFinal as $video): ?>
									<div class="box text-center">
										<a href="../../videos/<?php echo $video->video_id; ?>/<?php echo $video->video_slug; ?>">
										<!-- <a href='/videos/<?php //echo $video['video_slug']; ?>'> -->
											<?php if($tournament['tournament_winner']) echo $this->Html->image($tournament['tournament_winner'], array('class' => 'img-responsive noPadding', 'alt' => $tournament['tournament_name'] . ' ' . $tournament['tournament_year'])); ?>
											<ul class="videos final">
												<?php foreach ($video->players as $player): ?>
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
							<?php //if(!empty($videosSemi)): ?>
							<?php if(iterator_count($videosSemi)): ?>	
								<?php foreach ($videosSemi as $video): ?>
									<div class="box text-center">
										<a href="../../videos/<?php echo $video->video_id; ?>/<?php echo $video->video_slug; ?>">
										<!-- <a href='/videos/<?php //echo $video['video_slug']; ?>'> -->
											<div class="row">
												<?php foreach ($video->players as $player): ?>
												<div class="col-md-6">
													<?php if($player['player_image']) echo $this->Html->image($player['player_image'], array('class' => 'img-responsive thumbMiddleLargeScreen', 'alt' => $player['player_firstname'] . ' ' . $player['player_surname'])); ?>
												</div>
												<?php endforeach; ?>
											</div>
											<ul class="videos semi-finals">
												<?php foreach ($video->players as $player): ?>
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
							<?php //if(!empty($videosQuarter)): ?>
							<?php if(iterator_count($videosQuarter)): ?>
							<?php foreach($videosQuarter as $video): ?>
								<div class="box text-center">
									<a href="../../videos/<?php echo $video->video_id; ?>/<?php echo $video->video_slug; ?>">
									<!-- <a href='/videos/<?php //echo $video['video_slug']; ?>'> -->
										<ul class="videos quarter-finals">
											<?php foreach ($video->players as $player): ?>
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
							<h2>First Round</h2>
							<?php if(iterator_count($videosFirstRound)): ?>
								<?php foreach ($videosFirstRound as $video): ?>
									<div class="box text-center">
										<a href="../../videos/<?php echo $video->video_id; ?>/<?php echo $video->video_slug; ?>">
										<!-- <a href='/videos/<?php //echo $video['video_slug']; ?>'> -->
											<ul class=" videos first-round oneline">
												<?php foreach ($video->players as $player): ?>
													<li><?php echo $player['player_surname']; ?></li>
												<?php endforeach; ?>
											</ul>
										</a>
									</div>
								<?php endforeach; ?>
							<?php else:
								echo '<div class="col-md-12 noPaddingMobile noPaddingTablet"><div class="box text-center coming">coming soon</div></div>';
							 ?>
							<?php endif; ?>
						</div>
					</div>
				<!-- </div> -->
				<div class="row">
					<div class="col-md-12 noPaddingMobile noPaddingTablet">
						<h2>Highlights</h2>
					</div>
					<?php //if(!empty($videosHighlights)): ?>
					<?php if(iterator_count($videosHighlights)): ?>
					<?php foreach($videosHighlights as $video): ?>
						<div class="col-md-3 noPaddingMobile noPaddingTablet">
							<div class="box text-center">
								<a href="../../videos/<?php echo $video->video_id; ?>/<?php echo $video->video_slug; ?>">
								<!-- <a href='/videos/<?php //echo $video['video_slug']; ?>'> -->
									<ul class="videos quarter-finals">
										<?php foreach ($video->players as $player): ?>
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
					<?php //if(!empty($videosExtra)): ?>
					<?php if(iterator_count($videosExtra)): ?>
					<?php foreach($videosExtra as $video): ?>
						<div class="col-md-3 noPaddingMobile noPaddingTablet">
							<div class="box text-center">
								<a href="../../videos/<?php echo $video->video_id; ?>/<?php echo $video->video_slug; ?>">
								<!-- <a href='/videos/<?php //echo $video['video_slug']; ?>'> -->
									<ul class="videos quarter-finals">
										<?php foreach ($video->players as $player): ?>
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
			<?php } ?>
			<!-- THE MASTERS -->

			<!-- WORLD CHAMPIONSHIP -->
			<?php if($tournament['tournament_name'] == 'World Championship'){ ?>
				<div class="row">
					<div class="col-md-3 noPaddingMobile noPaddingTablet">
						<h2>Final</h2>
						<?php if(!empty($videosFinal)): ?>
							<?php foreach ($videosFinal as $video): ?>
								<div class="box text-center">
									<a href="../../videos/<?php echo $video->video_id; ?>/<?php echo $video->video_slug; ?>">
									<!-- <a href='/videos/<?php //echo $video['video_slug']; ?>'> -->
										<?php if($tournament['tournament_winner']) echo $this->Html->image($tournament['tournament_winner'], array('class' => 'img-responsive noPadding', 'alt' => $tournament['tournament_name'] . ' ' . $tournament['tournament_year'])); ?>
										<ul class="videos final">
											<?php foreach ($video->players as $player): ?>
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
									<a href="../../videos/<?php echo $video->video_id; ?>/<?php echo $video->video_slug; ?>">
									<!-- <a href='/videos/<?php //echo $video['video_slug']; ?>'> -->
										<div class="row">
											<?php foreach ($video->players as $player): ?>
											<div class="col-md-6">
												<?php if($player['player_image']) echo $this->Html->image($player['player_image'], array('class' => 'img-responsive thumbMiddleLargeScreen', 'alt' => $player['player_firstname'] . ' ' . $player['player_surname'])); ?>
											</div>
											<?php endforeach; ?>
										</div>
										<ul class="videos semi-finals">
											<?php foreach ($video->players as $player): ?>
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
								<a href="../../videos/<?php echo $video->video_id; ?>/<?php echo $video->video_slug; ?>">
								<!-- <a href='/videos/<?php //echo $video['video_slug']; ?>'> -->
									<ul class="videos quarter-finals">
										<?php foreach ($video->players as $player): ?>
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
						<h2>Second Round</h2>
					</div>
					<?php if(!empty($videosSecondRound)): ?>
						<?php foreach ($videosSecondRound as $video): ?>
							<div class="col-md-3 noPaddingMobile noPaddingTablet">
								<div class="box text-center">
									<a href="../../videos/<?php echo $video->video_id; ?>/<?php echo $video->video_slug; ?>">
									<!-- <a href='/videos/<?php //echo $video['video_slug']; ?>'> -->
										<ul class=" videos first-round oneline">
											<?php foreach ($video->players as $player): ?>
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
				</div>
				<div class="row">
					<div class="col-md-12 noPaddingMobile noPaddingTablet">
						<h2>First Round</h2>
					</div>
					<?php if(!empty($videosFirstRound)): ?>
						<?php foreach ($videosFirstRound as $video): ?>
							<div class="col-md-3 noPaddingMobile noPaddingTablet">
								<div class="box text-center">
									<a href="../../videos/<?php echo $video->video_id; ?>/<?php echo $video->video_slug; ?>">
									<!-- <a href='/videos/<?php //echo $video['video_slug']; ?>'> -->
										<ul class=" videos first-round oneline">
											<?php foreach ($video->players as $player): ?>
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
				</div>
					
				<div class="row">
					<div class="col-md-12 noPaddingMobile noPaddingTablet">
						<h2>Highlights</h2>
					</div>
					<?php if(!empty($videosHighlights)): ?>
					<?php foreach($videosHighlights as $video): ?>
						<div class="col-md-3 noPaddingMobile noPaddingTablet">
							<div class="box text-center">
								<a href="../../videos/<?php echo $video->video_id; ?>/<?php echo $video->video_slug; ?>">
								<!-- <a href='/videos/<?php //echo $video['video_slug']; ?>'> -->
									<ul class="videos quarter-finals">
										<?php foreach ($video->players as $player): ?>
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
								<a href="../../videos/<?php echo $video->video_id; ?>/<?php echo $video->video_slug; ?>">
								<!-- <a href='/videos/<?php //echo $video['video_slug']; ?>'> -->
									<ul class="videos quarter-finals">
										<?php foreach ($video->players as $player): ?>
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
			<?php } ?>
			<!-- WORLD CHAMPIONSHIP -->
		<?php endforeach; ?>
	<div class="col-md-1">
	</div>
</div>